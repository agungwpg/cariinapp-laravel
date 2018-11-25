<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CariinFav extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['id_user', 'id_recipe'];
}
