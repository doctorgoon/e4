<?php
use App\AdminUsers;
use App\Products;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use \Ovh\Api;

function get_ovh_app_key()
{
    return 'eE7K3e0LdJSpA1fm';
}

function get_ovh_secret_key()
{
    return 'nZSx8YNLErZQhkh8MGJrbkQavxKtskHP';
}

function get_ovh_object()
{
    return new Api(get_ovh_app_key(),  // Application Key
        get_ovh_secret_key(),  // Application Secret
        'ovh-eu'      // Endpoint of API OVH Europe (List of available endpoints)
    ); // Consumer Key

}

function getUsersById()
{
    $u     = AdminUsers::all();
    $users = [ ];
    foreach ($u as $user) {
        $users[$user->id] = $user->firstname . ' ' . $user->lastname;
    }
    return $users;
}

function getSpirometersLits() {

    $spiros = Products::distinct()->get(['name']);
    $names  = array();
    foreach($spiros as $spiro) {
        $names[$spiro->name] = $spiro->name;
    }
    return $names;
}

function findUsersById($id, $param)
{
    $user = AdminUsers::find($id);

    if( ! is_null($user) && ! is_null($param) ) {
        if ( $param == false ) {
            $name = $user->firstname;
            return $name;
        }
        else {
            $name = $user->firstname . " " . $user->lastname;
            return $name;
        }
    }
}

function get_plans()
{
    $p = Plans::all();

    $plans = [ ];

    foreach ($p as $plan) {
        $plans[$plan->id] = $plan->plan_name;
    }

    return $plans;
}

function get_french_date($date)
{
    return Carbon::parse($date)->format('d/m/Y H:i:s');
}

function format_phone_number($number)
{
    if (strlen($number) == 10 && ! preg_match('#\.#', $number)) {
        return substr($number, 0, 2) . '.' . substr($number, 2, 2) . '.' . substr($number, 4, 2) . '.' . substr($number,
            6, 2) . '.' . substr($number, 8, 2);
    }

    return $number;
}

function set_previous_url($module, $url)
{
    Session::put('module_' . $module, $url);
}

function get_previous_url($module)
{
    return Session::get('module_' . $module);
}

function get_total_duration($call)
{
    if (count($call->tickets) > 0) {
        $total = 0;
        foreach ($call->tickets as $ticket) {
            $total += $ticket->duration;
        }

        return ' - ' . $total . ' ' . str_plural('minute', $total);
    } else {
        return '';
    }
}


function get_color_customer_service($customerService)
{
    if ( ! is_null($customerService->exp_client)) {
        return 'success';
    }

    if ( ! is_null($customerService->recep_it)) {
        return 'warning';
    }

    if ( ! is_null($customerService->exp_it)) {
        return 'info';
    }
    return 'danger';

}


?>