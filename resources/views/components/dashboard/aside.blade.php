{{--! Sidebar Start --}}
<aside class="left-sidebar">
    {{--! Sidebar scrol --}}
    <div>
        {{--! Brand Logo --}}
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/" class="text-nowrap logo-img mx-auto">
                <img src="assets/images/logos/logo.png" alt="Logo" height="75px" />
            </a>
        </div>

        {{--! Sidebar navigatio --}}
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">

                {{--! Home Section --}}
                <li class="nav-small-cap">
                    <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
                    <span class="hide-menu">Home</span>
                </li>

                {{--! Dashboard --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="/" aria-expanded="false">
                        <i class="ti ti-layout-grid"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                {{--! Data Training Section --}}
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between has-arrow" href="javascript:void(0)"
                        aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-database"></i>
                            </span>
                            <span class="hide-menu">Data Training</span>
                        </div>
                    </a>
                    <ul class="collapse first-level" aria-expanded="false">
                        {{--! Data Variabel --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="dataVariabel">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="ti ti-database-import fs-6"></i>
                                    </div>
                                    <span class="hide-menu">Variabel</span>
                                </div>
                            </a>
                        </li>

                        {{--! Data Sample --}}
                        <li class="sidebar-item">
                            <a class="sidebar-link justify-content-between" href="dataSample">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <i class="ti ti-database-export fs-6"></i>
                                    </div>
                                    <span class="hide-menu">Sample</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                {{--! Hasil Perhitungan --}}
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="hasilPerhitungan" aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-radar"></i>
                            </span>
                            <span class="hide-menu">Hasil Perhitungan</span>
                        </div>
                    </a>
                </li>

                {{--! Logout --}}
                <li class="sidebar-item">
                    <a class="sidebar-link justify-content-between" href="/logout"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        aria-expanded="false">
                        <div class="d-flex align-items-center gap-3">
                            <span class="d-flex">
                                <i class="ti ti-logout"></i>
                            </span>
                            <span class="hide-menu">Logout</span>
                        </div>
                    </a>
                </li>
            </ul>

            {{--! Hidden Logout Form --}}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>
        {{--! End Sidebar navigation --}}
    </div>
    {{--! End Sidebar scrol --}}
</aside>
{{--! End Sidebar Start --}}