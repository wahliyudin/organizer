<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataAyamRequest;
use App\Models\DataAyam;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DataAyamController extends Controller
{
    public function index()
    {
        $dataAyams = DataAyam::query()->get();
        return view('data-ayam.index', compact('dataAyams'));
    }

    public function store(DataAyamRequest $request)
    {
        try {
            DataAyam::query()->create([
                'kode' => $request->kode,
                'harga' => str($request->harga)->replace('.', ''),
            ]);
            return response()->json([
                'message' => "Berhasil disimpan"
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(DataAyam $dataAyam)
    {
        try {
            return response()->json([
                'key' => $dataAyam->getKey(),
                'harga' => $dataAyam->harga,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(DataAyamRequest $request, DataAyam $dataAyam)
    {
        try {
            $dataAyam->update([
                'kode' => $request->kode,
                'harga' => str($request->harga)->replace('.', ''),
            ]);
            return response()->json([
                'message' => "Berhasil diubah"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(DataAyam $dataAyam)
    {
        try {
            $dataAyam->delete();
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
            DataAyam::query()->whereIn('kode', $request->kodes)->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
