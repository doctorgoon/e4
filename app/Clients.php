<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Clients extends Model
{
    protected $fillable = [
        'id',
        'num',
        'company',
        'lastname',
        'firstname',
        'address',
        'zipcode',
        'city',
        'phone',
        'mobile',
        'fax',
        'email',
        'type',
    ];

    public function plans()
    {
        return $this->hasMany('\App\ClientsPlans', 'client_id');
    }

    public function calls()
    {
        return $this->hasMany('\App\Calls', 'client_id');
    }

    public function customerService()
    {
        return $this->hasMany('\App\CustomerService', 'client_id');
    }

}
