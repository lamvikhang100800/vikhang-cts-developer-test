<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller

{
    public function show(Request $request ){
        return view('login');
    }
    public function login(Request $request ){
        $email = User::where('email','=',$request->email)->get();
        if($email ){
            $credentials = request(['email', 'password']);

            if (! $token = auth()->attempt($credentials)) {
                 echo('sai mat khau');
            }
            $this->respondWithToken($token);
            Session::put('access_token',$token);
            return Redirect::to('/form');
        }
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
