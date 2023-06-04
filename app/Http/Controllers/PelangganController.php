<?php

namespace App\Http\Controllers;

use App\Http\Requests\PelangganRequest;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::query()->get();
        return view('pelanggan.index', compact('pelanggans'));
    }

    public function store(PelangganRequest $request)
    {
        try {
            Pelanggan::query()->create([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);
            return response()->json([
                'message' => "Berhasil disimpan"
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Pelanggan $pelanggan)
    {
        try {
            return response()->json([
                'key' => $pelanggan->getKey(),
                'nama' => $pelanggan->nama,
                'no_hp' => $pelanggan->no_hp,
                'alamat' => $pelanggan->alamat,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(PelangganRequest $request, Pelanggan $pelanggan)
    {
        try {
            $pelanggan->update([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);
            return response()->json([
                'message' => "Berhasil diubah"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Pelanggan $pelanggan)
    {
        try {
            $pelanggan->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroys(Request $request)
    {
        try {
            Pelanggan::query()->whereIn('kode', $request->kodes)->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
