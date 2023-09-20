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
                        <label for="gradeAcademic" class="form-label">Grado académico</label>
                        <input type="text" id="gradeAcademic" class="form-control" wire:model="gradeAcademic" placeholder="Grado Académico" />
                        @error('gradeAcademic')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="orgAcademic" class="form-label">Programa académico</label>
                        <input type="text" id="orgAcademic" class="form-control" wire:model="orgAcademic" placeholder="Programa académico" />
                        @error('orgAcademic')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="planAcademic" class="form-label">Plan acad</label>
                        <input type="text" id="planAcademic" class="form-control" wire:model="planAcademic" placeholder="Plan acad" />
                        @error('planAcademic')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="idStudent" class="form-label">ID estudiante</label>
                        <input type="text" id="idStudent" class="form-control" wire:model="idStudent" placeholder="ID estudiante" />
                        @error('idStudent')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="typeDocument" class="form-label">Tipo documento</label>
                        <input type="text" id="typeDocument" class="form-control" wire:model="typeDocument" placeholder="Tipo documento" />
                        @error('typeDocument')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="numberDocument" class="form-label">Nro. documento</label>
                        <input type="text" id="numberDocument" class="form-control" wire:model="numberDocument" placeholder="Nro. documento" />
                        @error('numberDocument')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="firstSurname" class="form-label">Primer apellido</label>
                        <input type="text" id="firstSurname" class="form-control" wire:model="firstSurname" placeholder="Primer apellido" />
                        @error('firstSurname')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="lastSurname" class="form-label">Segundo apellido</label>
                        <input type="text" id="lastSurname" class="form-control" wire:model="lastSurname" placeholder="Segundo apellido" />
                        @error('lastSurname')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="firstName" class="form-label">Primer nombre</label>
                        <input type="text" id="firstName" class="form-control" wire:model="firstName" placeholder="Primer nombre" />
                        @error('firstName')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="lastName" class="form-label">Segundo nombre</label>
                        <input type="text" id="lastName" class="form-control" wire:model="lastName" placeholder="Segundo nombre" />
                        @error('lastName')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="academicPeriod" class="form-label">Ciclo lectivo</label>
                        <input type="text" id="academicPeriod" class="form-control" wire:model="academicPeriod" placeholder="Ciclo lectivo" />
                        @error('academicPeriod')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="idCourse" class="form-label">Id curso</label>
                        <input type="number" id="idCourse" class="form-control" wire:model="idCourse" placeholder="Id curso" />
                        @error('idCourse')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="nameCourse" class="form-label">Nombre curso</label>
                        <input type="text" id="nameCourse" class="form-control" wire:model="nameCourse" placeholder="Nombre curso" />
                        @error('nameCourse')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="classNumber" class="form-label">No clase</label>
                        <input type="text" id="classNumber" class="form-control" wire:model="classNumber" placeholder="No clase" />
                        @error('classNumber')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="qualification" class="form-label">Calificación</label>
                        <input type="number" id="qualification" class="form-control" wire:model="qualification" placeholder="Calificación" />
                        @error('qualification')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="numberCredits" class="form-label">Nro. créditos</label>
                        <input type="number" id="numberCredits" class="form-control" wire:model="numberCredits" placeholder="Nro. créditos" />
                        @error('numberCredits')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="typeQualification" class="form-label">Tipo calificación</label>
                        <input type="text" id="typeQualification" class="form-control" wire:model="typeQualification" placeholder="Tipo calificación" />
                        @error('typeQualification')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="averageSemester" class="form-label">Promedio Semestre</label>
                        <input type="number" id="averageSemester" class="form-control" wire:model="averageSemester" placeholder="Promedio Semestre" />
                        @error('averageSemester')
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
