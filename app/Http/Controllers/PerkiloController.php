<?php

namespace App\Http\Controllers;

use App\Http\Requests\PerkiloRequest;
use App\Models\Perkilo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PerkiloController extends Controller
{
    public function index()
    {
        $perkilos = Perkilo::query()->get();
        return view('perkilo.index', compact('perkilos'));
    }

    public function store(PerkiloRequest $request)
    {
        try {
            Perkilo::query()->create([
                'nama' => $request->nama,
                'harga' => $request->harga,
            ]);
            return response()->json([
                'message' => "Berhasil disimpan"
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Perkilo $perkilo)
    {
        try {
            return response()->json([
                'key' => $perkilo->getKey(),
                'nama' => $perkilo->nama,
                'harga' => $perkilo->harga,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(PerkiloRequest $request, Perkilo $perkilo)
    {
        try {
            $perkilo->update([
                'nama' => $request->nama,
                'harga' => $request->harga,
            ]);
            return response()->json([
                'message' => "Berhasil diubah"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Perkilo $perkilo)
    {
        try {
            $perkilo->delete();
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
            Perkilo::query()->whereIn('kode', $request->kodes)->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}