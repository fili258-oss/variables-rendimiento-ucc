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
                        <div>
                            @foreach($students as $student)
                                <div class="alert alert-info" value="{{ $student->id }}">{{ $student->name }}</div>
                            @endforeach
                        </div>
                        @endif
                    </div>                     
                </div>                                
                    
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-secondary" wire:click="cancel()" data-bs-dismiss="modal">
                    Cancelar
                </button>
                
                <button class="btn btn-primary" wire:click="nextSteep()">Siguiente</button>
                
                <button class="btn btn-primary" wire:click="returnSteep()">Anterior</button>
                <button class="btn btn-primary" wire:click="store()">Guardar</button>
                
            </div>
        </div>
    </div>
</div>
