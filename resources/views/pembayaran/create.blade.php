@extends('layouts.master')

@push('css')
@endpush

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
                <form class="form-add-modal">
                    <div class="row justify-content-between">
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="kode">Kode Pesanan</label>
                            <input type="text" readonly id="kode" name="kode" class="form-control"
                                value="{{ $kode }}">
                        </div>
                        <div class="mb-3 col-md-4">
                            <label class="form-label" for="tanggal">Tanggal</label>
                            <input type="text" class="js-flatpickr form-control flatpickr-custom"
                                placeholder="Select dates" name="tanggal" value="{{ now()->format('Y-m-d') }}"
                                data-hs-flatpickr-options='{"dateFormat": "Y-m-d"}'>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 row">
                            <div style="height: 0 !important;" class="col-md-12">
                                <label class="form-label" for="tanggal">Kode Customer</label>
                                <div class="tom-select-custom tom-select-custom-with-tags">
                                    <select class="js-select form-select" name="kode_customer" autocomplete="off"
                                        data-hs-tom-select-options='{
                                              "placeholder": "Select a customer..."
                                            }'>
                                        <option value="">Select a customer...</option>
                                        @foreach ($pelanggans as $pelanggan)
                                            <option value="{{ $pelanggan->kode }}">{{ $pelanggan->kode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="nama_customer">Nama Customer</label>
                                <input type="text" id="nama_customer" readonly name="nama_customer" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="tanggal">Kode Paket</label>
                                <div class="tom-select-custom tom-select-custom-with-tags">
                                    <select class="js-select form-select" name="kode_paket" autocomplete="off"
                                        data-hs-tom-select-options='{
                                              "placeholder": "Select a paket..."
                                            }'>
                                        <option value="">Select a paket...</option>
                                        @foreach ($dataAyams as $dataAyam)
                                            <option value="{{ $dataAyam->kode }}">{{ $dataAyam->kode }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="nama_paket">Nama Paket</label>
                                <input type="text" id="nama_paket" readonly name="nama_paket" class="form-control">
                            </div>
                            <div class="mb-3 col-md-12">
                                <label class="form-label" for="harga_paket">Harga Paket</label>
                                <input type="text" id="harga_paket" readonly name="harga_paket" class="form-control">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="input-group my-3">
                            <span class="input-group-text text-black">Down Payment</span>
                            <input type="text" class="uang form-control" name="down_payment" id="basic-url">
                        </div>
                    </div> --}}
                    <table id="detail-pesanan" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Akun</th>
                                <th>Debet</th>
                                <th>Kredit</th>
                                <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody data-repeater-list="detail_transaksi">
                            <tr data-repeater-item>
                                <td>
                                    <div class="col-md-12 akun">
                                        <div class="tom-select-custom tom-select-custom-with-tags">
                                            <select class="form-select" name="kode_akun">
                                                <option selected disabled value="">Pilih akun...</option>
                                                @foreach ($akuns as $akun)
                                                    <option value="{{ $akun->kode }}">{{ $akun->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-12">
                                        <input class="form-control form-control-solid uang debet" name="debet"
                                            placeholder="Debet" id="debet" />
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-12">
                                        <input class="form-control form-control-solid uang kredit" name="kredit"
                                            placeholder="Kredit" id="kredit" />
                                    </div>
                                </td>
                                <td>
                                    <button type="button" data-repeater-delete class="btn btn-sm btn-light-danger">
                                        <i class="ki-duotone ki-trash fs-5"><span class="path1"></span><span
                                                class="path2"></span><span class="path3"></span><span
                                                class="path4"></span><span class="path5"></span></i>
                                        Hapus
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total</td>
                                <td>
                                    <div class="col-md-12">
                                        <input readonly class="form-control form-control-solid uang" name="total_debet"
                                            id="total_debet" value="0" />
                                    </div>
                                </td>
                                <td>
                                    <div class="col-md-12">
                                        <input readonly class="form-control form-control-solid uang" name="total_kredit"
                                            id="total_kredit" value="0" />
                                    </div>
                                </td>
                                <td>
                                    <button type="button" data-repeater-create class="btn btn-light-primary">
                                        <i class="ki-duotone ki-plus fs-3"></i>
                                        Tambah
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            </div>
        </div>
        <!-- End Card -->
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
            $('.uang').mask('0.000.000.000', {
                reverse: true
            });
            $('#detail-pesanan').repeater({
                initEmpty: false,

                show: function() {
                    $(this).slideDown();
                    // HSCore.components.HSTomSelect.init('.js-select');
                },

                hide: function(deleteElement) {
                    $(this).slideUp(deleteElement);
                }
            });
            HSCore.components.HSFlatpickr.init('.js-flatpickr');
            HSCore.components.HSTomSelect.init('.js-select');
            HSCore.components.HSMask.init('.js-input-mask');

            $('select[name="kode_customer"]').change(function(e) {
                e.preventDefault();
                var kode_customer = $(this).val();
                if (!kode_customer) {
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: `/pesanan/${kode_customer}/customer`,
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

            $('select[name="kode_paket"]').change(function(e) {
                e.preventDefault();
                var kode_paket = $(this).val();
                if (!kode_paket) {
                    return;
                }
                $.ajax({
                    type: "POST",
                    url: `/pesanan/${kode_paket}/paket`,
                    dataType: "JSON",
                    success: function(response) {
                        $('input[name="nama_paket"]').val(response.nama);
                        $('input[name="harga_paket"]').val(response.harga);
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
        });
    </script>
@endpush
