@section('title', __('Users'))
<div class="card card-outline card-primary">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div class="float-left">
                <h4><i class="fas fa-users text-primary"></i>
                    <strong class="font-weight-semibold">Lista de Empleados</strong>
                </h4>
            </div>
            <a class="btn btn-md btn-info" data-toggle="modal" data-target="#createUser">
                <i class="fa fa-plus"></i> Registrar nuevo alumno
            </a>
        </div>
    </div>
    <div class="card-body">
        @include('livewire.users.create')
        @include('livewire.users.update')
        <div class="px-2 py-3">
            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                placeholder="Buscar empleado" autocomplete="off">
        </div>

        <div class="px-2 py-2">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead class="thead-dark">
                        <th>Id</th>
                        <th>Código</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>DNI</th>
                        <th>Email</th>
                        <th>Estado</th>
                        <th>Cargo</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>

                        @if ($users->count())
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->code }}</td>
                                    <td>{{ $user->first_name }}</td>
                                    <td>{{ $user->last_name }}</td>
                                    <td>{{ $user->dni }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if ($user->status == 'Activo')
                                            <button type="button" class="btn btn-success btn-md">
                                                <span>Activo</span>
                                                <i class="fa fa-check ml-2"></i>
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-danger btn-md">
                                                <span>Inactivo</span>
                                                <i class="fa fa-window-close ml-2"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td>Admin</td>
                                    <td width="170px">
                                        <a class="btn btn-primary btn-md rounded" wire:click="edit({{ $user->id }})"
                                            data-toggle="modal" data-target="#editUser">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <a class="btn btn-danger btn-md rounded"
                                            wire:click="$emit('deleteUser', {{ $user->id }})">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <a href="" class="btn btn-info btn-md rounded"
                                            wire:click="$emit('changeUser', {{ $user->id }})" data-toggle="modal">
                                            <i class="fas fa-user-cog"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="odd text-center">
                                <td valign="top" colspan="10" class="dataTables_empty">No existe ningún
                                    registro con su búsqueda</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <div class="card-footer">
        <div class="float-right">
            {{ $users->links() }}
        </div>
    </div>
</div>
