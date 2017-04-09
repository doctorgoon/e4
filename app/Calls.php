<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calls extends Model
{
    protected $fillable = [
        'id', 'object', 'description', 'company', 'client_name', 'client_id',
        'user_id', 'status', 'phone', 'mobile', 'email'];

    public function tickets() {
        return $this->hasMany('\App\CallsTickets', 'call_id');
    }

    public function client() {
        return $this->belongsTo('\App\Clients', 'client_id');
    }

    public function user() {
        return $this->belongsTo('\App\AdminUsers', 'user_id');
    }
}
