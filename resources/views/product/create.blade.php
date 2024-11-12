<div class="modal fade" id="newCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-modal" id="staticBackdropLabel">Registrar Equipo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf
                    <h3 class="mb-2 text-center">Cliente</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="ci" id="ci"
                                    placeholder="Cédula" value="{{ old('ci') }}">
                                @error('ci')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name_client" id="name_client"
                                    placeholder="Nombre" value="{{ old('name_client') }}">
                                @error('name_client')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="lastname_client" id="lastname_client"
                                    placeholder="Apellido" value="{{ old('lastname_client') }}">
                                @error('lastname_client')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email_client" id="email_client"
                                    placeholder="Correo Eléctronico" value="{{ old('email_client') }}">
                                @error('email_client')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <h3 class="mb-2 text-center">Equopo</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control text-dark" name="category_id" id="category_id"
                                    value="{{ old('category_id') }}">
                                    @foreach ($categories as $row)
                                        <option value="{{ $row->id }}"
                                            {{ in_array($row->id, old('categories', [])) ? 'selected' : '' }}>
                                            {{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="brand" id="brand"
                                    placeholder="Marca" value="{{ old('brand') }}">
                                @error('brand')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Modelo" value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
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
