<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (!Auth::attempt($credentials)) {
            return response([
                'message' => 'Invalid credentials'
            ], Response::HTTP_UNAUTHORIZED);
        }

        /** @var \App\Models\User $user **/
        $user =  Auth::user();

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('jwt', $token, 60 * 24);

        return response([
            'message' => 'Success',
            'user' => $user
        ])->withCookie($cookie);
    }

    public function user()
    {
        return new UserResource(Auth::user());
    }

    public function logout()
    {
        $cookie = Cookie::forget('jwt');
        return response([
            'message' => 'Logged out'
        ])->withCookie($cookie);
    }
}
