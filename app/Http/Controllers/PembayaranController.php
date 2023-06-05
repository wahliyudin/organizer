<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Jurnal;
use App\Models\Pembayaran;
use App\Models\Pesanan;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::query()->get();
        return view('pembayaran.index', compact('pembayarans'));
    }

    public function pesanan(Pesanan $pesanan)
    {
        try {
            $pesanan->loadSum('pembayarans', 'jumlah');
            $total = 0;
            foreach ($pesanan->pesananDetails as $pesananDetail) {
                $total += ($pesananDetail->dataAyam?->harga * $pesananDetail->kuantitas);
            }
            $total -= $pesanan->pembayarans_sum_jumlah;
            return response()->json([
                'kode_jurnal' => $pesanan->kode_jurnal,
                'total_pesanan' => $total,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create()
    {
        $pesanans = Pesanan::query()->get();
        $akuns = Akun::query()->get();
        $kode = IdGenerator::generate(['table' => 'pesanan', 'field' => 'kode', 'length' => 6, 'prefix' => 'PO-']);
        return view('pembayaran.create', compact('pesanans', 'akuns', 'kode'));
    }

    public function store(Request $request)
    {
        try {
            $jumlahBayar = $request->jumlah_bayar;
            if ($request->kembalian) {
                $jumlahBayar = $request->total_pesanan;
            }
            $jurnal = Jurnal::query()->where('kode', $request->kode_jurnal)->first();
            $jurnal->jurnalDetails()->create([
                'tanggal' => $request->tanggal,
                'kode_akun' => $request->kode_akun,
                'debet' => str($jumlahBayar)->replace('.', ''),
            ]);
            Pembayaran::query()->create([
                'kode_pesanan' => $request->kode_pesanan,
                'tanggal' => $request->tanggal,
                'jumlah' => str($jumlahBayar)->replace('.', ''),
                'kode_akun' => $request->kode_akun,
                'kode_jurnal' => $jurnal->kode,
            ]);
            return response()->json([
                'message' => 'Berhasil disimpan'
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Pembayaran $pembayaran)
    {
        try {
            $pembayaran->load('pesanan.pesananDetails.dataAyam');
            $totalPesanan = 0;
            foreach ($pembayaran->pesanan->pesananDetails as $pesananDetail) {
                $totalPesanan += ($pesananDetail->dataAyam?->harga * $pesananDetail->kuantitas);
            }
            $result = $pembayaran->jumlah - $totalPesanan;
            if ($result < 0) {
                $kurangBayar = abs($result);
                $kembalian = 0;
            } else {
                $kurangBayar = 0;
                $kembalian = $result;
            }

            $pesanans = Pesanan::query()->get();
            $akuns = Akun::query()->get();
            $pembayaran->load('pesanan');
            return view('pembayaran.edit', compact('pembayaran', 'totalPesanan', 'kurangBayar', 'kembalian', 'pesanans', 'akuns'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        try {
            $jurnal = Jurnal::query()->where('kode', $pembayaran->kode_jurnal)->first();
            $jurnal->jurnalDetails()
                ->where('kode_akun', $pembayaran->kode_akun)
                ->where('debet', $pembayaran->jumlah)
                ->first()?->update([
                    'kode_akun' => $request->kode_akun,
                    'tanggal' => $request->tanggal,
                    'debet' => str($request->jumlah_bayar)->replace('.', ''),
                ]);
            $pembayaran->update([
                'kode_pesanan' => $request->kode_pesanan,
                'tanggal' => $request->tanggal,
                'jumlah' => str($request->jumlah_bayar)->replace('.', ''),
                'kode_akun' => $request->kode_akun,
                'kode_jurnal' => $jurnal->kode,
            ]);
            return response()->json([
                'message' => "Berhasil diubah"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Pembayaran $pembayaran)
    {
        try {
            $pembayaran->jurnal()->delete();
            $pembayaran->delete();
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
            return response()->json([]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
