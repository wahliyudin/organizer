<?php

namespace App\Http\Controllers;

use App\Http\Requests\AkunRequest;
use App\Models\Akun;
use App\Models\JenisAkun;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AkunController extends Controller
{
    public function index()
    {
        $akuns = Akun::query()->with('jenisAkun')->get();
        $jenisAkuns = JenisAkun::query()->get();
        return view('akun.index', compact('akuns', 'jenisAkuns'));
    }

    public function store(AkunRequest $request)
    {
        try {
            Akun::query()->create([
                'nama' => $request->nama,
                'kode_jenis_akun' => $request->kode_jenis_akun,
            ]);
            return response()->json([
                'message' => "Berhasil disimpan"
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Akun $akun)
    {
        try {
            return response()->json([
                'key' => $akun->getKey(),
                'nama' => $akun->nama,
                'kode_jenis_akun' => $akun->kode_jenis_akun,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(AkunRequest $request, Akun $akun)
    {
        try {
            $akun->update([
                'nama' => $request->nama,
                'kode_jenis_akun' => $request->kode_jenis_akun,
            ]);
            return response()->json([
                'message' => "Berhasil diubah"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Akun $akun)
    {
        try {
            $akun->delete();
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
            Akun::query()->whereIn('kode', $request->kodes)->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
