@extends('template')

@section('title', 'Categoria')

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

    <h3 class="title flex align-center"><a class="miga" href="/">Inicio</a> / Categorias
    </h3>

    <!-- -------------------- END OF TOTALS ------------>
    <div class="recent-orders mb-5">
        <button type="button" class="añadir" title="Añadir Categoria" data-bs-toggle="modal" data-bs-target="#newCategory">
            <span class="material-symbols-outlined">add</span></button>
        <div class="recent-orders tabla">
            <table class="text-center table" id="tblCategories">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="table__body">
                    @foreach ($categories as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>
                                @if ($row->status == 1)
                                    <span class="rounded-pill bg-success d-inline">Activo</span>
                                @else
                                    <span class="rounded-pill bg-danger d-inline">Inactivo</span>
                                @endif
                            </td>
                            <td>
                                @if ($row->status == 1)
                                    <button class="primary" type="button" title="Modificar" data-bs-toggle="modal"
                                        data-bs-target="#editCategory"><span type="button"
                                            class="primary material-symbols-outlined">edit</span></button>
                                    @include('category.edit')

                                    <button type="button" class="btn btn-danger" title="Desactivar"
                                        data-bs-toggle="modal"data-bs-target="#confirmModal-{{ $row->id }}">
                                        <span type="button" class="primary material-symbols-outlined">lock</span>
                                    </button>
                                @else
                                    <button type="button" class="btn btn-success" title="Activar"
                                        data-bs-toggle="modal"data-bs-target="#confirmModal-{{ $row->id }}">
                                        <span type="button"
                                            class="primary material-symbols-outlined text-danger">lock_open</span>
                                    </button>
                                @endif
                            </td>
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
                                        {{ $row->status == 1 ? '¿Seguro que quieres eliminar la categoria?' : '¿Seguro que quieres restaurar la categoria?' }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                        <form
                                            action="{{ route('category.destroy', ['category' => $row->id]) }}"method="post">
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

    @include('category.create')
@endsection

@push('js')
    <script>
        let table = new DataTable('#tblCategories');

        const myModal = new bootstrap.Modal(
            document.getElementById("newCategory"),
            options,
        );

        const myModelEdit = new bootstrap.Modal(
            document.getElementById('editCategory'),
            options,
        )
    </script>
@endpush
