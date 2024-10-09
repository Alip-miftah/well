<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Tampilkan halaman register.
     */
    public function index()
    {
        return view('admin.siswa.register');
    }

    /**
     * Proses penyimpanan data registrasi.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);

        // Simpan user baru
        $user = User::create([
            'name' => $request->input('nama_lengkap'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')) // Hashing password
        ]);

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Register Berhasil!'
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Register Gagal!'
            ], 400);
        }
    }
    
}
