<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CariinRecipeDetail extends Model
{
    use SoftDeletes;
    public function recipe(){
        return $this->belongsTo('App\CariinRecipe','id_recipe');
    }
    protected $fillable = ['id_recipe','nama_bahan'];
}
