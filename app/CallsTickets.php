<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallsTickets extends Model
{
    public function call()
    {
        return $this->belongsTo('App\Calls');
    }
}
