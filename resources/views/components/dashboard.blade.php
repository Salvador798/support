@extends('template')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')
    @if (session('success'))
        <script>
            let message = "{{ session('success') }}";
            Swal.fire({
                title: message,
                showClass: {
                    popup: `
                        animate__animated
                        animate__fadeInUp
                        animate__faster`
                },
                hideClass: {
                    popup: `
                        animate__animated
                        animate__fadeOutDown
                        animate__faster`
                }
            });
        </script>
    @endif

    <h3>Inicio</h3>
    <div class="date">
        <input type="date" value="<?php date_default_timezone_set('America/Caracas');
        echo date('Y-m-d'); ?>" disabled>
    </div>
    <!-- CONTENIDO DE RESUMEN -->
    <div class="elementos">
        <div class="elemento">
            <div class="topElemento">
                <span class="material-symbols-outlined">person</span>
                <span class="material-symbols-outlined">analytics</span>
            </div>
            <div class="centro">
                <h3>Usuarios</h3>
                <h3>{{ $users }}</h3>
            </div>
        </div>
        <!-- ------------- Carta de Proveedor -------------- -->
        <div class="elemento2">
            <div class="topElemento">
                <span class="material-symbols-outlined">group</span>
                <span class="material-symbols-outlined">analytics</span>
            </div>
            <div class="centro">
                <h3>Equipos</h3>
                <h3>{{ $equipo }}</h3>
            </div>
        </div>
        <!-- ------------- Cartas de Producto -------------- -->
        <div class="elemento3">
            <div class="topElemento">
                <span class="material-symbols-outlined">construction</span>
                <span class="material-symbols-outlined">analytics</span>
            </div>
            <div class="centro">
                <h3>Equipos Listos</h3>
                <h3>{{ $listos }}</h3>
            </div>
        </div>
    </div>
    <!-- TABLA DE RECIENTES VENTAS -->
    <div class="container">
    </div>
@endsection

@push('js')
@endpush
