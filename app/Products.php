<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'id',
        'name',
        'ref',
        'description',
        'price',
        'image',
        'categorie_id',
        'online',
    ];
}
