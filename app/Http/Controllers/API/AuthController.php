<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Validator;

class AuthController extends BaseController
{
    
    public function index(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return $this->errorResponse('Validation Error.', 'Credentials did not matched!');
        }

        $success['token']   =  $user->createToken('movie-api-token')->plainTextToken;
        $success['name']    =  $user->firstname;
   
        return $this->successResponse($success, 'User logged-in successfully.');

    }
    // Register a new user
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'firstname'     => 'required',
            'lastname'      => 'required',
            'email'         => 'required|email|unique:users',
            'password'      => 'required|min:5|max:12',
        ]);
   
        if($validator->fails()){
            return $this->errorResponse('Validation Error.', $validator->errors());       
        }
        //Using Query builder here instead of Eloquent
        $query = DB::table('users')
                    ->insert([
                        'firstname' => $request->firstname,
                        'lastname'  => $request->lastname,
                        'email'     => $request->email,
                        'password'  => Hash::make($request->password)
                    ]);

        if($query){
            return $this->successResponse($query, 'User registered successfully.');
        }
    }   

}
