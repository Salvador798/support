<div class="modal fade" id="editCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-modal" id="staticBackdropLabel">Modificar Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('category.update', ['category' => $row->id]) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre"
                            value="{{ old('name', $row->name) }}">
                        @error('name')
                            <small class="text-danger">{{ '*' . $message }}</small>
                        @enderror
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
