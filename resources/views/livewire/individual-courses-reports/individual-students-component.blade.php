<div>
    @section('title','UniMetrics | Resultados de notas')
    @if(Session::has('success'))
    <div class="alert alert-success"> {{ Session::get('success') }}</div>
    @endif
    <form>
        @csrf
        <div class="row py-2">
            @if(!is_null($periods))
            <div class="col-md-6 col-lg-2 col-xl-2 order-0 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Período Academico</label>
                <select id="period" class="form-select form-select-sm" wire:model="selectedPeriod" name="selectedPeriod">
                    <option value="">Seleccione una opción</option>
                    @foreach ($periods as $period)
                    <option value="{{ $period }}">{{ $period }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            @if(!is_null($facultys))
            <div class="col-md-6 col-lg-2 col-xl-2 order-1 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Programa Facultad</label>
                <select id="faculty" class="form-select form-select-sm" wire:model="selectedFaculty" name="faculty">
                    <option value="">Seleccione una opción</option>
                    @if(!is_null($facultys))
                    @foreach ($facultys as $faculty)
                    <option value="{{ $faculty }}">{{ $faculty }}</option>
                    @endforeach    
                    @endif
                    
                </select>
            </div>
            @endif

            @if(!is_null($courses))
            <div class="col-md-6 col-lg-2 col-xl-2 order-1 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Curso</label>
                <select id="course" class="form-select form-select-sm" wire:model="selectedCourse" name="faculty">
                    <option value="">Seleccione una opción</option>
                    @if(!is_null($courses))
                    @foreach ($courses as $course)
                    <option value="{{ $course }}">{{ $course }}</option>
                    @endforeach
                    @endif                    
                </select>
            </div>
            @endif
            <div class="col-md-6 col-lg-2 col-xl-2 order-3 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Estado</label>
                <select id="level" class="form-select form-select-sm" wire:model="selectedStatus" name="level">
                    <option value="">Seleccione una opción</option>
                    <option value="0">Aprovados</option>
                    <option value="1">Reprobados</option>
                </select>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-2 order-4 mt-4"> 
                
                <a href="{{ route('reportsIndividual') }}" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></a>
                <button class="btn btn-success btn-sm" wire:click='exportRows()' type="button"><i class="bx bx-export"></i></button>
            </div>
        </div>
    </form>
    <div class="row">        
        <div class="col-sm-5 p-2 bg-white mr-3">
            <small>Curso: {{ $selectedCourse }}</small>
        </div>
        <div class="col-sm-1 p-2 bg-white">
            <small>Ciclo: {{ $selectedPeriod }}</small>
        </div>
        <div class="col-sm-2 p-2 bg-white">
            <small>Total estudiantes:</small>
        </div>        
        <div class="col-sm-2 p-2 bg-white">
            <small>Aprobados: {{ number_format($countReportsAproveds, 0) }} %</small>
        </div>
        <div class="col-sm-2 p-2 bg-white">
            <small>Reprobados: {{ number_format($countReportsReproveds, 0) }} %</small>
        </div>
    </div>
    <div class="row">
        <!-- Order Statistics -->
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4 mt-4">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>#</th>
                            <th>Ciclo Lectivo</th>
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
                            <td>{{ $report->academicPeriod }}</td>
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
    
</div>
