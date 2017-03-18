<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUsers extends Model
{
    public function calls()
    {
        request($this->hasMany('\App\Calls', 'user_id'));
    }
}
