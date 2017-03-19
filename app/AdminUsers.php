<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminUsers extends Model
{

    public function calls()
    {
        request($this->hasMany('\App\Calls', 'user_id'));
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }
}
