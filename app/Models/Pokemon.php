<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{    protected $primaryKey = 'pokemon_id';
    protected $fillable = [
        'name',
        'type1',
        'type2',
        'url_image',
        'pokemon_id',
        'generation',
        'entry'
    ];
    public $timestamps = false;

}
