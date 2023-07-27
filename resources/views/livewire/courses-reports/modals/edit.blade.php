<div wire:ignore.self class="modal modal-info fade" id="edit-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Editar reporte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="institution" class="form-label">Institución</label>
                        <input type="text" id="institution" class="form-control" wire:model="institution" placeholder="Institución" />
                        @error('institution')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="gradeAcademic" class="form-label">Grado Académico</label>
                        <input type="text" id="gradeAcademic" class="form-control" wire:model="gradeAcademic" placeholder="Grado Académico" />
                        @error('gradeAcademic')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="site" class="form-label">Sede</label>
                        <input type="text" id="site" class="form-control" wire:model="site" placeholder="Enter Name" />
                        @error('site')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="orgAcademic" class="form-label">Organización Académica</label>
                        <input type="text" id="orgAcademic" class="form-control" wire:model="orgAcademic" placeholder="Organización Académica" />
                        @error('orgAcademic')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="idCourse" class="form-label">ID Curso</label>
                        <input type="text" id="idCourse" class="form-control" wire:model="idCourse" placeholder="ID Curso" />
                        @error('idCourse')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="nameCourse" class="form-label">Nombre Curso</label>
                        <input type="text" id="nameCourse" class="form-control" wire:model="nameCourse" placeholder="Nombre Curso" />
                        @error('nameCourse')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="levelCourse" class="form-label">Nivel Curso</label>
                        <input type="text" id="levelCourse" class="form-control" wire:model="levelCourse" placeholder="Nivel Curso" />
                        @error('levelCourse')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="classNumber" class="form-label">No Clase</label>
                        <input type="text" id="classNumber" class="form-control" wire:model="classNumber" placeholder="No Clase" />
                        @error('classNumber')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="academicPeriodId" class="form-label">Ciclo</label>
                        <input type="text" id="academicPeriodId" class="form-control" wire:model="academicPeriodId" placeholder="Ciclo" />
                        @error('academicPeriodId')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="enrolleds" class="form-label">Matriculados</label>
                        <input type="number" id="enrolleds" class="form-control" wire:model="enrolleds" placeholder="Matriculados" />
                        @error('enrolleds')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="enrolledWithoutCancellations" class="form-label">Matriculados sin Cancelaciones</label>
                        <input type="number" id="enrolledWithoutCancellations" class="form-control" wire:model="enrolledWithoutCancellations" placeholder="Matriculados sin Cancelaciones" />
                        @error('enrolledWithoutCancellations')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="approved" class="form-label">Aprobados</label>
                        <input type="number" id="approved" class="form-control" wire:model="approved" placeholder="Aprobados" />
                        @error('approved')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="notApproved" class="form-label">No Aprobados</label>
                        <input type="number" id="notApproved" class="form-control" wire:model="notApproved" placeholder="No Aprobados" />
                        @error('notApproved')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="quantityAllotments" class="form-label">Cantidad Habilitaciones</label>
                        <input type="number" id="quantityAllotments" class="form-control" wire:model="quantityAllotments" placeholder="Cantidad Habilitaciones" />
                        @error('quantityAllotments')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="approvedAllotments" class="form-label">Habilitaciones Aprobadas</label>
                        <input type="number" id="approvedAllotments" class="form-control" wire:model="approvedAllotments" placeholder="Habilitaciones Aprobadas" />
                        @error('approvedAllotments')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="cancellations" class="form-label">Cancelaciones</label>
                        <input type="number" id="cancellations" class="form-control" wire:model="cancellations" placeholder="Cancelaciones" />
                        @error('cancellations')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="repeaters" class="form-label">Repitentes</label>
                        <input type="number" id="repeaters" class="form-control" wire:model="repeaters" placeholder="Repitentes" />
                        @error('repeaters')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="teacherId" class="form-label">ID Profesor</label>
                        <input type="text" id="teacherId" class="form-control" wire:model="teacherId" placeholder="ID Profesor" />
                        @error('teacherId')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="teacherName" class="form-label">Nombre Profesor</label>
                        <input type="text" id="teacherName" class="form-control" wire:model="teacherName" placeholder="Nombre Profesor" />
                        @error('teacherName')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="teacherNumberId" class="form-label">Identificación</label>
                        <input type="text" id="teacherNumberId" class="form-control" wire:model="teacherNumberId" placeholder="Identificación" />
                        @error('teacherNumberId')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="hiring" class="form-label">Contratación</label>
                        <input type="text" id="hiring" class="form-control" wire:model="hiring" placeholder="Contratación" />
                        @error('hiring')
                            <span class="text-warning">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col mb-3">
                        <label for="rating" class="form-label">Calificacion</label>
                        <input type="text" id="rating" class="form-control" wire:model="rating" placeholder="Calificacion" />
                        @error('rating')
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
