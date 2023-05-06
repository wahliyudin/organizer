<header id="header"
    class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-container navbar-bordered bg-white">
    <div class="navbar-nav-wrap">
        <!-- Logo -->
        <a class="navbar-brand" href="index.html" aria-label="Front">
            <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos/logo.svg') }}" alt="Logo"
                data-hs-theme-appearance="default">
            <img class="navbar-brand-logo" src="{{ asset('assets/svg/logos-light/logo.svg') }}" alt="Logo"
                data-hs-theme-appearance="dark">
            <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos/logo-short.svg') }}" alt="Logo"
                data-hs-theme-appearance="default">
            <img class="navbar-brand-logo-mini" src="{{ asset('assets/svg/logos-light/logo-short.svg') }}"
                alt="Logo" data-hs-theme-appearance="dark">
        </a>
        <!-- End Logo -->

        <div class="navbar-nav-wrap-content-start">
            <!-- Navbar Vertical Toggle -->
            <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
                <i class="bi-arrow-bar-left navbar-toggler-short-align"
                    data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
                <i class="bi-arrow-bar-right navbar-toggler-full-align"
                    data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
            </button>

            <!-- End Navbar Vertical Toggle -->
        </div>

        <div class="navbar-nav-wrap-content-end">
            <!-- Navbar -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="navbar-dropdown-account-wrapper" href="javascript:;" id="accountNavbarDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside"
                            data-bs-dropdown-animation>
                            <div class="avatar avatar-sm avatar-circle">
                                <img class="avatar-img" src="{{ asset('assets/img/160x160/img6.jpg') }}"
                                    alt="Image Description">
                                <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-account"
                            aria-labelledby="accountNavbarDropdown" style="width: 16rem;">
                            <div class="dropdown-item-text">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-sm avatar-circle">
                                        <img class="avatar-img" src="{{ asset('assets/img/160x160/img6.jpg') }}"
                                            alt="Image Description">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-0">Mark Williams</h5>
                                        <p class="card-text text-body">mark@site.com</p>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="dropdown">
                                <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle"
                                    href="javascript:;" id="navSubmenuPagesAccountDropdown1" data-bs-toggle="dropdown"
                                    aria-expanded="false">Set status</a>

                                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu"
                                    aria-labelledby="navSubmenuPagesAccountDropdown1">
                                    <a class="dropdown-item" href="#">
                                        <span class="legend-indicator bg-success me-1"></span> Available
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="legend-indicator bg-danger me-1"></span> Busy
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <span class="legend-indicator bg-warning me-1"></span> Away
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#"> Reset status
                                    </a>
                                </div>
                            </div>

                            <a class="dropdown-item" href="#">Profile &amp; account</a>
                            <a class="dropdown-item" href="#">Settings</a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="#">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm avatar-dark avatar-circle">
                                            <span class="avatar-initials">HS</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-2">
                                        <h5 class="mb-0">Htmlstream <span
                                                class="badge bg-primary rounded-pill text-uppercase ms-1">PRO</span>
                                        </h5>
                                        <span class="card-text">hs.example.com</span>
                                    </div>
                                </div>
                            </a>

                            <div class="dropdown-divider"></div>

                            <div class="dropdown">
                                <a class="navbar-dropdown-submenu-item dropdown-item dropdown-toggle"
                                    href="javascript:;" id="navSubmenuPagesAccountDropdown2"
                                    data-bs-toggle="dropdown" aria-expanded="false">Customization</a>

                                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-menu navbar-dropdown-menu-borderless navbar-dropdown-sub-menu"
                                    aria-labelledby="navSubmenuPagesAccountDropdown2">
                                    <a class="dropdown-item" href="#">
                                        Invite people
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        Analytics
                                        <i class="bi-box-arrow-in-up-right"></i>
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        Customize Front
                                        <i class="bi-box-arrow-in-up-right"></i>
                                    </a>
                                </div>
                            </div>
                            <a class="dropdown-item" href="#">Manage team</a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="#">Sign out</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>
