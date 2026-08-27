<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Http\Resources\UserResource;
use App\HttpResponse;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    
    use HttpResponse;
    public function register(RegisterRequest $request)
    {
        $temp=$request->validated();
        $user=User::create($temp);
        $user->assignRole('customer');
        return $this->success([
            'user'=>new UserResource($user),
            'token'=>$user->createToken('access_token')->plainTextToken
        ],'User Registered Successfully',201);
    }
    public function login(LoginRequest $request)
    {
        try {
            $temp=$request->validated();
            if(!Auth::attempt($temp)){
                return $this->error('Invalid Credentials',401);
            }
            $user=Auth::user();
            $user->tokens()->delete();
            return $this->success([
                'user'=>new UserResource($user),
                'token'=>$user->createToken('access_token')->plainTextToken
            ],'User Logged In Successfully',200);
            
        } catch (\Throwable $th) {
            return $this->error('Failed to Login User',500);
        }
    }
    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return $this->success(null,'User Logged Out Successfully',200);
            
        } catch (\Throwable $th) {
            return $this->error('Failed to Logout User',500);
        }
    }
}
