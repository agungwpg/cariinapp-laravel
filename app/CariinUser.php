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
    public function delete()
    {
        // delete all related photos 
        $this->recipe()->delete();
        // as suggested by Dirk in comment,
        // it's an uglier alternative, but faster
        // Photo::where("user_id", $this->id)->delete()

        // delete the user
        return parent::delete();
    }
    protected $fillable = ['username','name','email','isEmailConfirmed','password', 'activation_token', 'avatar'];
}
