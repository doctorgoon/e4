<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersNotes extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'task',
        'progress',
    ];
}
