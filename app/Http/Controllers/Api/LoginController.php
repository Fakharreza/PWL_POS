<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function __invoke(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password'=> 'required',
        ]);

        //if validator fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);   
        }
        
        // Get Credentials from request
        $credentials = $request->only('username','password');


        // Return Response JSON user is created
        if (!$token = auth()->guard('api')->attempt($credentials)) {
            return response()->json([
                'success' => true,
                'message' => 'Username atau password salah',
            ],401);
        }

        // Return JSON process insert failed
        return response()->json([
            'success'=> true,
            'user'  => auth()->guard('api')->user(),
            'token' => $token
        ],200);
    }
}
