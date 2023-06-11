<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('pengguna.index');
    }

    public function list()
    {
        $data = User::query()->get();
        return DataTables::of($data)
            ->editColumn('nama', function (User $user) {
                return $user->name;
            })
            ->editColumn('email', function (User $user) {
                return $user->email;
            })
            ->editColumn('role', function (User $user) {
                return $user->role->label();
            })
            ->editColumn('action', function (User $user) {
                return view('pengguna.action', compact('user'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        try {
            User::query()->updateOrCreate([
                'id' => $request->key
            ], [
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(User $user)
    {
        try {
            return response()->json($user);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json([
                'message' => 'Berhasil dihapus'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
