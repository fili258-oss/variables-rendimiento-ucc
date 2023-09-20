<div>
    @include('livewire.sit-academic-reports.modals.edit')
    @include('livewire.sit-academic-reports.modals.info')
    @include('livewire.sit-academic-reports.modals.delete')

    @section('title','UniMetrics | Importar situación acádemica estudiantes')
    @if(Session::has('success'))
    <div class="alert alert-success"> {{ Session::get('success') }}</div>
    @endif
    <form wire:submit.prevent="import" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-2 col-xl-4 order-0 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Filtrar Nombre de estudiante</label>
                <input type="text" class="form-control" wire:model="search" name="search" id="formFile" />                
            </div>
            <div class="col-md-6 col-lg-2 col-xl-4 order-0 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Informe estudiantes CSV</label>
                <input type="file" class="form-control" wire:model="file" name="file" id="formFile" />
            </div>
            <div class="col-md-6 col-lg-4 col-xl-2 order-1 mt-4">
                {{-- <button class="btn btn-primary " type="button"><i class='bx bx-check-circle'></i> Importar</button>     --}}
                <input type="submit" class="btn btn-primary d-grid w-100" value="Importar">
            </div>
        </div>
    </form>
    {{-- <div class="row">        
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
    </div> --}}
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
                            <th>Situación acádemica</th>
                            <th>Promedio semestre</th>
                            <th>Promedio acumulado</th>
                            <th>Acciones</th>
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
