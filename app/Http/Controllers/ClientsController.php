<?php

namespace App\Http\Controllers;

use App\Calls;
use App\Clients;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ClientsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param $sort
     * @return \Illuminate\Http\Response
     * @internal param string $order
     */
    public function clients(Request $request, $sort)
    {
        $search = $request->input('contactSearch');

        if( ! is_null($search)) {
            $clients = Clients::where('lastname','like','%'.$search.'%')
                ->orWhere('firstname','like','%'.$search.'%')
                ->orWhere('company','like','%'.$search.'%')
                ->orderBy('lastname', 'asc')->get();
        }
        else {
            if($sort == 'firstname') {
                $clients = Clients::all()->sortBy('firstname');
            }
            elseif($sort == 'email') {
                $clients = Clients::all()->sortBy('email');
            }
            else {
                $clients = Clients::all()->sortBy('lastname');
            }
        }

        return view('clients.clients', compact('clients'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addClient()
    {
        return view('clients.add-client');
    }

    public function addClientCall($id)
    {
        $call = Calls::find($id);

        return view('clients.add-client-call', compact('call'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function postAddClient(Request $request)
    {
        $client = Clients::where([
            ['lastname', $request->input('lastname')],
            ['email', $request->input('email')],
        ])->get()->first();

        $this->validate($request, [
            'lastname'  => 'required',
            'firstname' => 'required',
            'phone'     => 'required_without:email|numeric',
            'email'     => 'required_without:phone|email'
        ]);

        if (is_null($client)) {

            $client             = new Clients();
            $client->num        = $request->input('num');
            $client->company    = $request->input('company');
            $client->lastname   = $request->input('lastname');
            $client->firstname  = $request->input('firstname');
            $client->address    = $request->input('address');
            $client->zipcode    = $request->input('zipcode');
            $client->city       = $request->input('city');
            $client->phone      = $request->input('phone');
            $client->mobile     = $request->input('mobile');
            $client->fax        = $request->input('fax');
            $client->email      = $request->input('email');
            $client->type        = $request->input('type');
            $client->created_at = Carbon::now();
            $client->updated_at = Carbon::now();

            $client->save();

            return redirect(action('ClientsController@clients'));
        }
        else {
            return Redirect::to('administration/clients')->with('flash_error', 'Le client existe déjà');
        }
    }


    public function postAddClientCall(Request $request)
    {
        $client = Clients::where([
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
        ])->get()->first();

        $this->validate($request, [
            'lastname'  => 'required',
            'firstname' => 'required',
            'phone'     => 'required_without:email|numeric',
            'email'     => 'required_without:phone|email'
        ]);

        if (is_null($client)) {

            $client             = new Clients();
            $client->num        = $request->input('num');
            $client->company    = $request->input('company');
            $client->lastname   = $request->input('lastname');
            $client->firstname  = $request->input('firstname');
            $client->address    = $request->input('address');
            $client->zipcode    = $request->input('zipcode');
            $client->city       = $request->input('city');
            $client->phone      = $request->input('phone');
            $client->mobile     = $request->input('mobile');
            $client->fax        = $request->input('fax');
            $client->email      = $request->input('email');
            $client->type        = $request->input('type');
            $client->created_at = Carbon::now();
            $client->updated_at = Carbon::now();

            $client->save();

            return redirect(action('CallsController@pairCall', $request->input('invisible')));
        }
        else {
            $call = Calls::find($request->input('invisible'));

            $exist =  'Le client existe déjà, retrouvez le ci-dessous';

            return view('calls.pair-call', compact('call', 'exist'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function showClient($id)
    {
        $client = Clients::find($id);
        $calls = Calls::where('client_id', $id)->orderBy('id', 'desc')->get();

        if ( ! is_null($client)) {

            return view('clients.show-client', compact('client', 'calls'));
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function editClient($id)
    {
        $client = Clients::find($id);

        if ( ! is_null($id)) {
            return view('clients.edit-client', compact('client'));
        }

        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function postEditClient(Request $request, $id)
    {
        $client = Clients::find($id);

        if ( ! is_null($id)) {

            $this->validate($request, [
                'lastname'  => 'required',
                'firstname' => 'required',
                'email'     => 'required'
            ]);

            $client->updated_at = Carbon::now();
            $client->num        = $request->input('num');
            $client->company    = $request->input('company');
            $client->lastname   = $request->input('lastname');
            $client->firstname  = $request->input('firstname');
            $client->address    = $request->input('address');
            $client->zipcode    = $request->input('zipcode');
            $client->city       = $request->input('city');
            $client->phone      = $request->input('phone');
            $client->mobile     = $request->input('mobile');
            $client->fax        = $request->input('fax');
            $client->email      = $request->input('email');
            $client->type       = $request->input('type');

            $client->save();

            return redirect(action('ClientsController@clients'));
        }

        abort(404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroyClient($id)
    {
        $client = Clients::find($id);

        if ( ! is_null($id)) {

            return view('clients.delete-client', compact('client'));
        }

        abort(404);
    }

    public function postDestroyClient($id, Request $request)
    {
        $client = Clients::find($id);

        if ( ! is_null($id)) {

            $client->delete();

            Session::flash('flash_message', 'Le client a bien été supprimée');

            return redirect(action('ClientsController@clients'));
        }

        abort(404);
    }

    public function postSearchClient($origin, Request $request)
    {
        $this->validate($request, [ 'val' => 'required' ]);

        if ($request->input('val') == '*') {
            $clients = Clients::orderBy('id', 'desc')->get();
        } else {

            $clients = Clients::where('firstname', 'LIKE', '%' . $request->input('val') . '%')->orWhere('lastname',
                'LIKE', '%' . $request->input('val') . '%')->orWhere('company', 'LIKE',
                '%' . $request->input('val') . '%')->limit(10)->get();
        }

        if ( ! is_null($clients) && count($clients) > 0) {
            return view('clients.search-client', compact('clients', 'origin'));
        } else {
            return 'Aucun résultat trouvé';
        }
    }
}
