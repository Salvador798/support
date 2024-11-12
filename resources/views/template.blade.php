<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Dashboard</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/main.css') }}'>
    <link rel="stylesheet" href="{{ asset('iconosFuente/material-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/api.css') }}">
    <link rel="stylesheet" href="{{ asset('css/datatable.min.css') }}">
    <link rel="stylesheet" href="{{ asset('estilosDataTable/datatable.min.css') }}">
    @stack('css')
</head>

<body>
    <!-- COMIENZO DEL SIDEBAR -->
    @include('components.sidebar')
    <!-- FINAL DEL SIDEBAR -->
    <!-- CONTENIDO PRINCIPAL DE LA VISTA -->
    <div class="contenidoMain">
        <span class="material-symbols-outlined" id="btn">menu</span>
        <div class="container">

            @yield('content')

        </div>
    </div>
    <script src="{{ asset('js/api.js') }}"></script>
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    @stack('js')
</body>

</html>
