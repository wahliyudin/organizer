@extends('layouts.master')

@push('css')
@endpush

@section('title', 'Pengguna')

@section('header')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">Pengguna</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="row justify-content-end mb-3">
            <div class="col-lg">
                <!-- Datatable Info -->
                <div id="datatableCounterInfo" style="display: none;">
                    <div class="d-sm-flex justify-content-lg-end align-items-sm-center">
                        <span class="d-block d-sm-inline-block fs-5 me-3 mb-2 mb-sm-0">
                            <span id="datatableCounter">0</span>
                            Selected
                        </span>
                        <button type="button" class="btn btn-outline-danger btn-sm mb-2 mb-sm-0 me-2 delete-all">
                            <i class="bi-trash"></i> Delete
                        </button>
                    </div>
                </div>
                <!-- End Datatable Info -->
            </div>
        </div>
        <!-- End Row -->

        <!-- Card -->
        <div class="card">
            <!-- Header -->
            <div class="card-header card-header-content-md-between">
                <div class="mb-2 mb-md-0">
                    <form>
                        <!-- Search -->
                        <div class="input-group input-group-merge input-group-flush">
                            <div class="input-group-prepend input-group-text">
                                <i class="bi-search"></i>
                            </div>
                            <input id="datatableSearch" type="search" class="form-control" placeholder="Search users"
                                aria-label="Search users">
                        </div>
                        <!-- End Search -->
                    </form>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-primary d-flex align-items-center gap-2 add"
                        data-bs-toggle="modal" data-bs-target="#add-modal">
                        <i class="bi bi-plus-circle"></i>
                        <span>Tambah Data</span>
                    </button>
                </div>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="table-responsive datatable-custom">
                <table id="datatable"
                    class="table table-borderless table-thead-bordered table-nowrap table-align-middle card-table w-100">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($penggunas as $pengguna)
                            <tr>
                                <td>{{ $pengguna->name }}</td>
                                <td>{{ $pengguna->email }}</td>
                                <td>{{ $pengguna->role?->label() }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <button
                                            class="btn btn-sm d-flex align-items-center gap-1 btn-info btn-active-light-primary edit"
                                            data-kode="{{ $pengguna->getKey() }}">
                                            <div class="spinner-border text-light spinner-border-sm loading"
                                                style="display: none;" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                            <span>Edit</span>
                                        </button>
                                        <button class="btn btn-sm btn-danger btn-active-light-danger ms-1 delete"
                                            data-kode="{{ $pengguna->getKey() }}">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Table -->

            <!-- Footer -->
            <div class="card-footer">
                <div class="row justify-content-center justify-content-sm-between align-items-sm-center">
                    <div class="col-sm mb-2 mb-sm-0">
                        <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                            <span class="me-2">Showing:</span>

                            <!-- Select -->
                            <div class="tom-select-custom">
                                <select id="datatableEntries" class="js-select form-select form-select-borderless w-auto"
                                    autocomplete="off"
                                    data-hs-tom-select-options='{
                                        "searchInDropdown": false,
                                        "hideSearch": true
                                    }'>
                                    <option value="12">12</option>
                                    <option value="14" selected>14</option>
                                    <option value="16">16</option>
                                    <option value="18">18</option>
                                </select>
                            </div>
                            <!-- End Select -->

                            <span class="text-secondary me-2">of</span>

                            <!-- Pagination Quantity -->
                            <span id="datatableWithPaginationInfoTotalQty"></span>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-sm-auto">
                        <div class="d-flex justify-content-center justify-content-sm-end">
                            <!-- Pagination -->
                            <nav id="datatablePagination" aria-label="Activity pagination"></nav>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Footer -->
        </div>
        <!-- End Card -->

    </div>
@endsection

@push('modal')
    <div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="add-modalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add-modalLabel">Tambah Pengguna</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="form-add-modal">
                        <div class="mb-3">
                            <label class="form-label" for="name">Nama</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="role">Role</label>
                            <div class="tom-select-custom tom-select-custom-with-tags">
                                <select class="js-select form-select" name="role" autocomplete="off"
                                    data-hs-tom-select-options='{
                                          "placeholder": "Select a role..."
                                        }'>
                                    <option value="">Select a role...</option>
                                    @foreach (\App\Enums\Role::cases() as $role)
                                        <option value="{{ $role->value }}">{{ $role->label() }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white d-flex gap-2 align-items-center" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle-fill"></i>
                        <span>Tutup</span>
                    </button>
                    <button type="button" data-pengguna=""
                        class="btn btn-primary d-flex gap-2 align-items-center simpan store-pengguna">
                        <i class="bi bi-clipboard-check-fill"></i>
                        <span>Simpan</span>
                        <div class="spinner-border text-light spinner-border-sm loading" style="display: none;"
                            role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on('ready', function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            HSCore.components.HSTomSelect.init('.js-select');
            HSCore.components.HSDatatables.init($('#datatable'), {
                columnDefs: [{
                    targets: [0, 3],
                    width: "5%",
                    orderable: false
                }],
                order: [],
                info: {
                    totalQty: "#datatableWithPaginationInfoTotalQty"
                },
                search: "#datatableSearch",
                entries: "#datatableEntries",
                pageLength: 5,
                isResponsive: false,
                isShowPaging: false,
                pagination: "datatablePagination",
                language: {
                    zeroRecords: `
                <div class="text-center p-4">
                    <img class="mb-3" src="./assets/svg/illustrations/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="default">
                    <img class="mb-3" src="./assets/svg/illustrations-light/oc-error.svg" alt="Image Description" style="width: 10rem;" data-hs-theme-appearance="dark">
                    <p class="mb-0">No data to show</p>
                </div>`,
                }
            });

            $('.add').click(function(e) {
                e.preventDefault();
                $('.form-add-modal select[name="role"]').val('').trigger('input');
                $('.form-add-modal input[name="name"]').val('');
                $('.form-add-modal input[name="email"]').val('');
                $('.form-add-modal input[name="password"]').val('');
                $('#add-modal .simpan').data('pengguna', '');
                $('#add-modal .simpan').removeClass('update-pengguna');
                $('#add-modal .simpan').addClass('store-pengguna');
                $('#add-modal #add-modalLabel').text('Tambah Pengguna');
            });

            $('#add-modal').on('click', '.store-pengguna', function(e) {
                e.preventDefault();
                var postData = new FormData($(".form-add-modal")[0]);
                $('#add-modal .simpan .loading').show();
                $.ajax({
                    type: 'POST',
                    url: "/pengguna/store",
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(response) {
                        $('#add-modal .simpan .loading').hide();
                        $('#add-modal').modal('hide');
                        Swal.fire(
                            'Success!',
                            response.message,
                            'success'
                        ).then(function() {
                            location.reload();
                        });
                    },
                    error: function(jqXHR, xhr, textStatus, errorThrow, exception) {
                        $('#add-modal .simpan .loading').hide();
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

            $('#datatable').on('click', '.edit', function(e) {
                e.preventDefault();
                var target = this;
                var pengguna = $(target).data('kode');
                $($(target).find('.loading')).show();
                $.ajax({
                    type: "POST",
                    url: `/pengguna/${pengguna}/edit`,
                    dataType: "JSON",
                    success: function(response) {
                        $($(target).find('.loading')).hide();
                        $('.form-add-modal select[name="role"]').val(response.role).trigger(
                            'change');
                        $('.form-add-modal input[name="email"]').val(response.email);
                        $('.form-add-modal input[name="name"]').val(response.name);
                        $('#add-modal .simpan').data('pengguna', response.key);
                        $('#add-modal .simpan').addClass('update-pengguna');
                        $('#add-modal .simpan').removeClass('store-pengguna');
                        $('#add-modal #add-modalLabel').text('Ubah Pengguna');
                        $('#add-modal').modal('show');
                    },
                    error: function(jqXHR, xhr, textStatus, errorThrow, exception) {
                        $($(target).find('.loading')).hide();
                        if (jqXHR.status == 500) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong',
                                'error'
                            );
                        }
                        if (jqXHR.status == 404) {
                            Swal.fire(
                                'Warning!',
                                'Not Found',
                                'warning'
                            );
                        }
                    }
                });
            });

            $('#add-modal').on('click', '.update-pengguna', function(e) {
                e.preventDefault();
                var postData = new FormData($(".form-add-modal")[0]);
                $('#add-modal .simpan .loading').show();
                var pengguna = $(this).data('pengguna');
                $.ajax({
                    type: 'POST',
                    url: `/pengguna/${pengguna}/update`,
                    processData: false,
                    contentType: false,
                    data: postData,
                    success: function(response) {
                        $('#add-modal .simpan .loading').hide();
                        $('#add-modal').modal('hide');
                        Swal.fire(
                            'Success!',
                            response.message,
                            'success'
                        ).then(function() {
                            location.reload();
                        });
                    },
                    error: function(jqXHR, xhr, textStatus, errorThrow, exception) {
                        $('#add-modal .simpan .loading').hide();
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
            $('#datatable').on('click', '.delete', function(e) {
                e.preventDefault();
                var pengguna = $(this).data('kode');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    preConfirm: () => {
                        return new Promise(function(resolve) {
                            $.ajax({
                                    type: "DELETE",
                                    url: `/pengguna/${pengguna}/destroy`,
                                    dataType: 'JSON',
                                })
                                .done(function(myAjaxJsonResponse) {
                                    Swal.fire(
                                        'Deleted!',
                                        myAjaxJsonResponse.message,
                                        'success'
                                    ).then(function() {
                                        location.reload();
                                    });
                                })
                                .fail(function(erordata) {
                                    if (erordata.status == 422) {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Warning!',
                                            text: erordata.responseJSON
                                                .message,
                                        })
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: erordata.responseJSON
                                                .message,
                                        })
                                    }
                                })
                        })
                    }
                })
            });
        });
    </script>
@endpush
