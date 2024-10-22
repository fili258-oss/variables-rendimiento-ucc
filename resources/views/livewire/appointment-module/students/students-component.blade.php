<div>
    
    @include('livewire.appointment-module.students.modals.create')
    @include('livewire.appointment-module.students.modals.edit')
    @include('livewire.appointment-module.students.modals.desable')

    @section('title','UniMetrics | Estudiantes programa enlace')    
    @if(Session::has('success'))
        <div class="alert alert-success"> {{ Session::get('success') }}</div>
    @endif
    <form action="{{ route('importReportsIndividuals') }}" method="POST" name="importform" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-2 col-xl-4 order-0 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Filtrar por cédula</label>
                <input type="text" class="form-control" wire:model="search" name="search" id="formFile" />                
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6 order-1 mt-4">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-modal">Agregar nuevo</button>
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
                            <th>ID estudiante</th>                                                                                    
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Identificación</th>                                                                                    
                            <th>Programa académico</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($students as $student)
                        <tr>
                            <th scope="row">{{ $student->student_code }}</th>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->lastname }}</td>
                            <td>{{ $student->identification }}</td>
                            <td>{{ $student->programName }}</td>
                            <td>
                                @if($student->active == 1)
                                    <span class="badge bg-label-success">Activo</span>
                                @elseif($student->active == 0)
                                    <span class="badge bg-label-warning">Inactivo</span>
                                @endif
                            </td> 
                            <td>                                
                                <button class="btn btn-primary btn-sm" wire:click='edit({{ $student->id }})' data-bs-toggle="modal" data-bs-target="#edit-modal">
                                    <i class="fa fa-pencil-square"></i>
                                    Editar
                                </button>
                                @if($student->active == 1)                                    
                                    <button class="btn btn-danger btn-sm" wire:click='deactivate({{ $student->id }})' data-bs-toggle="modal" data-bs-target="#delete-modal">
                                        <i class="fa fa-trash"></i>
                                        Desactivar
                                    </button>
                                @elseif($student->active == 0)
                                <button class="btn btn-success btn-sm" wire:click='enable({{ $student->id }})'>
                                    <i class="fa fa-trash"></i>
                                    Activar
                                </button>
                                @endif
                                
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
                        {{$students->links()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>        
</div>

