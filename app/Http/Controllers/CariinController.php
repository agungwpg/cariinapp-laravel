<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CariinUser;
use App\CariinRecipe;
use App\CariinRecipeDetail;

class CariinController extends Controller
{
    //
    public function userIndex(){
        $users = CariinUser::all();
        return view('user.index',compact('users'));
    }
    public function userStore(Request $request){
        CariinUser::create([
            'name' => $request->cariin_name,
            'username' => $request->cariin_uname,
            'email' => $request->cariin_email,
            'isEmailConfirmed' => '1',
            'password' => bcrypt('cariinuser')
        ]);
        return back();
    }
    public function userUpdate(Request $request){
    $user = CariinUser::findOrFail($request->user_id);
    $user->name = $request->cariin_name;
    $user->username = $request->cariin_uname;
    $user->email = $request->cariin_email;
    $user->update();
    return back();
    }
}
