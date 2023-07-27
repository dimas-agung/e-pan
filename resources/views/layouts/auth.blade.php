<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap-4.3.1.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}"> --}}

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('css/components.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/iziToast.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/datatable-1.10.20.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.standalone.min.css') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">


    @yield('css')
</head>

<body class="bg-gradient-primary">
    @yield('content')

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    {{-- <script src="vendor/chart.js/Chart.min.js"></script> --}}

    <!-- Page level custom scripts -->
    {{-- <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script> --}}
    <!-- General JS Scripts -->
    <script src="{{ asset('js/jquery.ninescroll-3.7.6.min.js') }}"></script>
    <script src="{{ asset('js/popper-1.14.7.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-4.3.1.min.js') }}"></script>
    <script src="{{ asset('js/moment-2.24.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    <!-- JS Libraies -->
    <script src="{{ asset('js/iziToast.min.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/jquery.maskMoney.min.js') }}"></script>
    {{-- datatable --}}
    <script src="{{ asset('js/datatable-1.10.20.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    {{-- <script src="{{ asset('js/select2.full.min.js') }}"></script> --}}

    @yield('js')

</body>

</html>
