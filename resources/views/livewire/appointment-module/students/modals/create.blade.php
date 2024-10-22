<div wire:ignore.self class="modal fade" id="create-modal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar nuevo estudiante</h5>
                <button type="button" class="btn-close" wire:click="cancel()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if($steep == 0)
                <div class="row g-2">
                    <div class="alert alert-primary" role="alert">
                        Información básica del estudiante (Requerido)
                    </div>
                    <div class="col-12 col-lg-6 mb-6">                        
                        <label for="selectedFaculty" class="form-label">Facultad</label>
                        <select name="selectedFaculty" class="form-select" wire:model.lazy="selectedFaculty">
                            <option value="">Seleccione una opción</option>
                            @if(!is_null($faculties))
                            @foreach($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                            @endforeach
                            @endif                               
                        </select>
                        @error('selectedFaculty')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div> 
                    <div class="col-12 col-lg-6 mb-6">                        
                        <label for="programId" class="form-label">Programa</label>
                        <select name="programId" class="form-select" wire:model.lazy="programId">
                            <option value="">Seleccione una opción</option>
                            @if(!is_null($programs))
                            @foreach($programs as $program)
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                            @endforeach
                            @endif                               
                        </select>
                        @error('programId')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>                   
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="studentCode" class="form-label">ID estudiante</label>
                        <input type="text" class="form-control" wire:model.lazy="studentCode" placeholder="Ingrese el Id" />
                        @error('studentCode')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="phone" class="form-label">Celular</label>
                        <input type="text" wire:model.lazy="phone" class="form-control" id="phone">
                        @error('phone')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row g-2">                        
                        <div class="col-12 col-lg-6 mb-6">
                            <label for="semesterId" class="form-label">Semestre</label>
                            <select name="semesterId" class="form-select" wire:model.lazy="semesterId">
                                <option value="">Seleccione una opción</option>
                                @foreach($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->name }}</option>
                                @endforeach
                                                               
                            </select>
                            @error('semesterId')
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
                        <div class="col-12 col-lg-12 mb-6">
                            <label for="email" class="form-label">Correo electrónico</label>
                            <input type="email" class="form-control" wire:model.lazy="email" placeholder="Ingrese el correo" />
                            @error('email')
                            <span class="text-warning">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="name" class="form-label">Nombres</label>
                        <input type="text" class="form-control" wire:model.lazy="name" placeholder="Ingrese nombre" />
                        @error('name')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="lastname" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" wire:model.lazy="lastname" placeholder="Ingrese apellidos" />
                        @error('lastname')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>                
                @endif
                @if($steep == 1)
                <div class="row g-2">
                    <div class="alert alert-primary" role="alert">
                        Información personal (Opcional)
                    </div>
                    <div class="col-12 col-lg-4 mb-6">
                        <label for="selectedCountryBirth" class="form-label">País</label>
                        <select name="selectedCountryBirth" class="form-select" wire:model.lazy="selectedCountryBirth">
                            <option value="">Seleccione una opción</option>
                            @if(!is_null($countries))
                            @foreach($countries as $contry)
                                <option value="{{ $contry->id }}">{{ $contry->name }}</option>
                            @endforeach
                            @endif                               
                        </select>
                        @error('selectedCountryBirth')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-4 mb-6">
                        <label for="selectedTownBirth" class="form-label">Departamento</label>
                        <select name="selectedTownBirth" class="form-select" wire:model.lazy="selectedTownBirth">
                            <option value="">Seleccione una opción</option>
                            @if(!is_null($towns))
                            @foreach($towns as $town)
                                <option value="{{ $town->id }}">{{ $town->name }}</option>
                            @endforeach
                            @endif                               
                        </select>
                        @error('selectedTownBirth')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-4 mb-6">
                        <label for="selectedCityBirth" class="form-label">Municipio</label>
                        <select name="selectedCityBirth" class="form-select" wire:model.lazy="selectedCityBirth">
                            <option value="">Seleccione una opción</option>
                            @if(!is_null($cities))
                            @foreach($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                            @endif                               
                        </select>
                        @error('selectedCityBirth')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-12 mb-6">
                        <label for="address" class="form-label">Dirección residencia</label>
                        <input type="text" class="form-control" wire:model.lazy="address" placeholder="Ingrese la dirección" />
                        @error('address')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="localityComuna" class="form-label">Localidad/Comuna</label>
                        <input type="text" wire:model.lazy="localityComuna" class="form-control" placeholder="Ej: Casa 8">
                        @error('localityComuna')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="studyDay" class="form-label">Jornada de estudio</label>
                        <input type="text" wire:model.lazy="studyDay" class="form-control" placeholder="Ej: Diurno">
                        @error('studyDay')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="placeOfExpedition" class="form-label">Lugar expedición cédula</label>
                        <input type="text" class="form-control" wire:model.lazy="placeOfExpedition" placeholder="Ingrese nombre del municipio" />
                        @error('placeOfExpedition')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="stratum" class="form-label">Estrato</label>
                        <input type="text" wire:model.lazy="stratum" class="form-control" placeholder="Ej: 1">
                        @error('stratum')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">                        
                        <label for="civilStatusId" class="form-label">Estado civíl</label>
                        <select name="civilStatusId" class="form-select" wire:model.lazy="civilStatusId">
                            <option value="">Seleccione una opción</option>
                            @if(!is_null($maritalStatuses))
                            @foreach($maritalStatuses as $marital)
                                <option value="{{ $marital->id }}">{{ $marital->name }}</option>
                            @endforeach
                            @endif                               
                        </select>
                        @error('civilStatusId')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div> 
                    <div class="col-12 col-lg-6 mb-6">                        
                        <label for="dateOfBirth" class="form-label">Fecha nacimiento</label>
                        <input type="date" class="form-control" id="dateOfBirth" wire:model.lazy="dateOfBirth"/>
                        @error('dateOfBirth')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                @endif                    
                    
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary" wire:click="cancel()" data-bs-dismiss="modal">
                    Cancelar
                </button>
                @if($steep == 0)
                <button class="btn btn-primary" wire:click="nextSteep()">Siguiente</button>
                @elseif($steep == 1)
                <button class="btn btn-primary" wire:click="returnSteep()">Anterior</button>
                <button class="btn btn-primary" wire:click="store()">Guardar</button>
                @endif
            </div>
        </div>
    </div>
</div>
