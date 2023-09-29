<div>
    @section('title','UniMetrics | Informe de situaciones acádemicas')
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

            @if(!is_null($programs))
            <div class="col-md-6 col-lg-2 col-xl-2 order-1 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Programa</label>
                <select id="program" class="form-select form-select-sm" wire:model="selectedProgram" name="faculty">
                    <option value="">Seleccione una opción</option>
                    @if(!is_null($programs))
                    @foreach ($programs as $program)
                    <option value="{{ $program }}">{{ $program }}</option>
                    @endforeach    
                    @endif
                    
                </select>
            </div>
            @endif

            @if(!is_null($academicLevels))
            <div class="col-md-6 col-lg-2 col-xl-2 order-1 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Curso</label>
                <select id="academicLevel" class="form-select form-select-sm" wire:model="selectedAcademicLevel" name="faculty">
                    <option value="">Seleccione una opción</option>
                    @if(!is_null($academicLevels))
                    @foreach ($academicLevels as $academicLevel)
                    <option value="{{ $academicLevel }}">{{ $academicLevel }}</option>
                    @endforeach
                    @endif                    
                </select>
            </div>
            @endif
            @if(!is_null($sitAcademics))
            <div class="col-md-6 col-lg-2 col-xl-2 order-3 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Estado</label>
                <select id="selectedSitAcademic" class="form-select form-select-sm" wire:model="selectedSitAcademic" name="level">
                    <option value="">Seleccione una opción</option>
                    @if(!is_null($sitAcademics))
                    @foreach ($sitAcademics as $sitAcademic)
                    <option value="{{ $sitAcademic }}">{{ $sitAcademic }}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            @endif
            <div class="col-md-6 col-lg-4 col-xl-2 order-4 mt-4"> 
                
                <a href="{{ route('reportsIndividual') }}" class="btn btn-danger btn-sm"><i class="bx bx-trash"></i></a>
                <button class="btn btn-success btn-sm" wire:click='exportRows()' type="button"><i class="bx bx-export"></i></button>
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
                            <th>Ciclo Lectivo</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Sit acádemica</th>
                            <th>Promedio semestre</th>
                            <th>Promedio acumulado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($reports as $report)
                        <tr>
                            <th scope="row">{{ $report->id }}</th>
                            <td>{{ $report->academicPeriod }}</td>
                            <td>{{ $report->firstName }}</td>
                            <td>{{ $report->lastSurname }}</td>
                            <td>{{ $report->academicSituation }}</td>
                            <td>{{ $report->averageSemester }}</td>
                            <td>{{ $report->averageAccumulated }}</td>
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
