<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show($id)
    {
        return User::findOrFail($id);
    }

    public function update(Request $request)
    {
        $user = $request->user(); // Mengambil pengguna yang sedang terautentikasi

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Memperbarui data pengguna
        $user->name = $request->name;
        $user->email = $request->email;

        // Update password jika diberikan
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $response = [
            'user' => $user,
            'message' => 'berhasil mengupdate profil'
        ];

        return response($response, 200);
    }
}
