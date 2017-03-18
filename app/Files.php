<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    public $table = "File";

    protected $fillable = [
        'id',
        'text',
        'filename',
    ];
}
