<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CariinRecipe extends Model
{
    use SoftDeletes;
    public function detail(){
        return $this->hasMany('App\CariinRecipeDetail','id_recipe');
    }
    public function user(){
        return $this->belongsTo('App\CariinUser','id_user');
    }
    public function delete()
    {
        // delete all related photos 
        $this->detail()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
    protected $fillable = ['id_user','nama','bahan','cara_masak'];
}
