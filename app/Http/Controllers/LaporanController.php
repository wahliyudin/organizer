<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function jurnal(Request $request)
    {
        $jurnals = Jurnal::query()->with(['jurnalDetails' => function ($query) use ($request) {
            $query->whereBetween('tanggal', [$request->tanggal_awal, $request->tanggal_akhir])->latest();
        }])->get();
        return Pdf::loadView('laporan.pdf', compact('jurnals'))->download();
    }
}