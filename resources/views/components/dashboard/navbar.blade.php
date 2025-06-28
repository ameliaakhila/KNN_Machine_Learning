{{--! Header Start --}}
<header class="app-header shadow-lg">
    <nav class="navbar navbar-expand-lg navbar-light px-sm-3 px-0">
        <ul class="navbar-nav w-100 d-flex align-items-center justify-content-between">

            {{--! Sidebar Toggle (Hamburger) for Mobile --}}
            <li class="nav-item d-lg-none">
                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2 fs-4"></i>
                </a>
            </li>

            {{--! Branding (Center Aligned) --}}
            <li class="nav-item mx-auto">
                <a class="navbar-brand d-flex align-items-center gap-2 mb-0" href="#">
                    <i class="ti ti-atom fs-6"></i>
                    <span class="fw-semibold d-none d-sm-inline">Mari Belajar KNN</span>
                </a>
            </li>

        </ul>

        {{--! Navbar Right (User Menu) --}}
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown">
                    <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ asset('assets/images/profile/user-2.jpg') }}" alt="User" width="35" height="35"
                            class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">My Profile</p>
                            </a>
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-mail fs-6"></i>
                                <p class="mb-0 fs-3">My Account</p>
                            </a>
                            <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-list-check fs-6"></i>
                                <p class="mb-0 fs-3">My Task</p>
                            </a>
                            <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
{{--! Header End --}}