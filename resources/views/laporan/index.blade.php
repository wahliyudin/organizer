@extends('layouts.master')

@push('css')
@endpush

@section('header')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">Laporan</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('laporan.jurnal') }}" method="POST" class="row align-items-end">
                    @csrf
                    <div class="mb-3 col-md-5">
                        <label class="form-label" for="tanggal_awal">Tanggal Awal</label>
                        <input type="text" class="js-flatpickr form-control flatpickr-custom" placeholder="Select dates"
                            name="tanggal_awal" value="{{ now()->format('Y-m-d') }}"
                            data-hs-flatpickr-options='{"dateFormat": "Y-m-d"}'>
                    </div>
                    <div class="mb-3 col-md-5">
                        <label class="form-label" for="tanggal_akhir">Tanggal Akhir</label>
                        <input type="text" class="js-flatpickr form-control flatpickr-custom" placeholder="Select dates"
                            name="tanggal_akhir" value="{{ now()->format('Y-m-d') }}"
                            data-hs-flatpickr-options='{"dateFormat": "Y-m-d"}'>
                    </div>
                    <div class="mb-3 col-md-2">
                        <button type="submit" class="btn btn-success">Download</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        HSCore.components.HSFlatpickr.init('.js-flatpickr');
    </script>
@endpush
