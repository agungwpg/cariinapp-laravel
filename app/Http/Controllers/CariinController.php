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
    public function userDestroy(Request $request){
        $user_id = $request->delete_user_id;
        $user = CariinUser::findOrFail($user_id);
        $user->delete();
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
    public function recipeUpdate(Request $request){
        // dd($request);
        $bahan = "";
        foreach($request->bahan as $b){
            $bahan = $bahan." ".$b;
        }
        $recipe_id = $request->recipe_id;
        $user_id = $request->user_id;

        $recipe = CariinRecipe::find($recipe_id);
        $recipe->id_user = $request->select_user;
        $recipe->nama = $request->nama_recipe;
        $recipe->bahan = $bahan;
        $recipe->cara_masak = $request->cara_masak;
        $recipe->update();
        $details = $recipe->detail;
        for ($i=0; $i < count($details) ; $i++) {
            $details[$i]->nama_bahan = $request->bahan[$i];
            $details[$i]->update();
        }
        return back();
    }
    public function recipeDestroy(Request $request){
        $recipe_id = $request->delete_recipe_id;
        $recipe = CariinRecipe::findOrFail($recipe_id);
        $recipe->delete();
        return back();
    }

    // ======================== END RECIPE =======================================
}
