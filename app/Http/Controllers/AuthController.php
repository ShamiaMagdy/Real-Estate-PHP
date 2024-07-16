<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function RegisterAdmin(RegisterRequest $request)
    {
        return $this->CreateUser($request, $request->role);
    }
    public function Register(RegisterRequest $request)
    {
        return $this->CreateUser($request, $request->role);
    }
    // public function RegisterAgent(RegisterRequest $request)
    // {
    //     return $this->CreateUser($request, 3);
    // }

    public function CreateUser(RegisterRequest $request, $role)
    {
        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'adress' => $request->adress,
            'unitsofinterest' => $request->unitsofinterest,
            'numofbeds' => $request->numofbeds,
            'role' => $role,
        ]);
        $token = $user->createToken('Auth_token')->plainTextToken;
        return response()->json([$user, 'token' => $token]);
    }

    public function Login(LoginRequest $request)
    {
        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }
        $token = $user->createToken('Auth_token')->plainTextToken;
        return response()->json([$user, 'token' => $token]);
    }

    public function Logout()
    {
        Auth::logout();
    }
}
