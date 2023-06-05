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
        $kode = IdGenerator::generate(['table' => 'pesanan', 'field' => 'kode', 'length' => 6, 'prefix' => 'PO-']);
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
                'kode' => IdGenerator::generate(['table' => 'pesanan', 'field' => 'kode', 'length' => 6, 'prefix' => 'PO-']),
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
        $kode = IdGenerator::generate(['table' => 'pesanan', 'field' => 'kode', 'length' => 6, 'prefix' => 'PO-']);
        return view('pesanan.create', compact('pelanggans', 'dataAyams', 'akuns', 'kode'));
    }

    public function store(Request $request)
    {
        try {
            $jurnal = Jurnal::query()->create([
                'tanggal' => $request->tanggal,
                'keterangan' => $request->keterangan,
            ]);
            $jurnal->jurnalDetails()->create([
                'kode_akun' => $request->kode_akun,
                'kredit' => str($request->total)->replace('.', '')->value(),
            ]);
            $pesanan = Pesanan::query()->create([
                'kode' => $request->kode,
                'kode_pelanggan' => $request->kode_pelanggan,
                'tanggal' => $request->tanggal,
                'kode_jurnal' => $jurnal->kode,
            ]);
            $pesanan->pesananDetails()->createMany($request->detail_transaksi);
            return response()->json([
                'message' => 'Successfully'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Pesanan $pesanan)
    {
        try {
            $pesanan->load(['pelanggan', 'perkilo']);
            return response()->json([
                'kode' => $pesanan->kode,
                'tanggal' => $pesanan->tanggal,
                'kode_pelanggan' => $pesanan->kode_pelanggan,
                'nama_pelanggan' => $pesanan->pelanggan?->nama,
                'kode_paket' => $pesanan->kode_perkilo,
                'nama_paket' => $pesanan->perkilo?->nama,
                'harga_paket' => number_format($pesanan->perkilo?->harga, 0, ',', '.'),
                'down_payment' => number_format($pesanan->down_payment, 0, ',', '.'),
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        try {
            $pesanan->update([
                'kode' => $request->kode,
                'tanggal' => $request->tanggal,
                'kode_pelanggan' => $request->kode_pelanggan,
                'kode_perkilo' => $request->kode_paket,
                'down_payment' => str($request->down_payment)->replace('.', ''),
            ]);
            return response()->json([]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Pesanan $pesanan)
    {
        try {
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
