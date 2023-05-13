@extends('layouts.master')

@section('header')
    <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-header-title">Dashboard</h1>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
    </div>
    <div class="d-grid d-sm-flex gap-2">
        <!-- Dropdown -->
        <div class="dropdown">
            <button type="button" class="btn btn-white w-100" id="showHideDropdown" data-bs-toggle="dropdown"
                aria-expanded="false" data-bs-auto-close="outside">
                <i class="bi-table me-1"></i> Columns <span
                    class="badge bg-soft-dark text-dark rounded-circle ms-1">6</span>
            </button>

            <div class="dropdown-menu dropdown-menu-end dropdown-card" aria-labelledby="showHideDropdown"
                style="width: 15rem;">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="d-grid gap-3">
                            <!-- Form Switch -->
                            <label class="row form-check form-switch" for="toggleColumn_product">
                                <span class="col-8 col-sm-9 ms-0">
                                    <span class="me-2">Product</span>
                                </span>
                                <span class="col-4 col-sm-3 text-end">
                                    <input type="checkbox" class="form-check-input" id="toggleColumn_product" checked>
                                </span>
                            </label>
                            <!-- End Form Switch -->

                            <!-- Form Switch -->
                            <label class="row form-check form-switch" for="toggleColumn_type">
                                <span class="col-8 col-sm-9 ms-0">
                                    <span class="me-2">Type</span>
                                </span>
                                <span class="col-4 col-sm-3 text-end">
                                    <input type="checkbox" class="form-check-input" id="toggleColumn_type" checked>
                                </span>
                            </label>
                            <!-- End Form Switch -->

                            <!-- Form Switch -->
                            <label class="row form-check form-switch" for="toggleColumn_vendor">
                                <span class="col-8 col-sm-9 ms-0">
                                    <span class="me-2">Vendor</span>
                                </span>
                                <span class="col-4 col-sm-3 text-end">
                                    <input type="checkbox" class="form-check-input" id="toggleColumn_vendor">
                                </span>
                            </label>
                            <!-- End Form Switch -->

                            <!-- Form Switch -->
                            <label class="row form-check form-switch" for="toggleColumn_stocks">
                                <span class="col-8 col-sm-9 ms-0">
                                    <span class="me-2">Stocks</span>
                                </span>
                                <span class="col-4 col-sm-3 text-end">
                                    <input type="checkbox" class="form-check-input" id="toggleColumn_stocks" checked>
                                </span>
                            </label>
                            <!-- End Form Switch -->

                            <!-- Form Switch -->
                            <label class="row form-check form-switch" for="toggleColumn_sku">
                                <span class="col-8 col-sm-9 ms-0">
                                    <span class="me-2">SKU</span>
                                </span>
                                <span class="col-4 col-sm-3 text-end">
                                    <input type="checkbox" class="form-check-input" id="toggleColumn_sku" checked>
                                </span>
                            </label>
                            <!-- End Form Switch -->

                            <!-- Form Switch -->
                            <label class="row form-check form-switch" for="toggleColumn_price">
                                <span class="col-8 col-sm-9 ms-0">
                                    <span class="me-2">Price</span>
                                </span>
                                <span class="col-4 col-sm-3 text-end">
                                    <input type="checkbox" class="form-check-input" id="toggleColumn_price" checked>
                                </span>
                            </label>
                            <!-- End Form Switch -->

                            <!-- Form Switch -->
                            <label class="row form-check form-switch" for="toggleColumn_quantity">
                                <span class="col-8 col-sm-9 ms-0">
                                    <span class="me-2">Quantity</span>
                                </span>
                                <span class="col-4 col-sm-3 text-end">
                                    <input type="checkbox" class="form-check-input" id="toggleColumn_quantity">
                                </span>
                            </label>
                            <!-- End Form Switch -->

                            <!-- Form Switch -->
                            <label class="row form-check form-switch" for="toggleColumn_variants">
                                <span class="col-8 col-sm-9 ms-0">
                                    <span class="me-2">Variants</span>
                                </span>
                                <span class="col-4 col-sm-3 text-end">
                                    <input type="checkbox" class="form-check-input" id="toggleColumn_variants" checked>
                                </span>
                            </label>
                            <!-- End Form Switch -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Dropdown -->
    </div>
    <div class="modal fade" id="exportProductsModal" tabindex="-1" aria-labelledby="exportProductsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="exportProductsModalLabel">Export products</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <p>This CSV file can update all product information. To update just inventory quantites use the <a
                            class="link" href="#">CSV file for inventory.</a></p>

                    <div class="mb-4">
                        <label class="form-label">Export</label>

                        <div class="d-grid gap-2">
                            <!-- Form Check -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exportProductsRadio"
                                    id="exportProductsRadio1" checked>
                                <label class="form-check-label" for="exportProductsRadio1">
                                    Current page
                                </label>
                            </div>
                            <!-- End Form Check -->

                            <!-- Form Check -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exportProductsRadio"
                                    id="exportProductsRadio2">
                                <label class="form-check-label" for="exportProductsRadio2">
                                    All products
                                </label>
                            </div>
                            <!-- End Form Check -->

                            <!-- Form Check -->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="exportProductsRadio"
                                    id="exportProductsRadio3">
                                <label class="form-check-label" for="exportProductsRadio3">
                                    Selected: 20 products
                                </label>
                            </div>
                            <!-- End Form Check -->
                        </div>
                    </div>

                    <label class="form-label">Export as</label>

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exportProductsAsRadio"
                            id="exportProductsAsRadio1" checked>
                        <label class="form-check-label" for="exportProductsAsRadio1">
                            CSV for Excel, Numbers, or other spreadsheet programs
                        </label>
                    </div>
                    <!-- End Form Check -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exportProductsAsRadio"
                            id="exportProductsAsRadio2">
                        <label class="form-check-label" for="exportProductsAsRadio2">
                            Plain CSV file
                        </label>
                    </div>
                    <!-- End Form Check -->
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="modal-footer gap-3">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button type="button" class="btn btn-primary">Export products</button>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="importProductsModal" tabindex="-1" aria-labelledby="importProductsModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id="importProductsModalLabel">Import products by CSV</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- End Header -->

                <!-- Body -->
                <div class="modal-body">
                    <p><a class="link" href="#">Download a sample CSV template</a> to see an example of the
                        format
                        required.</p>

                    <!-- Dropzone -->
                    <div id="attachFilesNewProjectLabel" class="js-dropzone dz-dropzone dz-dropzone-card mb-4">
                        <div class="dz-message">
                            <img class="avatar avatar-xl avatar-4x3 mb-3" src="assets/svg/illustrations/oc-browse.svg"
                                alt="Image Description" data-hs-theme-appearance="default">
                            <img class="avatar avatar-xl avatar-4x3 mb-3"
                                src="assets/svg/illustrations-light/oc-browse.svg" alt="Image Description"
                                data-hs-theme-appearance="dark">

                            <h5>Drag and drop your file here</h5>

                            <p class="mb-2">or</p>

                            <span class="btn btn-white btn-sm">Browse files</span>
                        </div>
                    </div>
                    <!-- End Dropzone -->

                    <!-- Form Check -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value=""
                            id="overwriteCurrentProductsCheckbox">
                        <label class="form-check-label" for="overwriteCurrentProductsCheckbox">
                            Overwrite any current products that have the same handle. Existing values will be used for
                            any missing
                            columns. <a href="#">Learn more</a>
                        </label>
                    </div>
                    <!-- End Form Check -->
                </div>
                <!-- End Body -->

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-bs-dismiss="modal"
                        aria-label="Close">Cancel</button>
                    <button type="button" class="btn btn-primary">Upload and continue</button>
                </div>
                <!-- End Footer -->
            </div>
        </div>
    </div>
@endsection


@push('modal')
@endpush


@push('js')
    <script>
        const datatable = HSCore.components.HSDatatables.getItem('datatable')

        $('.js-datatable-filter').on('change', function() {
            var $this = $(this),
                elVal = $this.val(),
                targetColumnIndex = $this.data('target-column-index');

            datatable.column(targetColumnIndex).search(elVal).draw();
        });

        $('#datatableSearch').on('mouseup', function(e) {
            var $input = $(this),
                oldValue = $input.val();

            if (oldValue == "") return;

            setTimeout(function() {
                var newValue = $input.val();

                if (newValue == "") {
                    // Gotcha
                    datatable.search('').draw();
                }
            }, 1);
        });

        $('#toggleColumn_product').change(function(e) {
            datatable.columns(1).visible(e.target.checked)
        })

        $('#toggleColumn_type').change(function(e) {
            datatable.columns(2).visible(e.target.checked)
        })

        datatable.columns(3).visible(false)

        $('#toggleColumn_vendor').change(function(e) {
            datatable.columns(3).visible(e.target.checked)
        })

        $('#toggleColumn_stocks').change(function(e) {
            datatable.columns(4).visible(e.target.checked)
        })

        $('#toggleColumn_sku').change(function(e) {
            datatable.columns(5).visible(e.target.checked)
        })

        $('#toggleColumn_price').change(function(e) {
            datatable.columns(6).visible(e.target.checked)
        })

        datatable.columns(7).visible(false)

        $('#toggleColumn_quantity').change(function(e) {
            datatable.columns(7).visible(e.target.checked)
        })

        $('#toggleColumn_variants').change(function(e) {
            datatable.columns(8).visible(e.target.checked)
        })
    </script>
@endpush
