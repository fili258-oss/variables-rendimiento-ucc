<div wire:ignore.self class="modal fade" id="create-modal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agendar cita </h5>
                <button type="button" class="btn-close" wire:click="cancel()" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">                
                <div class="row g-2">
                    <div class="alert alert-primary" role="alert">
                        Información para agendamiento
                    </div>
                    <div class="col-12 col-lg-12 mb-6">                        
                        <label for="searchStudents" class="form-label">Estudiante</label>
                        <input type="text" class="form-control" wire:model="searchStudents" placeholder="Buscar por cédula de estudiante" id="searchStudent"/>
                        @error('selectedFaculty')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                        @if(!is_null($students))
                        <div class="d-grid">
                        @foreach($students as $student)
                            <!--<div class="alert alert-info mt-2"></div>-->                                
                            <button type="button" class="btn btn-sm btn-outline-success mt-2">{{ $student->name }} {{ $student->lastname }} ({{ $student->identification }})</button>
                            
                        @endforeach
                        </div>
                        @endif
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="selectedCountryBirth" class="form-label">Motivo de consulta</label>
                        <select name="selectedCountryBirth" class="form-select" wire:model.lazy="typeConsultationId">
                            <option value="">Seleccione una opción</option>
                            @if(!is_null($typeConsultations))
                            @foreach($typeConsultations as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                            @endif                               
                        </select>
                        @error('selectedCountryBirth')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 col-lg-6 mb-6">
                        <label for="selectedTownBirth" class="form-label">Psicológo(a)</label>
                        <select name="selectedTownBirth" class="form-select" wire:model.lazy="typeConsultationId">
                            <option value="">Seleccione una opción</option>
                            @if(!is_null($typeConsultations))
                            @foreach($typeConsultations as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                            @endif                               
                        </select>
                        @error('typeConsultationId')
                        <span class="text-warning">{{ $message }}</span>
                        @enderror
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
