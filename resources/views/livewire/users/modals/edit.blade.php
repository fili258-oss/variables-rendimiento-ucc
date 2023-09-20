<div wire:ignore.self class="modal fade" id="edit-modal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Editar información de usuario</h5>
                <button type="button" class="btn-close" wire:click="cancel()" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" class="form-control" wire:model="name"
                            placeholder="Nombre de usuario" />
                        @error('name')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-2">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" id="email" class="form-control" wire:model="email"
                            placeholder="Ingrese el correo" />
                        @error('email')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    {{ $profile }}
                    <div class="col-12 col-lg-12 mb-2">
                        <label for="roleId" class="form-label">Perfil</label>
                        <select name="roleId" class="form-select" wire:model="roleId">
                            <option value="">Seleccione una opción</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" @if($roleId == $role->id) selected @endif>{{ $role->name }}</option>                                
                            @endforeach

                        </select>
                        @error('roleId')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12 mb-2">
                        <label for="password" class="form-label">Contraseña</label>
                        <span class="badge bg-label-success">
                            Deje el campo vacio para conservar la contraseña
                        </span>
                        <input type="password" id="password" class="form-control" wire:model="password"
                            placeholder="Ingrese una contraseña" />
                        @error('password')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-12 mb-2">
                        <label for="firstName" class="form-label">Avatar</label>
                        <input type="file" wire:model="photo" class="form-control" accept="image/*">
                        @error('firstName')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-12 mt-4">
                    <label for="image" class="form-label">Imagen</label>
                    <div class="col-xs-6">
                        <div class="thumbnail">
                            @if (!empty($photo))
                            <img src="{{ $photo->temporaryUrl() }}" class="img-responsive img-thumbnail" alt=""
                                style="width:204px;height:auto;">
                            @elseif (!empty($image))
                            <img src="{{ asset('storage/' . $image) }}" class="img-responsive img-thumbnail" alt=""
                                style="width:204px;height:auto;">
                            @else
                            <img src="{{ asset('storage/users/default.png') }}" class="img-responsive img-thumbnail"
                                alt="" style="width:204px;height:auto;">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" wire:click="cancel()" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" class="btn btn-primary" wire:click="update()">Actualizar</button>
            </div>
        </div>
    </div>
</div>