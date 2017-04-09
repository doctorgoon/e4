<?php

namespace App\Http\Controllers;

use App\AdminAccess;
use App\AdminUsers;
use App\Logs;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Get a list of all users registered on the admin side
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function users()
    {
        $users = AdminUsers::all();

        // $users =  DB::select( DB::raw("SELECT * FROM admin_users") );

        return view('users.users', compact('users'));
    }

    /**
     * Show the view to add a new user on the admin
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addUser()
    {
        return view('users.add-user');
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

        Session::flash('flash_message',
            'L\'utilisateur a bien été créé. Son mot de passe provisoire est <b>' . $tmpPassword . '</b>');

        return redirect(action('AdminUsersController@users'));
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

            return view('users.edit-user', compact('user'));
        }

        Session::flash('flash_error', 'Impossible de trouver cet utilisateur');

        return redirect(action('AdminUsersController@users'));
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

            Session::flash('flash_message', 'L\'utilisateur a bien été modifié.');

            return redirect(action('AdminUsersController@users'));
        }

        Session::flash('flash_error', 'Impossible de trouver cet utilisateur');

        return redirect(action('AdminUsersController@users'));
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
            return view('users.delete-user', compact('user'));
        }

        Session::flash('flash_error', 'Impossible de trouver cet utilisateur');

        return redirect(action('AdminUsersController@users'));
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
        $user = AdminUsers::find($id)->delete();

        Session::flash('flash_message', 'L\'utilisateur a bien été supprimé.');

        return redirect(action('AdminUsersController@users'));
    }

}
