<div>

    {{-- @include('livewire.courses-reports.modals.edit')
    @include('livewire.courses-reports.modals.info')
    @include('livewire.courses-reports.modals.delete') --}}

    @section('title','UniMetrics | Resultados de notas')
    @if(Session::has('success'))
    <div class="alert alert-success"> {{ Session::get('success') }}</div>
    @endif
    <form action="{{-- {{ route('generateCharts') }} --}}" method="POST">
        @csrf
        <div class="row">
            @if(!is_null($periods))
            <div class="col-md-6 col-lg-2 col-xl-2 order-0 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Período Academico</label>

                <select id="period" class="form-select form-select-sm" wire:model="selectedPeriod" name="selectedPeriod">
                    <option value="">Seleccione una opción</option>
                    @foreach ($periods as $period)
                    <option value="{{ $period->academicPeriod }}">{{ $period->academicPeriod }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            @if(!is_null($selectedPeriod))
            <div class="col-md-6 col-lg-2 col-xl-2 order-1 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Programa Facultad</label>
                <select id="faculty" class="form-select form-select-sm" wire:model="selectedFaculty" name="faculty">
                    <option value="">Seleccione una opción</option>
                    @foreach ($facultys as $faculty)
                    <option value="{{ $faculty->gradeAcademic }}">{{ $faculty->gradeAcademic }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            @if(!is_null($selectedFaculty))
            <div class="col-md-6 col-lg-2 col-xl-2 order-1 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Curso</label>
                <select id="course" class="form-select form-select-sm" wire:model="selectedCourse" name="faculty">
                    <option value="">Seleccione una opción</option>
                    @foreach ($courses as $course)
                    <option value="{{ $course->nameCourse }}">{{ $course->nameCourse }}</option>
                    @endforeach
                </select>
            </div>
            @endif
            <div class="col-md-6 col-lg-2 col-xl-2 order-3 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Estado</label>
                <select id="level" class="form-select form-select-sm" name="level">
                    <option value="">Seleccione una opción</option>
                    <option value="">Aprovados</option>
                    <option value="">Reprobados</option>
                </select>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-2 order-4 mt-4">
                <input type="submit" class="btn btn-success btn-sm" value="Consultar">
                <button class="btn btn-danger btn-sm" type="button"><i class="bx bx-trash"></i></button>
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
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Curso</th>
                            <th>Calificación</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reports as $report)
                        <tr>
                            <th scope="row">{{ $report->id }}</th>
                            <td>{{ $report->firstName }}</td>
                            <td>{{ $report->lastSurname }}</td>
                            <td>{{ $report->nameCourse }}</td>
                            <td>{{ $report->qualification }}</td>
                            <td>{{ $report->averageSemester }}</td>
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
    <div class="row">
        <!-- Order Statistics -->
        <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Datos de consulta</h5>
                        <small class="text-muted">42.82 total de estudiantes</small>
                    </div>

                </div>
                <div class="card-body">

                    <ul class="p-0 mt-3">
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-primary"><i class="bx bxs-check-circle"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <span class="badge bg-label-success">Aprovados</span>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">82.555555k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-success"><i class="bx bx-calendar"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Ciclo lectivo</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">2310</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-info"><i class="bx bxs-book-reader"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Curso</h6>
                                    <small class="text-muted">Humanidades I Humanidades I Humanidades I</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="avatar flex-shrink-0 me-3">
                                <span class="avatar-initial rounded bg-label-secondary"><i class="bx bxs-user-circle"></i></span>
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <h6 class="mb-0">Total estudiantes</h6>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">999</small>
                                </div>
                            </div>

                        </li>
                    </ul>
                    <div class="row">
                        <button class="btn btn-sm btn-primary">Exportar reporte <i class='bx bx-export'></i></button>
                    </div>

                </div>
            </div>
        </div>
        <!--/ Order Statistics -->

    </div>
</div>
