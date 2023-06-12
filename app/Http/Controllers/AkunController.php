<?php

namespace App\Http\Controllers;

use App\Enums\JenisAkun;
use App\Http\Requests\AkunRequest;
use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AkunController extends Controller
{
    public function index()
    {
        $akuns = Akun::query()->get();
        return view('akun.index', compact('akuns'));
    }

    public function store(AkunRequest $request)
    {
        try {
            Akun::query()->create([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'jenis_akun' => $request->jenis_akun,
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
                'jenis_akun' => $akun->jenis_akun,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(AkunRequest $request, Akun $akun)
    {
        try {
            $akun->update([
                'kode' => $request->kode,
                'nama' => $request->nama,
                'jenis_akun' => $request->jenis_akun,
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

    public function getNumber($value)
    {
        try {
            return response()->json([
                'kode' => $this->generateNumber($value)
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function generateNumber($val)
    {
        $jenisAkun = match ((int)$val) {
            JenisAkun::AKTIVA_LANCAR->value => JenisAkun::AKTIVA_LANCAR,
            JenisAkun::INVESTASI_JANGKA_PANJANG->value => JenisAkun::INVESTASI_JANGKA_PANJANG,
            JenisAkun::AKTIVA_TETAP->value => JenisAkun::AKTIVA_TETAP,
            JenisAkun::AKTIVA_TETAP_TIDAK_BERWUJUD->value => JenisAkun::AKTIVA_TETAP_TIDAK_BERWUJUD,
            JenisAkun::KEWAJIBAN->value => JenisAkun::KEWAJIBAN,
            JenisAkun::AKTIVA_LAIN_LAIN->value => JenisAkun::AKTIVA_LAIN_LAIN,
            JenisAkun::KEWAJIBAN_JANGKA_PANJANG->value => JenisAkun::KEWAJIBAN_JANGKA_PANJANG,
            JenisAkun::EKUITAS->value => JenisAkun::EKUITAS,
            JenisAkun::PENDAPATAN->value => JenisAkun::PENDAPATAN,
            JenisAkun::BEBAN->value => JenisAkun::BEBAN,
            default => 0,
        };
        $akun = Akun::query()->where('jenis_akun', $jenisAkun)->latest()->first();
        if ($akun) {
            $currentKode = (int) substr($akun->kode, 2) + 1;
        } else {
            $currentKode = 1;
        }
        return (string)$jenisAkun->kode() . $currentKode;
    }
}
