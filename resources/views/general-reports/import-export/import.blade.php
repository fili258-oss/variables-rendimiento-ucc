@extends("layouts.app")
@section('title','UniMetrics | Importar informes generales')
@section("content")
@if(Session::has('success'))

<div class="bs-toast toast toast-placement-ex m-2 fade bg-success top-0 end-0 show" role="alert" aria-live="assertive" aria-atomic="true" data-delay="2000">
    <div class="toast-header">
        <i class='bx bx-check-shield me-2'></i>
        <small>Importación finalizada</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    <div class="toast-body">{{ Session::get('success') }}</div>

</div>
@endif
<form action="{{ route('importReports') }}" method="POST" name="importform" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 col-lg-2 col-xl-3 order-0 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Período Academico</label>
            <select id="defaultSelect" class="form-select" name="periodo">
                <option>Seleccione período</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>
        <div class="col-md-6 col-lg-2 col-xl-4 order-0 mb-4">
            <label class="form-label" for="basic-icon-default-fullname">Archivo informe general de cursos CSV</label>
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
                            <button class="btn btn-warning sm-b" {{-- wire:click='showInfo({{ $user->iduser }})' --}} data-toggle="modal" data-target="#info-modal"><i class="fa fa-eye"></i> Ver</button>
                            <button class="btn btn-primary sm-b" {{-- wire:click='edit({{ $user->iduser }})' --}} data-toggle="modal" data-target="#edit-modal">
                                <i class="fa fa-pencil-square"></i>
                                Editar
                            </button>
                            <button class="btn btn-danger sm-b" {{-- wire:click='delete({{ $user->iduser }})' --}} data-toggle="modal" data-target="#delete-modal">
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
            {{ $reports->links() }}
          </ul>
        </nav>
      </div>
    </div>
</div>
@endsection
