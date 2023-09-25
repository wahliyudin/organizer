<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function datatable(Request $request)
    {
        return DataTables::collection($this->data($request->tanggal_awal, $request->tanggal_akhir))
            ->make();
    }

    private function data($tanggalAwal = null, $tanggalAkhir = null)
    {
        $results = [];
        Jurnal::query()->with(['jurnalDetails' => function ($query) use ($tanggalAwal, $tanggalAkhir) {
            $query->whereBetween('tanggal', [$tanggalAwal, $tanggalAkhir])->latest();
        }])->get()->map(function (Jurnal $jurnal) use (&$results) {
            foreach ($jurnal->jurnalDetails as $detail) {
                $i = 1;
                array_push($results, [
                    'kode_jurnal' => $i == 1 ? $jurnal->kode : '',
                    'akun' => $detail->akun?->nama,
                    'debet' => number_format($detail->debet, 0, ',', '.'),
                    'kredit' => number_format($detail->kredit, 0, ',', '.'),
                ]);
                $i++;
            }
        });
        return collect($results);
    }

    public function jurnal(Request $request)
    {
        $data = $this->data($request->tanggal_awal, $request->tanggal_akhir);
        return Pdf::loadView('laporan.pdf', compact('data'))->download();
    }
}
