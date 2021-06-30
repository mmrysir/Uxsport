<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use  Illuminate\Http\Response;
use  Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function register(Request $request)
    {

        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'

        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
        ]);

    

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token'=> $token
        ];

        return response($response, 201);
    }


    public function login (Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //check email

        $user = User::where('email', $fields['email'])->first();

        //check password

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return  response([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token'=> $token
        ];

        return response($response, 201);
    }
   
public function logout(Response $request){


    auth()->user()->tokens()->delete();

    return [
        'message'=> 'logged out'

    ];
}
    
}
