<?php

namespace App\Http\Controllers;


use Mail;
use Hash;
use App\Mail\CariinRegistration;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\CariinUser;
use App\CariinRecipe;
use App\CariinRecipeDetail;
use Illuminate\Support\Facades\Crypt;

class CariinApiController extends Controller
{
    //CARIINAPP USER ============================================================================================
    public function register(Request $request, Response $response){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $username = $request->username;

        if(!$username){return 'ga ada user';}

        $user = CariinUser::create([
            'name' => $name,
            'username' => $username,
            'password' => bcrypt($password),
            'email' => $email,
            'isEmailConfirmed' => '0',
            'activation_token' => str_random(32)
        ]);

        if($user)
        {
            $user->email = Crypt::encryptString($user->email);
            Mail::to($request->email)->send(new CariinRegistration($user));

            $response = array('message' => 'please check ur email', 'status' => 'success');
            return json_encode($response);
        }
        else
            $response = array('message' => 'something went wrong', 'status' => 'failed');
            return json_encode($response);
    }
    public function login(Request $request, Response $response){
        $username = $request->username;
        $password = $request->password;
        $user = CariinUser::where('username',$username)->first();
        if(Hash::check($password,$user->password))
        {
            //user ada dengan password yang benar
            if($user->isEmailConfirmed == '1')
            {
                //sudah confirm
                $data = [
                    'id' => $user->id,
                    'username' => $user->username,
                    'name' => $user->name,
                    'email'=> $user->email,
                    'avatar' => $user->avatar
                ];
                $response = array('message' => 'login success','status'=>'success','data'=>$data);
                return json_encode($response);
            }
            else
            {
                //belum confirm
                $response = array('message' => 'please confirm ur account','status'=>'failed',);
                return json_encode($response);
            }
        }
        else
        {
            //user dan password tidak match
            $response = array('message' => 'the credential does not match','status'=>'failed',);
            return json_encode($response);
        }
    }
    public function confirmEmail(Request $request, Response $response){
        $token = $request->token;
        $email = Crypt::decryptString($request->email);
        $user = CariinUser::where('email', $email)->first();
        if (!empty($user)){
            $user->isEmailConfirmed = "1";
            $user->save();
            $response = array('message' => 'activation success', 'status' => 'success');
            return json_encode($response);
        }
        else
        {
            $response = array('message' => 'activiation fail', 'status' => 'failed');
            return json_encode($response);
        }
    }
    public function updateUser(Request $request, Response $response){
        $user = CariinUser::findOrFail($request->id);
        if($user){
            if(CariinUser::where('email',$request->email))
            {
                $user->username = $request->username;
                $user->password = bcrypt($request->password);
                $user->email = $request->email;
                $user->name = $request->name;
                $user->update();
                $response = array('message' => 'success edit user with id '.$request->id, 'status' => 'success');
                return json_encode($response);
            }
            else
            {
                $response = array('message' => 'email already exists', 'status' => 'failed');
                return json_encode($response);
            }
        }
        else
        {
            $response = array('message' => 'update fail, no such id', 'status' => 'failed');
            return json_encode($response);
        }
    }
    public function deleteUser(Request $request, Response $response, $id){
        $user = CariinUser::find($id);
        if($user)
        {
            $user->delete();
            return json_encode(array('meessage' => 'user deleted','status'=>'success'));
        }
        else
        {
            return json_encode(array('meessage' => 'sorry, no such id','status'=>'failed'));
        }
    }
    //CARIINAPP USER END ============================================================================================
    //CARIINAPP RECIPE ==============================================================================================

    public function addRecipe(Request $request, Response $response){
        $id_user = $request->id_user;
        $recipe = $request->recipe;
        $bahan = "";
        foreach($recipe['bahan'] as $b){
            $bahan =  $bahan . " " . $b;
        }
        $newRecipe = CariinRecipe::create([
            'nama' => $recipe['nama'],
            'cara_masak' => $recipe['cara_masak'],
            'bahan' => $bahan,
            'id_user' => $id_user
        ]);
        foreach($recipe['bahan'] as $b){
            CariinRecipeDetail::create([
                'id_recipe' => $newRecipe->id,
                'nama_bahan' => $b,
            ]);
        }
        $response = array('message' => 'recipe added', 'status' => 'success');
        return json_encode($response);
    }
    public function updateRecipe(Request $request, Response $response, $id=null){
        $recipe = CariinRecipe::find($id);
        if ($recipe) {
            $recipe->cara_masak = $request->recipe['cara_masak'];
            $bahan = "";
            foreach($request->recipe['bahan'] as $b){
                $bahan =  $bahan . " " . $b;
            }
            $recipe->bahan = $bahan;
            $recipe->nama = $request->recipe['nama'];
            $recipe->update();
            $details = $recipe->detail;
            for ($i=0; $i < count($details) ; $i++) {
                $details[$i]->nama_bahan = $request->recipe['bahan'][$i];
                $details[$i]->update();
            }
            if($recipe->update())
            {
                $response = array('message' =>'success update recipe with id '.$id,'status'=>'success');
                return json_encode($response);
            }
            else
            {
                $response = array('message' =>'failed update recipe with id '.$id,'status'=>'failed');
                return json_encode($response);
            }
        }
        else{
            return json_encode(array('meessage' => 'sorry, no such id','status'=>'failed'));
        }
    }
    public function deleteRecipe(Request $request, Response $response, $id){
        $recipe = CariinRecipe::find($id);
        if($recipe)
        {
            $recipe->delete();
            return json_encode(array('meessage' => 'user deleted','status'=>'success'));
        }
        else
        {
            return json_encode(array('meessage' => 'sorry, no such id','status'=>'failed'));
        }
    }
    public function getRecipe(Request $request, Response $response){
        $id_user = $request->user;
        $id_recipe = $request->recipe;
        if (!empty($id_user) && !empty($id_recipe)) {
            $recipe = CariinUser::findOrFail($id_user)->recipe->find($id_recipe);
            if(!empty($recipe)){
                $response = array('status' =>'success','data'=>$recipe);
                return json_encode($response);
            }
            else
            {
                $response = array('message' =>'there is no recipe with that user and recipe id combination','status'=>'failed');
                return json_encode($response);
            }
        }
        else if (!empty($id_user))
        {
            $recipe = CariinUser::findOrFail($id_user)->recipe->all();
            // if(!empty($recipe)){
            if(!empty($recipe)){
                $response = array('status' =>'success','data'=>$recipe);
                return json_encode($response);
            }
            else
            {
                $response = array('message' =>'there is no user with that id','status'=>'failed');
                return json_encode($response);
            }
        }
        else if (!empty($id_recipe))
        {
            $recipe = CariinRecipe::findOrFail($id_recipe);
            if(!empty($recipe)){
                $response = array('status' =>'success','data'=>$recipe);
                return json_encode($response);
            }
            else
            {
                $response = array('message' =>'there is no recipe with that id','status'=>'failed');
                return json_encode($response);
            }
        }
        else
        {
            $response = array('status' => 'success','data' => CariinRecipe::all());
            return json_encode($response);
        }
    }
    public function getRecipeDetailBahan(Request $request, Response $response){
        $id_recipe = $request->id;
        $recipe = CariinRecipe::findOrFail($id_recipe)->detail->pluck('nama_bahan');
        if(!empty($recipe))
        {
            $response = array('status' => 'success','data' => $recipe);
            return json_encode($response);
        }
        else
        {
            $response = array('message' =>'there is no recipe with that id','status'=>'failed');
            return json_encode($response);
        }
    }
    public function searchRecipe(Request $request, Response $response){
        $recipe = new CariinRecipe;
        $recipe = !empty($request->q1) ? $recipe->orWhere('bahan','like',"%".$request->q1."%"):$recipe;
        $recipe = !empty($request->q2) ? $recipe->orWhere('bahan','like',"%".$request->q2."%"):$recipe;
        $recipe = !empty($request->q3) ? $recipe->orWhere('bahan','like',"%".$request->q3."%"):$recipe;
        $recipe = !empty($request->q4) ? $recipe->orWhere('bahan','like',"%".$request->q4."%"):$recipe;
        $recipe = !empty($request->q5) ? $recipe->orWhere('bahan','like',"%".$request->q5."%"):$recipe;

        if(!empty($request->q1)||!empty($request->q2)||!empty($request->q3)||!empty($request->q4)||!empty($request->q5))
        {
            $response = array('status'=>'success','data' => $recipe->get());
            return json_encode($response);
        }
        else
        {
            $response = array('status'=>'failed','message' => 'bad request');
            return json_encode($response);
        }
    }

    //CARIINAPP RECIPE END ============================================================================================
}
