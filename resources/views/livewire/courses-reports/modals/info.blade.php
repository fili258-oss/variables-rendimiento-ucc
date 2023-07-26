<div wire:ignore.self class="modal modal-info fade" id="info-modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Información de reporte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="institution" class="form-label">Institución</label>
                        <input type="text" id="institution" class="form-control" wire:model="institution" placeholder="Enter Name" />
                    </div>
                    <div class="col mb-3">
                        <label for="gradeAcademic" class="form-label">Grado Académico</label>
                        <input type="text" id="gradeAcademic" class="form-control" wire:model="gradeAcademic" placeholder="Enter Name" />
                    </div>
                    <div class="col mb-3">
                        <label for="site" class="form-label">Sede</label>
                        <input type="text" id="site" class="form-control" wire:model="site" placeholder="Enter Name" />
                    </div>
                    <div class="col mb-3">
                        <label for="orgAcademic" class="form-label">Organización Académica</label>
                        <input type="text" id="orgAcademic" class="form-control" wire:model="orgAcademic" placeholder="Enter Name" />
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="idCourse" class="form-label">ID Curso</label>
                        <input type="text" id="idCourse" class="form-control" wire:model="idCourse" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-3">
                        <label for="nameCourse" class="form-label">Nombre Curso</label>
                        <input type="text" id="nameCourse" class="form-control" wire:model="nameCourse" placeholder="DD / MM / YY" />
                    </div>
                    <div class="col mb-3">
                        <label for="levelCourse" class="form-label">Nivel Curso</label>
                        <input type="text" id="levelCourse" class="form-control" wire:model="levelCourse" placeholder="DD / MM / YY" />
                    </div>
                    <div class="col mb-3">
                        <label for="classNumber" class="form-label">No Clase</label>
                        <input type="text" id="classNumber" class="form-control" wire:model="classNumber" placeholder="DD / MM / YY" />
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="academicPeriodId" class="form-label">Ciclo</label>
                        <input type="text" id="academicPeriodId" class="form-control" wire:model="academicPeriodId" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-3">
                        <label for="enrolleds" class="form-label">Matriculados</label>
                        <input type="number" id="enrolleds" class="form-control" wire:model="enrolleds" placeholder="DD / MM / YY" />
                    </div>
                    <div class="col mb-3">
                        <label for="enrolledWithoutCancellations" class="form-label">Matriculados sin Cancelaciones</label>
                        <input type="number" id="enrolledWithoutCancellations" class="form-control" wire:model="enrolledWithoutCancellations" placeholder="DD / MM / YY" />
                    </div>
                    <div class="col mb-3">
                        <label for="approved" class="form-label">Aprobados</label>
                        <input type="number" id="approved" class="form-control" wire:model="approved" placeholder="DD / MM / YY" />
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="notApproved" class="form-label">No Aprobados</label>
                        <input type="number" id="notApproved" class="form-control" wire:model="notApproved" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-3">
                        <label for="quantityAllotments" class="form-label">Cantidad Habilitaciones</label>
                        <input type="number" id="quantityAllotments" class="form-control" wire:model="quantityAllotments" placeholder="DD / MM / YY" />
                    </div>
                    <div class="col mb-3">
                        <label for="approvedAllotments" class="form-label">Habilitaciones Aprobadas</label>
                        <input type="number" id="approvedAllotments" class="form-control" wire:model="approvedAllotments" placeholder="DD / MM / YY" />
                    </div>
                    <div class="col mb-3">
                        <label for="cancellations" class="form-label">Cancelaciones</label>
                        <input type="number" id="cancellations" class="form-control" wire:model="cancellations" placeholder="DD / MM / YY" />
                    </div>
                </div>
                <div class="row g-4">
                    <div class="col mb-3">
                        <label for="repeaters" class="form-label">Repitentes</label>
                        <input type="number" id="repeaters" class="form-control" wire:model="repeaters" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-3">
                        <label for="teacherId" class="form-label">ID Profesor</label>
                        <input type="text" id="teacherId" class="form-control" wire:model="teacherId" placeholder="DD / MM / YY" />
                    </div>
                    <div class="col mb-3">
                        <label for="teacherName" class="form-label">Nombre Profesor</label>
                        <input type="text" id="teacherName" class="form-control" wire:model="teacherName" placeholder="DD / MM / YY" />
                    </div>
                    <div class="col mb-3">
                        <label for="teacherNumberId" class="form-label">Identificación</label>
                        <input type="text" id="teacherNumberId" class="form-control" wire:model="teacherNumberId" placeholder="DD / MM / YY" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                        <label for="hiring" class="form-label">Contratación</label>
                        <input type="text" id="hiring" class="form-control" wire:model="hiring" placeholder="xxxx@xxx.xx" />
                    </div>
                    <div class="col mb-3">
                        <label for="rating" class="form-label">Calificacion</label>
                        <input type="text" id="rating" class="form-control" wire:model="rating" placeholder="DD / MM / YY" />
                    </div>                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="button" class="btn btn-primary">Actualizar</button>
            </div>
        </div>
    </div>
</div>
