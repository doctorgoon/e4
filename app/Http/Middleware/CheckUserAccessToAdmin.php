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
     * @author  Cyril BESSEYRE
     * @last    2016-05-08
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
        // We force the https connection in production mode
        if (env('APP_ENV') != 'local') {
            URL::forceSchema('https');
        }

        // We get the current action name and extract only the controllerName
        $actionAndController = str_replace('App\Http\Controllers\\', '', $request->route()->getActionName());

        if (preg_match('#@#', $actionAndController)) {
            $controller = explode('@', $actionAndController);
            if (count($controller) != 2) {
                abort(403);
            }
        } else {
            abort(403);
        }

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


                    // We check if the user has an access to the controller
                    $hasPermission = AdminAccess::where([
                        'user_id' => $user->id,
                        'controller' => $controller[0]
                    ])->get()->first();

                    Session::put('user_firstname', $user->firstname);
                    Session::put('user_lastname', $user->lastname);
                    Session::put('user_id', $user->id);
                    Session::put('user_picture', $user->picture);

                    // How notes in waiting there are ?
                    $notes = UsersNotes::where('user_id', $user->id)->where('progress', '<>', 100)->count();
                    Session::put('user_notes_count', $notes);


                    if (!is_null($hasPermission)) {
                        // Access granted !
                        $userAccessList = [];
                        $userAccess = AdminAccess::where('user_id', $user->id)->get();
                        foreach ($userAccess as $access) {
                            $userAccessList[] = $access->controller;
                        }

                        $this->view->share('userAccessList', $userAccessList);

                        $this->view->share('access', [
                            'AdminController' => 'Accès à l\'administration',
                            'AdminToolsController' => 'Gérer les droits d\'accès',
                            'AdminCallsController' => 'Gérer les appels',
                            'AdminClientsController' => 'Gérer les clients',
                            'AdminPlansController' => 'Gérer les formules',
                            'AdminProductsController' => 'Gérer les produits en ligne sur MIR France',
                            'AdminPagesController' => 'Gérer les pages des sites',
                            'AdminProjectsController' => 'Gérer les projets (gsk, asalee...)',
                            'AdminCustomerServiceController' => 'Gérer le SAV',
                            'AdminArticlesController' => 'Gérer les publications d\'articles',
                        ]);

                        $this->view->share('calls_status', [
                            0 => 'Non traité',
                            1 => 'Traité',
                            2 => 'A rappeler',
                            3 => 'Attente de rappel',
                        ]);

                        $this->view->share('colors_status', [
                            0 => 'danger',
                            1 => 'success',
                            2 => 'warning',
                            3 => 'info',
                        ]);

                        $this->view->share('categorie_id', [
                            0 => 'Spiromètres sur table',
                            1 => 'Spiromètres compact',
                            2 => 'Spiromètres USB',
                            3 => 'Télémédecine',
                            4 => 'Oxymètres',
                            5 => 'Logiciels',
                            6 => 'Accessoires',
                            7 => 'Consommables',
                        ]);

                        $this->view->share('site', [
                            0 => 'mirfrance',
                            1 => 'lamirau',
                            2 => 'spirometrie',
                            3 => 'pneumotel',
                        ]);

                    } else {
                        // No ! 403 error
                        abort(403);
                    }


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
        } else {
            // Login page
        }

        return $next($request);
    }
}
