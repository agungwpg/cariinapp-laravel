<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CariinUser;
use App\CariinRecipe;
use App\CariinRecipeDetail;

class CariinController extends Controller
{
    // ======================== USER =======================================
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
    // ======================== END USER =======================================
    // ======================== RECIPE =======================================

    public function recipeIndex(){
        $recipes = CariinRecipe::all();
        $users = CariinUser::all();
        return view('recipe.index',compact('recipes','users'));
    }
    public function recipeStore(Request $request){
        $bahan = "";
        foreach($request->bahan as $b){
            $bahan = $bahan." ".$b;
        }
        $recipe = CariinRecipe::create([
            'id_user' => $request->select_user,
            'nama' => $request->nama_recipe,
            'bahan' => $bahan,
            'cara_masak' => $request->cara_masak,
        ]);
        $recipe->detail()->createMany([
            ['nama_bahan'=>$request->bahan[0]],
            ['nama_bahan'=>$request->bahan[1]],
            ['nama_bahan'=>$request->bahan[2]],
            ['nama_bahan'=>$request->bahan[3]],
            ['nama_bahan'=>$request->bahan[4]],
        ]);
        return back();
    }

    // ======================== END RECIPE =======================================
}
