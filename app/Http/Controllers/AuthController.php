<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Registrasi 
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $response = [
            'user' => $user,
            'message' => 'akun berhasil dibuat'
        ];

        return response($response, 201);
    }

    // Login 
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['salah username/password.'],
            ]);
        }

        $token = $user->createToken('urang')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        // return response()->json([
        //     'user' => $user,
        //     'token' => $token
        // ]);

        return response($response, 200);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        $response = [
            'message' => 'berhasil logout, token dihapus',
        ];

        return response($response, 200);
    }
}
