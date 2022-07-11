@section('title', __('Students'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fas fa-users text-primary"></i>
                                <strong class="font-weight-semibold">Lista de Alumnos</strong>
                            </h4>
                        </div>
                        <a class="btn btn-md btn-info" data-toggle="modal" data-target="#createStudent">
                            <i class="fa fa-plus"></i> Registrar nuevo alumno
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.students.create')
                    @include('livewire.students.update')
                    <div class="px-2 py-3">
                        <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                            placeholder="Buscar alumno" autocomplete="off">
                    </div>
                    <div class="px-2 py-2">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Código</th>
                                        <th>Nombres</th>
                                        <th>Apellidos</th>
                                        <th>Dni</th>
                                        <th>Grado Académico</th>
                                        <th>Email</th>
                                        <th>Fecha de Nacimiento</th>
                                        <th>Nombre del padre</th>
                                        <th>Teléfono</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($students->count())
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $student->code }}</td>
                                                <td>{{ $student->first_name }}</td>
                                                <td>{{ $student->last_name }}</td>
                                                <td>{{ $student->dni }}</td>
                                                <td>
                                                    @if ($student->levels !== Null)
                                                    {{$student->levels->name }}
                                                    @else
                                                            No hay
                                                    @endif
                                                </td>
                                                <td>{{ $student->email }}</td>
                                                <td>{{ $student->birthday }}</td>
                                                <td>{{ $student->parents_name }}</td>
                                                <td>{{ $student->phone }}</td>
                                                <td>
                                                    @if ($student->status == 'Activo')
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
                                                        wire:click="edit({{ $student->id }})" data-toggle="modal"
                                                        data-target="#editStudent">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a class="btn btn-danger btn-md rounded"
                                                        wire:click="$emit('deleteStudent', {{ $student->id }})">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a href="" class="btn btn-info btn-md rounded"
                                                        wire:click="$emit('changeStudent', {{ $student->id }})"
                                                        data-toggle="modal">
                                                        <i class="fas fa-user-cog"></i>
                                                    </a>
                                                </td>
                                        @endforeach
                                    @else
                                        <tr class="odd text-center">
                                            <td valign="top" colspan="13" class="dataTables_empty">No existe ningún
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
                        {{ $students->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
