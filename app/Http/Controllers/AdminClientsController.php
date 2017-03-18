<?php

namespace App\Http\Controllers;

use App\Calls;
use App\Clients;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clients()
    {
        return view('mirfrance.admin.clients.clients');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addClient()
    {
        return view('mirfrance.admin.clients.add-client');
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
        $this->validate($request, [
            'lastname'  => 'required',
            'firstname' => 'required',
            'email'     => 'required|email'
        ]);

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
        $client->created_at = Carbon::now();
        $client->updated_at = Carbon::now();

        $client->save();

        return redirect(action('AdminClientsController@clients'));
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

            return view('mirfrance.admin.clients.show-client', compact('client', 'calls'));
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
            return view('mirfrance.admin.clients.edit-client', compact('client'));
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

            return redirect(action('AdminClientsController@clients'));
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
            $client->delete();

            return redirect(action('AdminClientsController@clients'));
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
            return view('mirfrance.admin.clients.search-client', compact('clients', 'origin'));
        } else {
            return 'Aucun résultat trouvé';
        }
    }
}
