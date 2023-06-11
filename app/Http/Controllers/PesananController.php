<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Pelanggan;
use App\Models\DataAyam;
use App\Models\Jurnal;
use App\Models\Pesanan;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::query()->get();
        $dataAyams = DataAyam::query()->get();
        $pesanans = Pesanan::query()->get();
        $akuns = Akun::query()->get();
        $kode = IdGenerator::generate(['table' => 'pesanan', 'field' => 'kode', 'length' => 12, 'prefix' => 'P' . now()->format('ymd') . '-']);
        return view('pesanan.index', compact('pesanans', 'akuns', 'pelanggans', 'dataAyams', 'kode'));
    }

    public function pelanggan(Pelanggan $pelanggan)
    {
        try {
            return response()->json([
                'nama' => $pelanggan->nama
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function dataAyam(DataAyam $dataAyam)
    {
        try {
            return response()->json([
                'nama' => $dataAyam->nama,
                'harga' => $dataAyam->harga
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function kode()
    {
        try {
            return response()->json([
                'kode' => IdGenerator::generate(['table' => 'pesanan', 'field' => 'kode', 'length' => 12, 'prefix' => 'P' . now()->format('ymd') . '-']),
                'tanggal' => now()->format('Y-m-d'),
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create()
    {
        $pelanggans = Pelanggan::query()->get();
        $dataAyams = DataAyam::query()->get();
        $akuns = Akun::query()->get();
        $kode = IdGenerator::generate(['table' => 'pesanan', 'field' => 'kode', 'length' => 12, 'prefix' => 'P' . now()->format('ymd') . '-']);
        return view('pesanan.create', compact('pelanggans', 'dataAyams', 'akuns', 'kode'));
    }

    public function store(Request $request)
    {
        try {
            $jurnal = Jurnal::query()->create([
                'tanggal' => $request->tanggal,
            ]);
            $jurnal->jurnalDetails()->create([
                'kode_akun' => $request->kode_akun,
                'tanggal' => $request->tanggal,
                'kredit' => str($request->total)->replace('.', '')->value(),
            ]);
            $pesanan = Pesanan::query()->create([
                'kode' => $request->kode,
                'kode_pelanggan' => $request->kode_pelanggan,
                'tanggal' => $request->tanggal,
                'kode_akun' => $request->kode_akun,
                'keterangan' => $request->keterangan,
                'kode_jurnal' => $jurnal->kode,
            ]);
            $pesanan->pesananDetails()->createMany($request->detail_transaksi);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Pesanan $pesanan)
    {
        try {
            $pelanggans = Pelanggan::query()->get();
            $dataAyams = DataAyam::query()->get();
            $akuns = Akun::query()->get();
            $pesanan->load('pesananDetails.dataAyam', 'pelanggan');
            return view('pesanan.edit', compact('pesanan', 'pelanggans', 'dataAyams', 'akuns'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        try {
            $jurnal = Jurnal::query()->where('kode', $pesanan->kode_jurnal)->first();
            $jurnal?->update([
                'tanggal' => $request->tanggal,
            ]);
            $jurnal->jurnalDetails()->delete();
            $jurnal->jurnalDetails()->create([
                'kode_akun' => $request->kode_akun,
                'tanggal' => $request->tanggal,
                'kredit' => str($request->total)->replace('.', '')->value(),
            ]);
            $pesanan->update([
                'kode' => $request->kode,
                'kode_pelanggan' => $request->kode_pelanggan,
                'tanggal' => $request->tanggal,
                'kode_akun' => $request->kode_akun,
                'keterangan' => $request->keterangan,
                'kode_jurnal' => $jurnal->kode,
            ]);
            $pesanan->pesananDetails()->delete();
            $pesanan->pesananDetails()->createMany($request->detail_transaksi);
            return response()->json([
                'message' => "Berhasil diubah"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Pesanan $pesanan)
    {
        try {
            $pesanan->jurnal()->delete();
            $pesanan->delete();
            return response()->json([
                'message' => "Successfully"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroys(Request $request)
    {
        try {
            return response()->json([]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
