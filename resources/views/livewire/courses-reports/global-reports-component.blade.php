<div>
    @section('title', 'UniMetrics | Informes globales')
    <form>
        @csrf
        <div class="row py-2">
            <div class="col-md-6 col-lg-2 col-xl-2 order-0 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Período Academico</label>
                <select class="form-select form-select-sm" wire:model="selectedPeriod" name="period">
                    <option value="">Seleccione ciclo:</option>
                    @if ($periods != null)
                    @foreach ($periods as $period)
                    <option value="{{ $period->academicPeriodId }}">{{ $period->academicPeriodId }}</option>
                    @endforeach
                    @else
                    <option value=""></option>
                    @endif
                </select>
            </div>
            @if (!is_null($facultys))
            <div class="col-md-6 col-lg-2 col-xl-2 order-1 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Programa Facultad</label>
                <select id="selectedFaculty" class="form-select form-select-sm" wire:model="selectedFaculty"
                    name="selectedFaculty">
                    <option value="">Seleccione una opción</option>
                    @if (!is_null($facultys))
                    @foreach ($facultys as $faculty)
                    <option value="{{ $faculty }}">{{ $faculty }}</option>
                    @endforeach
                    @endif

                </select>
            </div>
            @endif
            @if(!is_null($selectedPeriod) && !is_null($selectedFaculty))
            <div class="col-md-6 col-lg-8 col-xl-2 order-3 mt-4">
                {{-- <label class="form-label" for="basic-icon-default-fullname">Exportar consulta</label> --}}
                <a href="{{ route('globalReports') }}" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></a>
                <button class="btn btn-success btn-sm" wire:click="exportToExcel" type="button"><i class="bx bx-export"></i></button>
            </div>
            @endif
            
        </div>
    </form>
    <div class="row">
        <!-- Order Statistics -->
        @forelse ($structuredReports as $academicPeriodId => $semesters)
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4 mt-4">
            <h3>Periodo acádemico: {{ $academicPeriodId }}</h3>
            @foreach ($semesters as $levelCourse => $courses)
            <div class="table-responsive text-nowrap">
                <h4>{{ $levelCourse }}</h4>
                <table class="table">
                    <thead>
                        <tr class="text-nowrap">
                            <th>Curso</th>
                            <th>Matriculados</th>
                            <th>Cancelaciones</th>
                            <th>Aprobados</th>
                            <th>No aprobados</th>
                            <th>Repitentes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $course['nameCourse'] }}</td>
                            <td>{{ $course['totalEnrolleds'] }}</td>
                            <td>{{ $course['totalCancellations'] }}</td>
                            <td>{{ $course['totalApproved'] }}</td>
                            <td>{{ $course['totalNotApproved'] }}</td>
                            <td>{{ $course['totalRepeaters'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @endforeach
        </div>
        @empty
        <div class="col-md-12 col-lg-12 col-xl-12 order-0 mb-4 mt-4">
            <h5>No hay registros aún</h5>
        </div>
        @endforelse


        <!--/ Order Statistics -->
        <div class="col">
            <div class="demo-inline-spacing">
                <!-- Basic Pagination -->
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        {{-- {{$reports->links()}} --}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>