@extends('template')

@section('title', 'Equipo')

@push('css')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush

@section('content')

    @if (session('success'))
        <script>
            let message = "{{ session('success') }}";
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: message
            });
        </script>
    @endif

    <h3 class="title flex align-center"><a class="miga" href="/">Inicio</a> / Equipo Listos
    </h3>

    <!-- -------------------- END OF TOTALS ------------>
    <div class="recent-orders mb-5">
        <div class="recent-orders tabla">
            <table class="text-center table" id="tblProducts">
                <thead class="thead-light">
                    <tr>
                        <th>Ticket</th>
                        <th>Nombre del Cliente</th>
                        {{-- <th>Email del Cliente</th> --}}
                        <th>Marca</th>
                        <th>Nombre</th>
                        <td>Solución</td>
                        <td>Costo</td>
                        <th>Fecha de Recepción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table__body">
                    @foreach ($products as $row)
                        <tr>
                            @if ($row->status == 0)
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name_client }}</td>
                                {{-- <td>{{ $row->email_client }}</td> --}}
                                <td>{{ $row->brand }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->solution }}</td>
                                <td>{{ $row->cost }}</td>
                                <td>{{ $row->updated_at->setTimezone('America/Caracas') }}</td>
                                <td>
                                    @if ($row->status == 1)
                                        <span class="badge rounded-pill bg-danger d-inline">Proceso</span>
                                    @else
                                        <span class="badge rounded-pill bg-success d-inline">Listo</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('products.createPDF', $row->id) }}" method="POST">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-success">PDF</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- @include('product.create') --}}
@endsection

@push('js')
    <script>
        let table = new DataTable('#tblProducts');

        const myModal = new bootstrap.Modal(
            document.getElementById("newCategory"),
            options,
        );

        const myModelEdit = new bootstrap.Modal(
            document.getElementById('editProduct'),
            options,
        )
    </script>
@endpush
