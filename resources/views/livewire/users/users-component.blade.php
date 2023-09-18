<div>
    @include('livewire.users.modals.edit')
    @include('livewire.users.modals.create')
    @include('livewire.users.modals.delete')

    @section('title','UniMetrics | Usuarios')    
    
    <form action="" method="POST" name="importform" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-6 order-0 mb-4">
                <label class="form-label" for="basic-icon-default-fullname">Filtrar Nombre de Usuario</label>
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
                            <th>#</th>
                            <th>Nombre</th>
                            <th>correo electrónico</th>
                            <th>Perfil</th>                                                        
                            <th>Avatar</th>                            
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>perfil</td>                                                       
                            <td><img src="{{ asset('storage/'.$user->image) }}" class="w-px-40 h-auto rounded-circle"></td>
                            <td>                                
                                <button class="btn btn-primary btn-sm" wire:click='edit({{ $user->id }})' data-bs-toggle="modal" data-bs-target="#edit-modal">                                    
                                    Editar
                                    <i class="bx bxs-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" wire:click='delete({{ $user->id }})' data-bs-toggle="modal" data-bs-target="#delete-modal">                                    
                                    Eliminar
                                    <i class="bx bxs-trash"></i>
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
                        {{$users->links()}}
                    </ul>
                </nav>
            </div>
        </div>
    </div>        
</div>

