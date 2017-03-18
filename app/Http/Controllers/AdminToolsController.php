<?php

namespace App\Http\Controllers;

use App\AdminAccess;
use App\AdminUsers;
use App\Logs;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

/**
 * Class AdminToolsController
 *
 * @author      Cyril BESSEYRE <webmaster@sweetfm.fr>
 * @created_at  2016-05-15
 * @last        2016-05-15
 *
 * @package     App\Http\Controllers
 */
class AdminToolsController extends Controller
{
    /**
     * Get a list of all users registered on the admin side
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users()
    {
        $users = AdminUsers::all();

        return view('mirfrance.admin.tools.users', compact('users'));
    }

    /**
     * Show the view to add a new user on the admin
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addUser()
    {
        return view('mirfrance.admin.tools.add-user');
    }

    /**
     * Add a new user to the admin
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postAddUser(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname'  => 'required',
            'email'     => 'required|email|unique:admin_users,email'
        ]);

        // First, we create the user
        $token       = str_random(100);
        $tmpPassword = str_random(7);

        $user              = new AdminUsers();
        $user->firstname   = $request->input('firstname');
        $user->lastname    = $request->input('lastname');
        $user->email       = $request->input('email');
        $user->token       = $token;
        $user->password    = hash("sha256", $tmpPassword);
        $user->ip          = '0';
        $user->last_access = Carbon::now();
        $user->created_at  = Carbon::now();

        $user->save();

        // Second step, create access

        if ( ! empty( $request->input('access') ) && is_array($request->input('access'))) {
            foreach ($request->input('access') as $a) {
                $access             = new AdminAccess();
                $access->user_id    = $user->id;
                $access->controller = $a;
                $access->save();
            }
        }

        Session::flash('flash_message',
            'L\'utilisateur a bien été créé. Son mot de passe provisoire est <b>' . $tmpPassword . '</b>');

        return redirect(action('AdminToolsController@users'));
    }

    /**
     * Show the view to edit the user $id in the database
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function editUser($id)
    {
        $user = AdminUsers::find($id);
        if ( ! is_null($user)) {
            $oldUserAccess = [ ];

            $access = AdminAccess::where('user_id', $user->id)->get();
            if ( ! is_null($access)) {
                foreach ($access as $a) {
                    $oldUserAccess[$a->controller] = true;
                }
            }

            return view('mirfrance.admin.tools.edit-user', compact('user', 'oldUserAccess'));
        }

        Session::flash('flash_error', 'Impossible de trouver cet utilisateur');

        return redirect(action('AdminToolsController@users'));
    }

    /**
     * Edit the user $id in the database
     *
     * @param         $id
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postEditUser($id, Request $request)
    {
        $user = AdminUsers::find($id);
        if ( ! is_null($user)) {

            $this->validate($request, [
                'firstname' => 'required',
                'lastname'  => 'required'
            ]);

            $user->firstname = $request->input('firstname');
            $user->lastname  = $request->input('lastname');
            $user->save();

            AdminAccess::where('user_id', $user->id)->delete();

            if ( ! empty( $request->input('access') ) && is_array($request->input('access'))) {
                foreach ($request->input('access') as $a) {
                    $access             = new AdminAccess();
                    $access->user_id    = $user->id;
                    $access->controller = $a;
                    $access->save();
                }
            }

            Session::flash('flash_message', 'L\'utilisateur a bien été modifié.');

            return redirect(action('AdminToolsController@users'));
        }

        Session::flash('flash_error', 'Impossible de trouver cet utilisateur');

        return redirect(action('AdminToolsController@users'));
    }

    /**
     * Show the view to delete the user $id
     *
     * @param $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function deleteUser($id)
    {
        $user = AdminUsers::find($id);
        if ( ! is_null($user)) {
            return view('mirfrance.admin.tools.delete-user', compact('user'));
        }

        Session::flash('flash_error', 'Impossible de trouver cet utilisateur');

        return redirect(action('AdminToolsController@users'));
    }

    /**
     * Delete the user $id in the database
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postDeleteUser($id)
    {
        $user = AdminUsers::find($id);
        if ( ! is_null($user)) {
            AdminAccess::where('user_id', $user->id)->delete();
            AdminUsers::where('id', $user->id)->delete();

            Session::flash('flash_message', 'L\'utilisateur a bien été supprimé.');

            return redirect(action('AdminToolsController@users'));
        }

        Session::flash('flash_error', 'Impossible de trouver cet utilisateur');

        return redirect(action('AdminToolsController@users'));
    }

    public function sendPictureUser($id)
    {
        $user = AdminUsers::find($id);

        if ( ! is_null($user)) {
            return view('mirfrance.admin.tools.send-picture-user', compact('user'));
        }

        return redirect(action('AdminToolsController@users'));
    }

    public function postSendPictureUser($id, Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:jpg,jpeg,png,gif'
        ]);

        $user = AdminUsers::find($id);

        if ( ! is_null($user)) {
            if ( ! empty( $user->picture ) && ! is_null($user->picture)) {
                if(file_exists(public_path($user->picture))) {
                    unlink(public_path($user->picture));
                }
            }


            $file = $request->file('file');
            $name = $user->id . '_' . str_random(50) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/imgs/admin'), $name);

            $user->picture = '/imgs/admin/' . $name;
            $user->save();

            Session::flash('flash_message', 'L\'image de profil a bien été envoyée !');
        }

        return redirect(action('AdminToolsController@users'));
    }
}
