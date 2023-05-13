<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::query()->get();
        return view('customer.index', compact('customers'));
    }

    public function store(CustomerRequest $request)
    {
        try {
            Customer::query()->create([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);
            return response()->json([
                'message' => "Berhasil disimpan"
            ], Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Customer $customer)
    {
        try {
            return response()->json([
                'key' => $customer->getKey(),
                'nama' => $customer->nama,
                'no_hp' => $customer->no_hp,
                'alamat' => $customer->alamat,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function update(CustomerRequest $request, Customer $customer)
    {
        try {
            $customer->update([
                'nama' => $request->nama,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
            ]);
            return response()->json([
                'message' => "Berhasil diubah"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Customer $customer)
    {
        try {
            $customer->delete();
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
            Customer::query()->whereIn('kode', $request->kodes)->delete();
            return response()->json([
                'message' => "Berhasil dihapus"
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
