<div>
    @include('livewire.appointment-module.appointments.modals.create')    
    @section('title','UniMetrics | Agendar citas')    

    <form>
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
                            <th>Identificación</th>                                                                                    
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Fecha</th>
                            <th>Hora</th>                                                                                                         
                            <th>Motivo de consulta</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($appoinments as $appointment)
                        <tr>
                            <td>{{ $appointment->idetificationStudent }}</td>
                            <td>{{ $appointment->nameStudent }}</td>
                            <td>{{ $appointment->lastNameStudent }}</td>
                            <th scope="row">{{ $appointment->scheduled_date }}</th>
                            <th scope="row">{{ $appointment->scheduled_time }}</th>                                                        
                            <td>{{ $appointment->typeConusltation }}</td>
                            <td>{{ $appointment->status }}</td> 
                            <td>
                                <button class="btn btn-success btn-sm">
                                    Seguimientos
                                </button>                                
                                <button class="btn btn-primary btn-sm" wire:click='edit({{ $appointment->id }})' data-bs-toggle="modal" data-bs-target="#edit-modal">
                                    <i class="fa fa-pencil-square"></i>
                                    Editar
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
                        {{$appoinments->links()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>        
</div>

