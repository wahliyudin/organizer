<?php

namespace App\Http\Controllers;

use App\Http\Requests\StokRequest;
use App\Models\DataAyam;
use App\Models\Stok;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StokController extends Controller
{
    public function index()
    {
        $stoks = Stok::query()->get();
        $dataAyams = DataAyam::query()->get();
        return view('stok.index', compact('stoks', 'dataAyams'));
    }

    public function store(StokRequest $request)
    {
        try {
            Stok::query()->create([
                'kode_data_ayam' => $request->kode_data_ayam,
                'jumlah' => $request->jumlah,
                'berat' => $request->berat,
            ]);
            return response()->json([
                'message' => "Berhasil disimpan"
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Stok $stok)
    {
        try {
            return response()->json([
                'key' => $stok->getKey(),
                'kode_data_ayam' => $stok->kode_data_ayam,
                'jumlah' => $stok->jumlah,
                'berat' => $stok->berat,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(StokRequest $request, Stok $stok)
    {
        try {
            $stok->update([
                'kode_data_ayam' => $request->kode_data_ayam,
                'jumlah' => $request->jumlah,
                'berat' => $request->berat,
            ]);
            return response()->json([
                'message' => "Berhasil diubah"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Stok $stok)
    {
        try {
            $stok->delete();
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
            Stok::query()->whereIn('kode', $request->kodes)->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
