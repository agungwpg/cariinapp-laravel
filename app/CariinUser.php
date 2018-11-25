<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\CariinRecipe;

class CariinUser extends Model
{
    use SoftDeletes;
    public function recipe(){
        return $this->hasMany('App\CariinRecipe','id_user');
    }
    public function favs(){
        return $this->hasMany('App\CariinFav','id_user');
    }
    public function delete()
    {
        $this->recipe()->delete();
        $this->favs()->delete();
        return parent::delete();
    }
    protected $fillable = ['username','name','email','isEmailConfirmed','password', 'activation_token', 'avatar'];
}
