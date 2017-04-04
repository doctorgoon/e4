<?php

namespace App\Http\Controllers;

use App\Calls;
use App\CallsTickets;
use App\Clients;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminCallsController extends Controller
{
    /* display list of every Calls */

    public function calls()
    {
        $callsNonTreated = Calls::where('status', 0)->orderBy('created_at', 'desc')->get();
        $callsTreated    = Calls::where('status', 1)->orderBy('created_at', 'desc')->get();
        $callsToCall     = Calls::where('status', 2)->orderBy('created_at', 'desc')->get();
        $callsInWaiting  = Calls::where('status', 3)->orderBy('created_at', 'desc')->get();

        $countNonTreated = count($callsNonTreated);
        $countTreated    = count($callsTreated);
        $countToCall     = count($callsToCall);
        $countInWaiting  = count($callsInWaiting);

        $allCalls = [
            $callsNonTreated,
            $callsToCall,
            $callsInWaiting,
            $callsTreated,
        ];

        $callsNonTreated = Calls::where([ 'user_id' => Session::get('user_id'), 'status' => 0 ])->orderBy('created_at',
            'desc')->get();
        $callsTreated    = Calls::where([ 'user_id' => Session::get('user_id'), 'status' => 1 ])->orderBy('created_at',
            'desc')->get();
        $callsToCall     = Calls::where([ 'user_id' => Session::get('user_id'), 'status' => 2 ])->orderBy('created_at',
            'desc')->get();
        $callsInWaiting  = Calls::where([ 'user_id' => Session::get('user_id'), 'status' => 3 ])->orderBy('created_at',
            'desc')->get();

        $myCountNonTreated = count($callsNonTreated);
        $myCountTreated    = count($callsTreated);
        $myCountToCall     = count($callsToCall);
        $myCountInWaiting  = count($callsInWaiting);

        $myCalls = [
            $callsNonTreated,
            $callsTreated,
            $callsToCall,
            $callsInWaiting
        ];

        $totalCalls = count($callsInWaiting) + count($callsToCall) + count($callsNonTreated) + count($callsTreated);

        return view('mirfrance.admin.calls.calls',
            compact('allCalls', 'totalCalls', 'myCalls', 'countNonTreated', 'countTreated', 'countToCall',
                'countInWaiting', 'myCountNonTreated', 'myCountTreated', 'myCountToCall', 'myCountInWaiting'));
    }

    public function myCalls()
    {
        Session::flash('calls_tab', 1);

        return redirect(action('AdminCallsController@calls'));
    }

    /* display a specific Call */
    public function showCall($id)
    {
        $call = Calls::find($id);

        if ( ! is_null($call)) {

            return view('mirfrance.admin.calls.show-call', compact('call'));
        }

        abort(404);
    }

    /* show form for adding a new Call */
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function addCall()
    {
        return view('mirfrance.admin.calls.add-call');
    }

    /* add new Call with client linked to database */
    public function addClientCall($id)
    {
        $client = Clients::find($id);

        return view('mirfrance.admin.calls.add-call', compact('client'));
    }

    /* add new Call to database */
    public function postAddCall(Request $request)
    {
        $this->validate($request, [
            'client_name' => 'required',
            'object'      => 'required',
            'status'      => 'required',
        ]);

        $call              = new Calls();
        $call->client_name = $request->input('client_name');
        $call->object      = $request->input('object');
        $call->status      = $request->input('status');
        $call->company     = $request->input('company');
        $call->phone       = $request->input('phone');
        $call->mobile      = $request->input('mobile');
        $call->email       = $request->input('email');
        $call->created_at  = Carbon::now();
        $call->updated_at  = Carbon::now();
        $call->user_id     = Session::get('user_id');

        $call->save();

        if ( ! empty( $request->input('intervention') )) {
            $ticket              = new CallsTickets();
            $ticket->description = $request->input('intervention');
            $ticket->duration    = $request->input('duration');
            $ticket->call_id     = $call->id;
            $ticket->user_id     = $request->input('user_id');
            $ticket->created_at  = Carbon::now();
            $ticket->save();
        }

        $url = action('AdminCallsController@showCall', [ $call->id ]);

        return redirect(action('AdminCallsController@showCall', [ $call->id ]));
    }

    /* show form for editing an existent Call */
    public function editCall($id)
    {
        $call = Calls::find($id);

        if ( ! is_null($id)) {
            return view('mirfrance.admin.calls.edit-call', compact('call'));
        }

        abort(404);
    }

    /* update the specific Call in the database */
    public function postEditCall($id, Request $request)
    {
        $call = Calls::find($id);

        if ( ! is_null($id)) {

            $this->validate($request, [
                'client_name' => 'required',
                'object'      => 'required',
                'status'      => 'required',
            ]);

            $call->updated_at  = Carbon::now();
            $call->client_name = $request->input('client_name');
            $call->object      = $request->input('object');
            $call->status      = $request->input('status');
            $call->company     = $request->input('company');
            $call->phone       = $request->input('phone');
            $call->mobile      = $request->input('mobile');
            $call->email       = $request->input('email');
            $call->user_id     = $request->input('user_id');

            $call->save();

            return redirect(action('AdminCallsController@showCall', [ $call->id ]));
        }

        abort(404);
    }

    /* delete a specific Call from the database */
    public function destroyCall($id)
    {
        $call = Calls::find($id);

        if ( ! is_null($id)) {
            $call->delete();

            return redirect(action('AdminCallsController@calls'));
        }

        abort(404);
    }

    /* show form for adding a new Ticket */
    public function addTicket($id)
    {
        $call = Calls::find($id);

        if ( ! is_null($id)) {

            return view('mirfrance.admin.calls.form-ticket', compact('call'));
        }

        abort(404);
    }

    /* add new ticket to database */
    public function postAddTicket($id, Request $request)
    {
        $this->validate($request, [
            'call_id'     => 'required',
            'description' => 'required',
            'duration'    => 'required',
        ]);

        $ticket              = new CallsTickets();
        $ticket->call_id     = $request->input('call_id');
        $ticket->description = $request->input('description');
        $ticket->duration    = $request->input('duration');
        $ticket->user_id     = Session::get('user_id');
        $ticket->created_at  = Carbon::now();
        $ticket->updated_at  = Carbon::now();

        $ticket->save();

        Session::flash('flash_message', 'Le ticket a bien été ajouté');

        return redirect(action('AdminCallsController@showCall', [ $ticket->call_id ]));
    }

    /* show form for editing a specific Ticket */
    public function editTicket($id)
    {
        $ticket = CallsTickets::find($id);

        if ( ! is_null($ticket)) {
            $call = Calls::find($ticket->call_id);

            if ( ! is_null($call)) {
                return view('mirfrance.admin.calls.form-ticket', compact('ticket', 'call'));
            }
        }

        abort(404);
    }

    /* update a specific Ticket in the database */
    public function postEditTicket($id, Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'duration'    => 'required',
        ]);

        $ticket = CallsTickets::find($id);

        if ( ! is_null($id)) {

            $ticket->description = $request->input('description');
            $ticket->duration    = $request->input('duration');
            $ticket->updated_at  = Carbon::now();

            $ticket->save();

            Session::flash('flash_message', 'Le ticket a bien été modifié');

            return redirect(action('AdminCallsController@showCall', [ $ticket->call_id ]));
        }

        abort(404);
    }

    /* delete a specific Ticket from the database */
    public function destroyTicket($id)
    {
        $ticket = CallsTickets::find($id);

        if ( ! is_null($id)) {

            $ticket->delete();

            return Session::get('_previous')['url'];
        }

        abort(404);
    }

    /* show form for editing the Status of a specific Call */
    public function setStatus($id)
    {
        $call = Calls::find($id);

        if ( ! is_null($call)) {
            return view('mirfrance.admin.calls.set-status', compact('call'));
        }

        return redirect(action('AdminCallsController@calls'));
    }

    /* update the Status of a specific Call in the database */
    public function postSetStatus($id, Request $request)
    {
        $this->validate($request, [
            'call_id' => 'required',
            'status'  => 'required'
        ]);

        $call = Calls::find($id);

        if ( ! is_null($call)) {
            $call->status     = $request->input('status');
            $call->updated_at = Carbon::now();
            $call->save();
        }

        return redirect(action('AdminCallsController@showCall', [ $call->id ]));
    }

    public function pairCall($id)
    {
        $call = Calls::find($id);

        if ( ! is_null($call)) {

            return view('mirfrance.admin.calls.pair-call', compact('call'));
        }

        abort(404);
    }

    public function postPairCall($id, Request $request)
    {
        $call = Calls::find($id);

        if ( ! is_null($call)) {

            $client = Clients::find((int) $request->input('client_id'));
            if ( ! is_null($client)) {
                $call->client_id   = (int) $client->id;
                $call->client_name = $client->firstname . ' ' . $client->lastname;
                $call->company     = $client->company;
                $call->save();

                Session::flash('flash_message',
                    'Cet appel a bien été attribué à ' . $client->firstname . ' ' . $client->lastname);
            }
        }

        return redirect(action('AdminCallsController@showCall', [ $call->id ]));
    }
}
