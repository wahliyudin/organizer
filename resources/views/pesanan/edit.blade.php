@extends('layouts.master')

@push('css')
@endpush

@section('title', 'Edit | Pesanan')

@section('header')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">Pesanan</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <!-- Card -->
        <div class="card">
            <div class="card-body">
                <form class="form-add-modal form-pesanan">
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="kode">Kode Pesanan</label>
                            <input type="text" readonly id="kode" name="kode" class="form-control"
                                value="{{ $pesanan->kode }}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="tanggal">Tanggal</label>
                            <input type="text" class="js-flatpickr form-control flatpickr-custom"
                                placeholder="Select dates" name="tanggal" value="{{ $pesanan->tanggal }}"
                                data-hs-flatpickr-options='{"dateFormat": "Y-m-d"}'>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="kode_akun">Kode Akun</label>
                            <div class="tom-select-custom tom-select-custom-with-tags">
                                <select class="js-select form-select" name="kode_akun" autocomplete="off"
                                    data-hs-tom-select-options='{
                                              "placeholder": "Select a customer..."
                                            }'>
                                    <option value="">Select a customer...</option>
                                    @foreach ($akuns as $akun)
                                        <option @selected($pesanan->kode_akun == $akun->kode) value="{{ $akun->kode }}">{{ $akun->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="tanggal">Kode Pelanggan</label>
                            <div class="tom-select-custom tom-select-custom-with-tags">
                                <select class="js-select form-select" name="kode_pelanggan" autocomplete="off"
                                    data-hs-tom-select-options='{
                                              "placeholder": "Select a customer..."
                                            }'>
                                    <option value="">Select a customer...</option>
                                    @foreach ($pelanggans as $pelanggan)
                                        <option @selected($pesanan->kode_pelanggan == $pelanggan->kode) value="{{ $pelanggan->kode }}">
                                            {{ $pelanggan->kode }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="nama_customer">Nama Customer</label>
                            <input type="text" id="nama_customer" readonly name="nama_customer"
                                value="{{ $pesanan->pelanggan?->nama }}" class="form-control">
                        </div>
                    </div>
                    <table id="detail-pesanan" class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Data Ayam</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Kuantitas</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Hapus</th>
                            </tr>
                        </thead>
                        <tbody data-repeater-list="detail_transaksi">
                            @forelse ($pesanan->pesananDetails as $pesananDetail)
                                <tr data-repeater-item>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="tom-select-custom tom-select-custom-with-tags">
                                                <select class="form-select kode_data_ayam" name="kode_data_ayam">
                                                    <option selected disabled value="">Pilih ayam...</option>
                                                    @foreach ($dataAyams as $dataAyam)
                                                        <option @selected($pesananDetail->kode_data_ayam == $dataAyam->kode) value="{{ $dataAyam->kode }}">
                                                            {{ $dataAyam->kode }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <input readonly class="form-control form-control-solid uang harga"
                                                name="harga" placeholder="Harga"
                                                value="{{ number_format($pesananDetail->dataAyam?->harga, 0, ',', '.') }}"
                                                id="harga" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-solid kuantitas"
                                                name="kuantitas" value="{{ $pesananDetail->kuantitas }}"
                                                placeholder="Kuantitas" id="kuantitas" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <input readonly class="form-control form-control-solid uang jumlah"
                                                name="jumlah"
                                                value="{{ number_format($pesananDetail->dataAyam?->harga * $pesananDetail->kuantitas, 0, ',', '.') }}"
                                                placeholder="Jumlah" id="jumlah" />
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" data-repeater-delete class="btn btn-sm btn-danger">
                                            <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span
                                                    class="path2"></span><span class="path3"></span><span
                                                    class="path4"></span><span class="path5"></span></i>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr data-repeater-item>
                                    <td>
                                        <div class="col-md-12">
                                            <div class="tom-select-custom tom-select-custom-with-tags">
                                                <select class="form-select kode_data_ayam" name="kode_data_ayam">
                                                    <option selected disabled value="">Pilih ayam...</option>
                                                    @foreach ($dataAyams as $dataAyam)
                                                        <option value="{{ $dataAyam->kode }}">{{ $dataAyam->kode }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <input readonly class="form-control form-control-solid uang harga"
                                                name="harga" placeholder="Harga" id="harga" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <input type="number" class="form-control form-control-solid kuantitas"
                                                name="kuantitas" placeholder="Kuantitas" id="kuantitas" />
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-md-12">
                                            <input readonly class="form-control form-control-solid uang jumlah"
                                                name="jumlah" placeholder="Jumlah" id="jumlah" />
                                        </div>
                                    </td>
                                    <td>
                                        <button type="button" data-repeater-delete class="btn btn-sm btn-danger">
                                            <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span
                                                    class="path2"></span><span class="path3"></span><span
                                                    class="path4"></span><span class="path5"></span></i>
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-end">Total</td>
                                <td>
                                    <div class="col-md-12">
                                        <input readonly class="form-control form-control-solid uang" name="total"
                                            id="total" value="0" />
                                    </div>
                                </td>
                                <td>
                                    <button type="button" data-repeater-create class="btn btn-sm btn-primary">
                                        <i class="ki-duotone ki-plus fs-3"></i>
                                        Tambah
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
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
    <script src="{{ asset('assets/vendor/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>
    <script>
        $(document).on('ready', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#detail-pesanan').repeater({
                initEmpty: false,
                show: function() {
                    $(this).slideDown();
                    total();
                    initUang();
                },
                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                    var total = numberFromString($('input[name="total"]').val());
                    total -= numberFromString($($(this).find('.jumlah')).val());
                    $('input[name="total"]').val(total).trigger('input');
                    initUang();
                }
            });
            total();
            initUang();
            HSCore.components.HSFlatpickr.init('.js-flatpickr');
            HSCore.components.HSTomSelect.init('.js-select');
            HSCore.components.HSMask.init('.js-input-mask');

            $('select[name="kode_pelanggan"]').change(function(e) {
                e.preventDefault();
                var kode_pelanggan = $(this).val();
                if (!kode_pelanggan) {
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: `/pesanan/${kode_pelanggan}/pelanggan`,
                    dataType: "JSON",
                    success: function(response) {
                        $('input[name="nama_customer"]').val(response.nama);
                    },
                    error: function(jqXHR, xhr, textStatus, errorThrow, exception) {
                        if (jqXHR.status == 422) {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Peringatan!',
                                text: JSON.parse(jqXHR.responseText).message,
                            })
                        } else {
                            Swal.fire(
                                'Error!',
                                'Something went wrong',
                                'error'
                            );
                        }
                    }
                });
            });

            $('#detail-pesanan').on('change', '.kode_data_ayam', function(e) {
                e.preventDefault();
                var target = this;
                var kode_data_ayam = $(this).val();
                $.ajax({
                    type: "POST",
                    url: `/pesanan/${kode_data_ayam}/data-ayam`,
                    dataType: "JSON",
                    success: function(response) {
                        var tr = $(target).parent().parent().parent().parent();
                        $($(tr).find('.harga')).val(response.harga).trigger('input');
                        total();
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

            $('#detail-pesanan').on('change', '.kuantitas', function(e) {
                e.preventDefault();
                var value = $(this).val();
                var tr = $(this).parent().parent().parent();
                var harga = numberFromString($($(tr).find('.harga')).val());
                $($(tr).find('.jumlah')).val(harga * value).trigger('input');
                total();
            });

            $('.simpan').click(function(e) {
                e.preventDefault();
                var postData = new FormData($(".form-pesanan")[0]);
                $('.simpan .loading').show();
                $.ajax({
                    type: 'POST',
                    url: `/pesanan/{{ $pesanan->kode }}/update`,
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

            function total() {
                var total = 0;
                $('#detail-pesanan .jumlah').each(function(index, element) {
                    total += numberFromString($(element).val());
                });
                $('input[name="total"]').val(total).trigger('input');
            }

            function initUang() {
                $('.uang').mask('0.000.000.000', {
                    reverse: true
                });
            }

            function numberFromString(s) {
                return typeof s === 'string' ?
                    s.replace(/[\$.]/g, '') * 1 :
                    typeof s === 'number' ?
                    s : 0;
            }
        });
    </script>
@endpush
