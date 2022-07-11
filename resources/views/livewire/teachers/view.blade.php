@section('title', __('Teachers'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fas fa-users text-primary"></i>
                                <strong class="font-weight-semibold">Lista de Docentes</strong>
                            </h4>
                        </div>
                        <a class="btn btn-md btn-info" data-toggle="modal" data-target="#createTeacher">
                            <i class="fa fa-plus"></i> Registrar nuevo docente
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.teachers.create')
                    @include('livewire.teachers.update')
                    <div class="px-2 py-4">
                        <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                            placeholder="Search Teachers">
                    </div>
                    <div class="px-2 py-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Código</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Email</th>
                                        <th>Dni</th>
                                        <th>Teléfono</th>
                                        <th>Dirección</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Curso Asignado</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $teacher->code }}</td>
                                            <td>{{ $teacher->first_name }}</td>
                                            <td>{{ $teacher->last_name }}</td>
                                            <td>{{ $teacher->email }}</td>
                                            <td>{{ $teacher->dni }}</td>
                                            <td>{{ $teacher->phone }}</td>
                                            <td>{{ $teacher->address }}</td>
                                            <td>{{ $teacher->birthday }}</td>
                                            <td>{{ $teacher->courses->course_name }}</td>
                                            <td>
                                                @if ($teacher->status == 'Activo')
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
                                            <td width="170px">
                                                <a class="btn btn-primary btn-md rounded"
                                                    wire:click="edit({{ $teacher->id }})" data-toggle="modal"
                                                    data-target="#editTeacher">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a class="btn btn-danger btn-md rounded"
                                                    wire:click="$emit('deleteTeacher', {{ $teacher->id }})">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <a href="" class="btn btn-info btn-md rounded"
                                                    wire:click="$emit('changeTeacher', {{ $teacher->id }})"
                                                    data-toggle="modal">
                                                    <i class="fas fa-user-cog"></i>
                                                </a>
                                            </td>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {{ $teachers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
