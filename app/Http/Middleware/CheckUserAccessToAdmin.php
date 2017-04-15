<?php

namespace App\Http\Middleware;

use App\AccessAdmin;
use App\AdminAccess;
use App\AdminUsers;
use App\Logs;
use App\UsersNotes;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Contracts\View\Factory as ViewFactory;

class CheckUserAccessToAdmin
{

    /**
     * The view factory implementation.
     *
     * @var \Illuminate\Contracts\View\Factory
     */
    protected $view;

    /**
     * Create a new error binder instance.
     *
     * @param  \Illuminate\Contracts\View\Factory $view
     */
    public function __construct(ViewFactory $view)
    {
        $this->view = $view;
    }

    /**
     * @author  Jeremy AVID
     *
     * Handle an incoming request.
     * This middleware is called when an user is on the administration
     * He check if the user is logged and if he has access to the current controller
     * If it's not the case, the webservice returns an 403 error
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if ($request->route()->uri() != 'administration') {

            // We check if the user is connected
            if (Session::has('email') && Session::has('token')) {
                $user = AdminUsers::where([
                    'email' => Session::get('email'),
                    'token' => Session::get('token'),
                    'ip' => $_SERVER['REMOTE_ADDR']
                ])->get()->first();

                if (!is_null($user)) {

                    $user->last_access = Carbon::now();
                    $user->save();

                    Session::put('user_firstname', $user->firstname);
                    Session::put('user_lastname', $user->lastname);
                    Session::put('user_id', $user->id);
                    Session::put('user_picture', $user->picture);

                    // How many notes in waiting is there ?
                    $notes = UsersNotes::where('user_id', $user->id)->where('progress', '<>', 100)->count();
                    Session::put('user_notes_count', $notes);


                    // Get all users in the db
                    $u = AdminUsers::all();

                    $users = [];
                    foreach ($u as $user) {
                        $users[$user->id] = $user;
                    }
                    Session::put('users', $users);

                } else {
                    // If the user doesn't have the access, we put the old URL in the "from" session
                    Session::put('from', $request->route()->uri());

                    return redirect(action('AdminController@loginUser'));
                }
            } else {
                Session::put('from', $request->route()->uri());

                return redirect(action('AdminController@loginUser'));
            }
        }

        return $next($request);
    }
}
