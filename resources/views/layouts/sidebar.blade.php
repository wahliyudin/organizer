<aside
    class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
        <div class="navbar-vertical-footer-offset">
            <a class="navbar-brand d-flex justify-content-center" href="{{ route('home') }}" aria-label="Front">
                <img class="navbar-brand-logo pt-4" style="max-width: 70px !important; min-width: 70px !important;"
                    src="{{ asset('assets/img/logo.png') }}" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo pt-4" style="max-width: 70px !important; min-width: 70px !important;"
                    src="{{ asset('assets/img/logo.png') }}" alt="Logo" data-hs-theme-appearance="dark">
                <img class="navbar-brand-logo-mini pt-4" style="max-width: 40px !important; min-width: 40px !important;"
                    src="{{ asset('assets/img/logo.png') }}" alt="Logo" data-hs-theme-appearance="default">
                <img class="navbar-brand-logo-mini pt-4" style="max-width: 40px !important; min-width: 40px !important;"
                    src="{{ asset('assets/img/logo.png') }}" alt="Logo" data-hs-theme-appearance="dark">
            </a>
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align"
                    data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align"
                    data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>
            <div class="navbar-vertical-content">
                <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
                    <div class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}"
                            data-placement="left">
                            <i class="bi-house-door nav-icon"></i>
                            <span class="nav-link-title">Dahsboard</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pelanggan.index') ? 'active' : '' }}"
                            href="{{ route('pelanggan.index') }}" data-placement="left">
                            <i class="bi bi-people nav-icon"></i>
                            <span class="nav-link-title">Pelanggan</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link {{ request()->routeIs('data-ayam.index') ? 'active' : '' }}"
                            href="{{ route('data-ayam.index') }}" data-placement="left">
                            <i class="bi bi-box-fill nav-icon"></i>
                            <span class="nav-link-title">Data Ayam</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link {{ request()->routeIs('stok.index') ? 'active' : '' }}"
                            href="{{ route('stok.index') }}" data-placement="left">
                            <i class="bi bi-boxes nav-icon"></i>
                            <span class="nav-link-title">Stok</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link {{ request()->routeIs('jenis-akun.index') ? 'active' : '' }}"
                            href="{{ route('jenis-akun.index') }}" data-placement="left">
                            <i class="bi bi-currency-exchange nav-icon"></i>
                            <span class="nav-link-title">Jenis Akun</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link {{ request()->routeIs('akun.index') ? 'active' : '' }}"
                            href="{{ route('akun.index') }}" data-placement="left">
                            <i class="bi bi-coin nav-icon"></i>
                            <span class="nav-link-title">Akun</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pesanan.index') ? 'active' : '' }}"
                            href="{{ route('pesanan.index') }}" data-placement="left">
                            <i class="bi-kanban nav-icon"></i>
                            <span class="nav-link-title">Pesanan</span>
                        </a>
                    </div>

                    <div class="nav-item">
                        <a class="nav-link {{ request()->routeIs('pembayaran.index') ? 'active' : '' }}"
                            href="{{ route('pembayaran.index') }}" data-placement="left">
                            <i class="bi bi-credit-card nav-icon"></i>
                            <span class="nav-link-title">Pembayaran</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>
