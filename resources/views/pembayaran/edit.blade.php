@extends('layouts.master')

@push('css')
@endpush

@section('header')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">Pembayaran</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <form class="form-add-modal form-pembayaran">
                    <input type="hidden" name="kode_jurnal">
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="kode">Kode Pembayaran</label>
                            <input type="text" readonly id="kode" name="kode" class="form-control"
                                value="{{ $pembayaran->kode }}">
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="tanggal">Tanggal</label>
                            <input type="text" class="js-flatpickr form-control flatpickr-custom"
                                placeholder="Select dates" name="tanggal" value="{{ $pembayaran->tanggal }}"
                                data-hs-flatpickr-options='{"dateFormat": "Y-m-d"}'>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="kode_pesanan">Kode Pesanan</label>
                            <div class="tom-select-custom tom-select-custom-with-tags">
                                <select class="js-select form-select" name="kode_pesanan" autocomplete="off"
                                    data-hs-tom-select-options='{
                                              "placeholder": "Select a pesanan..."
                                            }'>
                                    <option value="">Select a pesanan...</option>
                                    @foreach ($pesanans as $pesanan)
                                        <option @selected($pembayaran->kode_pesanan == $pesanan->kode) value="{{ $pesanan->kode }}">
                                            {{ $pesanan->kode }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="kode_akun">Kode Akun</label>
                            <div class="tom-select-custom tom-select-custom-with-tags">
                                <select class="js-select form-select" name="kode_akun" autocomplete="off"
                                    data-hs-tom-select-options='{
                                              "placeholder": "Select a customer..."
                                            }'>
                                    <option value="">Select a customer...</option>
                                    @foreach ($akuns as $akun)
                                        <option @selected($pembayaran->kode_akun == $akun->kode) value="{{ $akun->kode }}">{{ $akun->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="total_pesanan">Total Pesanan</label>
                            <input readonly class="form-control form-control-solid uang" name="total_pesanan"
                                placeholder="Jumlah" value="{{ number_format($totalPesanan, 0, ',', '.') }}"
                                id="total_pesanan" />
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="jumlah_bayar">Jumlah Bayar</label>
                            <input class="form-control form-control-solid uang" name="jumlah_bayar"
                                placeholder="Jumlah Bayar" value="{{ number_format($pembayaran->jumlah, 0, ',', '.') }}"
                                id="jumlah_bayar" />
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="kurang_bayar">Kurang Bayar</label>
                            <input readonly class="form-control form-control-solid uang" name="kurang_bayar"
                                placeholder="Kurang Bayar" value="{{ number_format($kurangBayar, 0, ',', '.') }}"
                                id="kurang_bayar" />
                        </div>
                        <div class="mb-3 col-md-3">
                            <label class="form-label" for="kembalian">Kembalian</label>
                            <input readonly class="form-control form-control-solid uang" name="kembalian"
                                placeholder="Kembalian" value="{{ number_format($kembalian, 0, ',', '.') }}"
                                id="kembalian" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" class="btn btn-success d-flex gap-2 align-items-center simpan">
                            <i class="bi bi-clipboard-check-fill"></i>
                            <span>Simpan</span>
                            <div class="spinner-border text-light spinner-border-sm loading" style="display: none;"
                                role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <script>
        $(document).on('ready', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.uang').mask('0.000.000.000', {
                reverse: true
            });
            HSCore.components.HSFlatpickr.init('.js-flatpickr');
            HSCore.components.HSTomSelect.init('.js-select');
            HSCore.components.HSMask.init('.js-input-mask');

            $('.simpan').click(function(e) {
                e.preventDefault();
                var postData = new FormData($(".form-pembayaran")[0]);
                $('.simpan .loading').show();
                $.ajax({
                    type: 'POST',
                    url: `/pembayaran/{{ $pembayaran->kode }}/update`,
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(response) {
                        $('.simpan .loading').hide();
                        Swal.fire(
                            'Created!',
                            response.message,
                            'success'
                        ).then(function() {
                            location.reload();
                        });
                    },
                    error: function(jqXHR, xhr, textStatus, errorThrow, exception) {
                        $('.simpan .loading').hide();
                        if (jqXHR.status == 500) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong',
                                'error'
                            );
                        }
                        if (jqXHR.status == 422) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan!',
                                text: JSON.parse(jqXHR.responseText).message,
                            })
                        }
                    }
                });
            });

            $('select[name="kode_pesanan"]').change(function(e) {
                e.preventDefault();
                var pesanan = $(this).val();
                $.ajax({
                    type: "POST",
                    url: `/pembayaran/${pesanan}/pesanan`,
                    dataType: "JSON",
                    success: function(response) {
                        $('input[name="kode_jurnal"]').val(response.kode_jurnal);
                        $('input[name="total_pesanan"]').val(response.total_pesanan).trigger(
                            'input');
                    },
                    error: function(jqXHR, xhr, textStatus, errorThrow, exception) {
                        if (jqXHR.status == 500) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong',
                                'error'
                            );
                        }
                        if (jqXHR.status == 422) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan!',
                                text: JSON.parse(jqXHR.responseText).message,
                            })
                        }
                    }
                });
            });

            $('input[name="jumlah_bayar"]').keyup(function(e) {
                e.preventDefault();
                var value = numberFromString($(this).val());
                var totalPesanan = numberFromString($('input[name="total_pesanan"]').val());
                var result = value - totalPesanan;
                if (result < 0) {
                    $('input[name="kurang_bayar"]').val(Math.abs(result)).trigger('input');
                    result = 0;
                } else {
                    $('input[name="kurang_bayar"]').val(0).trigger('input');
                }
                $('input[name="kembalian"]').val(result).trigger('input');
            });

            function numberFromString(s) {
                return typeof s === 'string' ?
                    s.replace(/[\$.]/g, '') * 1 :
                    typeof s === 'number' ?
                    s : 0;
            }
        });
    </script>
@endpush
