<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Http\Requests\LoginRequest;

class AuthController extends Controller
{

    /**
     * @param RegisterRequest $request
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|Response
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        $token = $user->createToken('registered')->plainTextToken;

        return response([
            'token' => $token,
            'message' => 'Registered Successfully.'
        ]);
    }


    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $token = Auth::user()->createToken('logged');
            return response([
                'token' => $token,
                'message' => 'login Successfully'
            ]);
        } else return response([
            'message'=>'user not registered'
        ]);
    }

}
