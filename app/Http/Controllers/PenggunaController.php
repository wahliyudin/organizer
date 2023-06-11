<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class PenggunaController extends Controller
{
    public function index()
    {
        $penggunas = User::query()->get();
        return view('pengguna.index', compact('penggunas'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required',
                'role' => 'required',
            ]);
            User::query()->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            return response()->json([
                'message' => "Berhasil disimpan"
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(User $user)
    {
        try {
            return response()->json([
                'key' => $user->getKey(),
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, User $user)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => "required|unique:users,email,{$user->getKey()},id",
                'password' => 'required',
                'role' => 'required',
            ]);
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            return response()->json([
                'message' => "Berhasil diubah"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
