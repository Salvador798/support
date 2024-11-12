<div class="modal fade" id="editUser-{{ $row->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-modal" id="staticBackdropLabel">Registrar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update', ['user' => $row]) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Nombre" value="{{ old('name', $row->name) }}">
                                @error('name')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" id="naemaile_client"
                                    placeholder="Correo Eléctronico" value="{{ old('email', $row->email) }}">
                                @error('email')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Contraseñá" value="{{ old('password') }}">
                                @error('password')
                                    <small class="text-danger">{{ '*' . $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password_confirmation"
                                    id="password_confirmation" placeholder="Confirmar Contraseñá"
                                    value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
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
