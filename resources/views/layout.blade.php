<x-header />

<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Top Strip -->
    <div class="app-topstrip bg-primary py-6 px-3 w-100 d-flex align-items-center justify-content-center">
        <h3 class="animate__animated animate__flipInX text-light m-0 text-center">K-Nearest Neighbors</h3>
    </div>

    <!-- Sidebar -->
    <x-aside />

    <!-- Main Body -->
    <div class="body-wrapper">
        <!-- Navbar -->
        <x-navbar />

        <!-- Content Area -->
        <div class="body-wrapper-inner">
            <div class="container-fluid">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>