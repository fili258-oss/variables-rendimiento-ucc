<div wire:ignore.self class="modal modal-info fade" id="edit-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Editar reportes individuales de estudiantes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="site" class="form-label">Codigo sede</label>
                        <input type="text" id="site" class="form-control" wire:model="site" placeholder="Codigo sede" />
                        @error('site')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="academicPeriod" class="form-label">Ciclo lectivo</label>
                        <input type="number" id="academicPeriod" class="form-control" wire:model="academicPeriod" placeholder="Grado Académico" />
                        @error('academicPeriod')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="gradeAcademic" class="form-label">Grado académico</label>
                        <input type="text" id="gradeAcademic" class="form-control" wire:model="gradeAcademic" placeholder="Programa académico" />
                        @error('gradeAcademic')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="orgAcademic" class="form-label">Código de programa</label>
                        <input type="text" id="orgAcademic" class="form-control" wire:model="orgAcademic" placeholder="Plan acad" />
                        @error('orgAcademic')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="programAcademic" class="form-label">Programa acádemico</label>
                        <input type="text" id="programAcademic" class="form-control" wire:model="programAcademic" placeholder="ID estudiante" />
                        @error('programAcademic')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="idStudent" class="form-label">ID estudiante</label>
                        <input type="number" id="idStudent" class="form-control" wire:model="idStudent" placeholder="Tipo documento" />
                        @error('idStudent')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="typeDocument" class="form-label">Tipo documento</label>
                        <input type="text" id="typeDocument" class="form-control" wire:model="typeDocument" placeholder="Nro. documento" />
                        @error('typeDocument')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="numberDocument" class="form-label">Número de documento</label>
                        <input type="number" id="numberDocument" class="form-control" wire:model="numberDocument" placeholder="Primer apellido" />
                        @error('numberDocument')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="firstName" class="form-label">Primer nombre</label>
                        <input type="text" id="firstName" class="form-control" wire:model="firstName" placeholder="Segundo apellido" />
                        @error('firstName')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="lastName" class="form-label">Segundo nombre</label>
                        <input type="text" id="lastName" class="form-control" wire:model="lastName" placeholder="Primer nombre" />
                        @error('lastName')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="firstSurname" class="form-label">Primer apellido</label>
                        <input type="text" id="firstSurname" class="form-control" wire:model="firstSurname" placeholder="Segundo nombre" />
                        @error('firstSurname')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="lastSurname" class="form-label">Segundo apellido</label>
                        <input type="text" id="lastSurname" class="form-control" wire:model="lastSurname" placeholder="Ciclo lectivo" />
                        @error('lastSurname')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="levelCourse" class="form-label">Nivel acádemico</label>
                        <input type="text" id="levelCourse" class="form-control" wire:model="levelCourse" placeholder="Id curso" />
                        @error('levelCourse')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="averageSemester" class="form-label">Promedio semestre</label>
                        <input type="number" id="averageSemester" class="form-control" wire:model="averageSemester" placeholder="Nombre curso" />
                        @error('averageSemester')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="averageAccumulated" class="form-label">Promedio acumulado</label>
                        <input type="number" id="averageAccumulated" class="form-control" wire:model="averageAccumulated" placeholder="No clase" />
                        @error('averageAccumulated')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="academicSituation" class="form-label">Situación acádemica</label>
                        <input type="text" id="academicSituation" class="form-control" wire:model="academicSituation" placeholder="Calificación" />
                        @error('academicSituation')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
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
