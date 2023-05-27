<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Perkilo;
use App\Models\Pesanan;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $customers = Customer::query()->get();
        $pakets = Perkilo::query()->get();
        $pesanans = Pesanan::query()->get();
        $kode_po = IdGenerator::generate(['table' => 'pesanan', 'field' => 'kode', 'length' => 6, 'prefix' => 'PO-']);
        return view('pesanan.index', compact('pesanans', 'customers', 'pakets', 'kode_po'));
    }

    public function customer(Customer $customer)
    {
        try {
            return response()->json([
                'nama' => $customer->nama
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function paket(Perkilo $perkilo)
    {
        try {
            return response()->json([
                'nama' => $perkilo->nama,
                'harga' => number_format($perkilo->harga, 0, ',', '.')
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

    public function store(Request $request)
    {
        try {
            Pesanan::query()->create([
                'kode' => $request->kode,
                'tanggal' => $request->tanggal,
                'kode_customer' => $request->kode_customer,
                'kode_perkilo' => $request->kode_paket,
                'down_payment' => str($request->down_payment)->replace('.', ''),
            ]);
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
            $pesanan->load(['customer', 'perkilo']);
            return response()->json([
                'kode' => $pesanan->kode,
                'tanggal' => $pesanan->tanggal,
                'kode_customer' => $pesanan->kode_customer,
                'nama_customer' => $pesanan->customer?->nama,
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
                'kode_customer' => $request->kode_customer,
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
