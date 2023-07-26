<div>
    
    @include('livewire.courses-reports.modals.edit')
    @include('livewire.courses-reports.modals.info')
    @include('livewire.courses-reports.modals.delete')

    @section('title','UniMetrics | Importar informes generales')    
    <form action="{{ route('importReports') }}" method="POST" name="importform" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-2 col-xl-4 order-0 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Filtrar Nombre de Curso</label>
                <input type="text" class="form-control" wire:model="search" name="search" id="formFile" />                
            </div>
            <div class="col-md-6 col-lg-2 col-xl-4 order-0 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Informe general cursos CSV</label>
                <input type="file" class="form-control" name="file" id="formFile" />
            </div>
            <div class="col-md-6 col-lg-4 col-xl-2 order-1 mt-4">
                {{-- <button class="btn btn-primary " type="button"><i class='bx bx-check-circle'></i> Importar</button>     --}}
                <input type="submit" class="btn btn-primary d-grid w-100" value="Importar">
            </div>
        </div>
    </form>
    <div class="row">
        <!-- Order Statistics -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4 mt-4">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Ciclo</th>
                            <th>Programa académico</th>
                            <th>ID curso</th>
                            <th>Nombre curso</th>
                            <th>Nivel curso</th>
                            <th>Matriculados</th>
                            <th>Cancelaciones</th>
                            <th>Aprobados</th>
                            <th>No aprobados</th>
                            <th>Repitentes</th>
                            <th>ID Profesor</th>
                            <th>Profesor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reports as $report)
                        <tr>
                            <th scope="row">{{ $report->id }}</th>
                            <td>{{ $report->academicPeriodId }}</td>
                            <td>{{ $report->gradeAcademic }}</td>
                            <td>{{ $report->idCourse }}</td>
                            <td>{{ $report->nameCourse }}</td>
                            <td>{{ $report->levelCourse }}</td>
                            <td>{{ $report->enrolleds }}</td>
                            <td>{{ $report->cancellations }}</td>
                            <td>{{ $report->approved }}</td>
                            <td>{{ $report->notApproved }}</td>
                            <td>{{ $report->repeaters }}</td>
                            <td>{{ $report->teacherId }}</td>
                            <td>{{ $report->teacherName }}</td>
                            <td>                                
                                <button class="btn btn-primary btn-sm" wire:click='edit({{ $report->id }})' data-bs-toggle="modal" data-bs-target="#edit-modal">
                                    <i class="fa fa-pencil-square"></i>
                                    Editar
                                </button>
                                <button class="btn btn-danger btn-sm" wire:click='delete({{ $report->id }})' data-bs-toggle="modal" data-bs-target="#delete-modal">
                                    <i class="fa fa-trash"></i>
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                No hay registros aún :(
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Order Statistics -->
        <div class="col">
            <div class="demo-inline-spacing">
                <!-- Basic Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        {{$reports->links()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>    
</div>

