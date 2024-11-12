<div class="modal fade" id="editProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-modal" id="staticBackdropLabel">Finalizar el Equipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.update', ['product' => $row->id]) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="solution" id="solution"
                                    placeholder="Solución del Equipo" value="{{ old('solution') }}">
                                @error('solution')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="cost" id="cost"
                                    placeholder="Costo" value="{{ old('cost') }}">
                                @error('cost')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Finalizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
