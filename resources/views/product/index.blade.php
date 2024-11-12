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

    <h3 class="title flex align-center"><a class="miga" href="/">Inicio</a> / Equipo
    </h3>

    <!-- -------------------- END OF TOTALS ------------>
    <div class="recent-orders mb-5">
        <button type="button" class="añadir" title="Añadir Equipo" data-bs-toggle="modal" data-bs-target="#newCategory"
            title="Añadir Equipo">
            <span class="material-symbols-outlined">add</span></button>
        <div class="recent-orders tabla">
            <table class="text-center table" id="tblProducts">
                <thead class="thead-light">
                    <tr>
                        <th>Ticket</th>
                        <th>Nombre del Cliente</th>
                        <th>Email del Cliente</th>
                        <th>Marca</th>
                        <th>Nombre</th>
                        <th>Fecha de Recepción</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="table__body">
                    @foreach ($products as $row)
                        <tr>
                            @if ($row->status == 1)
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->name_client }}</td>
                                <td>{{ $row->email_client }}</td>
                                <td>{{ $row->brand }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->created_at->setTimezone('America/Caracas') }}</td>
                                <td>
                                    @if ($row->status == 1)
                                        <span class="badge rounded-pill bg-danger d-inline">Proceso</span>
                                    @else
                                        <span class="badge rounded-pill bg-success d-inline">Entregado</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#editProduct" title="Agregar el costo y la solución">
                                        <span type="button" class="primary material-symbols-outlined">edit</span>
                                    </button>
                                    @include('product.edit')

                                    @if ($row->status == 1)
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#confirmModal-{{ $row->id }}" title="Entregar Equipo">
                                            <span class="material-symbols-outlined">
                                                check_circle
                                            </span>
                                        </button>
                                    @endif
                                </td>
                            @endif
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="confirmModal-{{ $row->id }}" tabindex="-1"
                            data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            Mensaje de confirmación
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-dark">
                                        {{ $row->status == 1 ? '¿Seguro que quieres entregar el equipo?' : '¿Seguro que quieres devolver el equipo?' }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <form
                                            action="{{ route('products.destroy', ['product' => $row->id]) }}"method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Confirmar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @include('product.create')
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
