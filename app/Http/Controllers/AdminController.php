<?php

namespace App\Http\Controllers;

use App\AdminUsers;
use App\Calls;
use App\Clients;
use App\Products;
use App\UsersNotes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Carbon\Carbon;

use App\Http\Requests;
//use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loginUser()
    {
        if (Session::has('email') && Session::has('token')) {

            $user = AdminUsers::where([
                'email' => Session::get('email'),
                'token' => Session::get('token'),
                'ip'    => $_SERVER['REMOTE_ADDR']
            ])->get()->first();

            if ( ! is_null($user)) {

                return redirect(action('AdminController@dashboard'));
            }
        }

        return view('login-user');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLoginUser(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|email',
            'password' => 'required'
        ]);

        $user = AdminUsers::where([
            'email'    => $request->input('username'),
            'password' => hash("sha256", $request->input('password'))
        ])->get()->first();

        if ( ! is_null($user)) {

            $token = str_random(100);
            $user->token       = $token;
            $user->ip          = $_SERVER['REMOTE_ADDR'];
            $user->last_access = Carbon::now();
            $user->save();

            Session::put('email', $request->input('username'));
            Session::put('token', $token);
            Session::put('user_id', $user->id);

            if (Session::has('from')) {
                return redirect('/' . Session::get('from'));
            }

            return redirect(action('AdminController@dashboard'));
        } else {
            return Redirect::to('administration')->with('flash_error', 'Identification échouée');
            //Session::flash('flash_error', 'Identification échouée');
        }
    }

    public function logoutUser()
    {
        if (Session::has('email') && Session::has('token')) {
            $user = AdminUsers::where([
                'email' => Session::get('email'),
                'token' => Session::get('token')
            ])->get()->first();

            if ( ! is_null($user)) {
                $user->token = time();
                $user->save();
            }
        }

        Session::remove('email');
        Session::remove('token');

        return redirect('/administration');
    }

    public function dashboard()
    {
        // calls
        $calls = Calls::where('status', 0)->count();
        $totalCalls = Calls::all()->count();
        $callsPercent = null;

        if($totalCalls > 0) {
            $callsPercent = round(($calls * 100) / $totalCalls, 2);
        }

        if($callsPercent <= 25) {
            $callsColor = "success";
        }
        elseif ($callsPercent > 25 && $callsPercent < 50) {
            $callsColor = "warning";
        }
        else {
            $callsColor = "danger";
        }

        // notes
        $myNotes = UsersNotes::where('user_id', Session::get('user_id'))->orderBy('progress', 'asc')->limit(50)->get();

        // clients
        $clients = Clients::all()->count();

        // products
        $productsAvailable = Products::where('available', 1)->count();
        $productsExpedited = Products::where('expedited', 1)->count();

        return view('dashboard', compact('calls', 'totalCalls', 'callsPercent',
            'callsColor', 'myNotes', 'clients', 'productsAvailable', 'productsExpedited'));
    }

    public function myProfile()
    {
        $user = AdminUsers::find(Session::get('user_id'));

        if ( ! is_null($user)) {
            return view('my-profile', compact('user'));
        }

        return redirect(action('AdminController@dashboard'));
    }

    public function postMyProfile(Request $request)
    {
        $this->validate($request, [
            'old_password'          => 'required',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = AdminUsers::where([
            'id'       => Session::get('user_id'),
            'password' => hash("sha256", $request->input('old_password'))
        ])->get()->first();

        if ( ! is_null($user)) {
            $user->password = hash('sha256', $request->input('password'));
            $user->save();

            Session::flash('flash_message', 'Le mot de passe a bien été changé !');

            return redirect(action('AdminController@myProfile'));
        } else {
            Session::flash('flash_error', 'L\'ancien mot de passe est incorrect');

            return redirect(action('AdminController@myProfile'));
        }
    }

    public function myNotes()
    {
        $myNotes = UsersNotes::where('user_id', Session::get('user_id'))->orderBy('progress', 'asc')->limit(50)->get();

        return view('my-notes', compact('myNotes'));
    }

    public function readANote($id)
    {
        $myNote = UsersNotes::where('id', $id)->where('user_id', Session::get('user_id'))->limit(1)->get()->first();

        if ( ! is_null($myNote)) {
            return view('read-a-note', compact('myNote'));
        }

        return redirect(action('AdminController@myNotes'));
    }

    public function addANote()
    {
        $progress = [ ];
        for ($i = 0; $i <= 100; $i = $i + 10) {
            $progress[$i] = $i . ' %';
        }

        return view('add-edit-a-note', compact('progress'));
    }

    public function postAddANote(Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
            'progress' => 'required'
        ]);

        $note             = new UsersNotes();
        $note->user_id    = Session::get('user_id');
        $note->title      = $request->input('title');
        $note->task       = $request->input('task');
        $note->progress   = $request->input('progress');
        $note->created_at = Carbon::now();
        $note->updated_at = Carbon::now();
        $note->save();

        Session::flash('flash_message', 'La note a bien été enregistrée');

        return redirect(action('AdminController@myNotes'));
    }

    public function finishNote($id)
    {
        $note = UsersNotes::find($id);

        if ( ! is_null($id)) {

            $note->progress   = 100;
            $note->updated_at = Carbon::now();
            $note->save();

            return redirect(action('AdminController@myNotes'));
        }

        abort(404);
    }

    public function finishNoteDash($id)
    {
        $note = UsersNotes::find($id);

        if ( ! is_null($id)) {

            $note->progress   = 100;
            $note->updated_at = Carbon::now();
            $note->save();

            return redirect(action('AdminController@dashboard'));
        }

        abort(404);
    }

    public function editANote($id)
    {
        $progress = [ ];
        for ($i = 0; $i <= 100; $i = $i + 10) {
            $progress[$i] = $i . ' %';
        }

        $note = UsersNotes::where('user_id', Session::get('user_id'))->where('id', $id)->limit(1)->get()->first();
        if ( ! is_null($note)) {
            return view('add-edit-a-note', compact('progress', 'note'));
        }

        return redirect(action('AdminController@myNotes'));
    }

    public function postEditANote($id, Request $request)
    {
        $this->validate($request, [
            'title'    => 'required',
            'progress' => 'required'
        ]);

        $note = UsersNotes::where('user_id', Session::get('user_id'))->where('id', $id)->limit(1)->get()->first();
        if ( ! is_null($note)) {
            $note->title      = $request->input('title');
            $note->task       = $request->input('task');
            $note->progress   = $request->input('progress');
            $note->updated_at = Carbon::now();
            $note->save();

            Session::flash('flash_message', 'La note a bien été modifiée');
        }

        return redirect(action('AdminController@readANote', $id));
    }

    public function deleteANote($id)
    {
        $myNote = UsersNotes::where('id', $id)->where('user_id', Session::get('user_id'))->limit(1)->get()->first();

        if ( ! is_null($myNote)) {
            return view('delete-a-note', compact('myNote'));
        }
    }

    public function postDeleteANote($id, Request $request)
    {
        $myNote = UsersNotes::where('id', $id)->where('user_id', Session::get('user_id'))->limit(1)->get()->first();

        if ( ! is_null($myNote)) {
            $myNote->delete();
        }
        Session::flash('flash_message', 'La note a bien été supprimée');

        return redirect(action('AdminController@myNotes'));
    }
}

?>