<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Calculate</title>

    {{--! Favicon --}}
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />

    {{--! Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{--! Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}">

    {{--! Animate.css --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    {{--! AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

    {{--! Scripts --}}
    {{--! jQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{--! Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    {{--! SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{--! Iconify Icons --}}
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>

    {{--! AOS --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{--! Custom JS --}}
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    <script>
        // Inisialisasi AOS (animasi on scroll)
        AOS.init();

        // Notifikasi dengan SweetAlert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

        // Fungsi untuk batasi jumlah baris pada tabel
        function changeTableEntries(limit) {
            const rows = document.querySelectorAll(".varient-table tbody tr");
            rows.forEach((row, index) => {
                row.style.display = index < limit ? "" : "none";
            });
        }

        // Atur z-index modal agar tidak tertumpuk backdrop
        document.addEventListener('DOMContentLoaded', function () {
            const modals = document.querySelectorAll('.modal');

            modals.forEach(function (modal) {
                modal.addEventListener('shown.bs.modal', function () {
                    const backdrops = document.querySelectorAll('.modal-backdrop');
                    backdrops.forEach(function (backdrop) {
                        backdrop.style.zIndex = '9998';
                    });

                    modal.style.zIndex = '9999';
                    const dialog = modal.querySelector('.modal-dialog');
                    if (dialog) {
                        dialog.style.zIndex = '10000';
                    }
                });
            });
        });
    </script>

</body>

</html>