<div wire:ignore.self class="modal fade" id="create-modal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar nuevo usuario</h5>
                <button type="button" class="btn-close" wire:click="cancel()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="typeDocumentId" class="form-label">Tipo de documento</label>
                        <select name="typeDocumentId" class="form-select" wire:model.lazy="typeDocumentId">
                            <option value="" selected>Seleccione una opción</option>
                            @foreach($typesDocuments as $typeDocument)
                                <option value="{{ $typeDocument->id }}">{{ $typeDocument->name }}</option>
                            @endforeach
                                                           
                        </select>
                        @error('typeDocumentId')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="identification" class="form-label">Identificación</label>
                        <input type="text" class="form-control" wire:model.lazy="identification" placeholder="Ingrese la identificación">
                        @error('identification')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" wire:model="name" placeholder="Nombre de usuario" />
                        @error('name')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="lastname" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" wire:model="lastname" placeholder="Apellidos del usuario" />
                        @error('lastname')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-12 mb-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" wire:model="email" placeholder="Ingrese el correo" />
                        @error('email')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="roleId" class="form-label">Perfil</label>
                        <select name="roleId" class="form-select" wire:model="roleId">
                            <option value="">Seleccione una opción</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                                                           
                        </select>
                        @error('roleId')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>                    
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" wire:model="password" placeholder="Ingrese una contraseña" />
                        @error('password')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>                
                <div class="row">
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="firstName" class="form-label">Avatar</label>
                        <input type="file" wire:model="photo" class="form-control" accept="image/*">
                        @error('firstName')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="genderId" class="form-label">Género</label>
                        <select name="genderId" class="form-select" wire:model.lazy="genderId">
                            <option value="">Seleccione una opción</option>
                            @foreach($genders as $gender)
                                <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                            @endforeach
                                                           
                        </select>
                        @error('genderId')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-12 mt-4">
                    <label for="photo" class="form-label">Imagen</label>
                    <div class="col-xs-6">
                        <div class="thumbnail">
                            @if (!empty($photo))
                            <img src="{{ $photo->temporaryUrl() }}" class="img-responsive img-thumbnail" alt="" style="width:204px;height:auto;">
                            @elseif (!empty($photo))
                            <img src="{{ asset('storage/' . $photo) }}" class="img-responsive img-thumbnail" alt="" style="width:204px;height:auto;">
                            @else
                            <img src="{{ asset('storage/users/default.png') }}" class="img-responsive img-thumbnail" alt="" style="width:204px;height:auto;">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary" wire:click="cancel()" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button class="btn btn-primary" wire:click="store()">Guardar</button>
            </div>
        </div>
    </div>
</div>
