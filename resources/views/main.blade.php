<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/core/core.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('template/assets/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('template/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->
    <!-- Layout styles -->

    @php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
    $theme = "";
    if ($user->theme == 1) {
    $theme = "demo_1";
    }else{
    $theme = "demo_2";
    }
    @endphp

    <link rel="stylesheet" href="{{ asset('template') }}/assets/css/{{ $theme }}/style.css">



    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('template/assets/images/favicon.png') }}" />

</head>

<body>
    <div class="main-wrapper">

        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar">
            @include('partials.sidebar')
        </nav>
        <nav class="settings-sidebar">
            @include('partials.setting')
        </nav>
        <!-- partial -->

        <div class="page-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            @include('partials.topbar')
            <!-- partial -->

            <div class="page-content">
                @yield('content')
            </div>

            @yield('scripts')

            <!-- partial:../../partials/_footer.html -->
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                <p class="text-muted text-center text-md-left">Copyright © 2024 <a href="" target="_blank">MOIST Registrar</a>. All rights reserved</p>
                <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Powered by : <a href="https://laravel.com/" target="_blank">Laravel</a> | <a href="https://www.nobleui.com/html/template/demo1/dashboard.html" target="_blank">Noble UI</a></p>
            </footer>
            <!-- partial -->

        </div>
    </div>




    <!-- core:js -->
    <script src="{{ asset('template/assets/vendors/core/core.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ asset('template/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/promise-polyfill/polyfill.min.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('template/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('template/assets/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="{{ asset('template/assets/js/sweet-alert.js') }}"></script>
    <script src="{{ asset('template/assets/js/data-table.js') }}"></script>
    <!-- end custom js for this page -->


    @if (session('success'))
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 3000, // Set timer to 3000 milliseconds (3 seconds)
            toast: true
        });
    </script>
    @endif

    @if ($errors->any())
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Validation Errors',
            html: `
                <ul style="text-align: left;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            `,
            showConfirmButton: true
        });
    </script>
    @endif
    
</body>

</html>