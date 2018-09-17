<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CariinUser extends Model
{
    use SoftDeletes;
    public function recipe(){
        return $this->hasMany('App\CariinRecipe','id_user');
    }
    protected $fillable = ['username','name','email','isEmailConfirmed','password', 'activation_token'];
}
