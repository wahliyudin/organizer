<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisAkunRequest;
use App\Models\JenisAkun;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class JenisAkunController extends Controller
{
    public function index()
    {
        $jenisAkuns = JenisAkun::query()->get();
        return view('jenis-akun.index', compact('jenisAkuns'));
    }

    public function store(JenisAkunRequest $request)
    {
        try {
            JenisAkun::query()->create([
                'nama' => $request->nama,
            ]);
            return response()->json([
                'message' => "Berhasil disimpan"
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(JenisAkun $jenisAkun)
    {
        try {
            return response()->json([
                'key' => $jenisAkun->getKey(),
                'nama' => $jenisAkun->nama,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(JenisAkunRequest $request, JenisAkun $jenisAkun)
    {
        try {
            $jenisAkun->update([
                'nama' => $request->nama,
            ]);
            return response()->json([
                'message' => "Berhasil diubah"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(JenisAkun $jenisAkun)
    {
        try {
            $jenisAkun->delete();
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
            JenisAkun::query()->whereIn('kode', $request->kodes)->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
