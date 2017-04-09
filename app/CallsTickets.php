<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CallsTickets extends Model
{
    protected $fillable = [
        'id', 'call_id', 'user_id', 'description', 'duration'];

    public function call()
    {
        return $this->belongsTo('App\Calls');
    }
}
