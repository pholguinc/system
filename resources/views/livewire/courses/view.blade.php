@section('title', __('Courses'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fas fa-users text-primary"></i>
                                <strong class="font-weight-semibold">Lista de Cursos</strong>
                            </h4>
                        </div>
                        <a class="btn btn-md btn-info" data-toggle="modal" data-target="#createCourse">
                            <i class="fa fa-plus"></i> Registrar nuevo curso
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.courses.create')
                    @include('livewire.courses.update')
                    <div class="px-2 py-3">
                        <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                            placeholder="Buscar cursos">
                    </div>
                    <div class="px-2 py-2">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Código</th>
                                        <th>Nombre</th>
                                        <th>Descripción</th>
                                        <th>Grado Académico</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($courses->count())
                                        @foreach ($courses as $course)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $course->code }}</td>
                                                <td>{{ $course->course_name }}</td>
                                                <td>{{ $course->course_description }}</td>
                                                <td>{{ $course->levels->name}}</td>
                                                <td>
                                                    @if ($course->status == 'Activo')
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
                                                        wire:click="edit({{ $course->id }})" data-toggle="modal"
                                                        data-target="#editCourse">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a class="btn btn-danger btn-md rounded"
                                                        wire:click="$emit('deleteCourse', {{ $course->id }})">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                    <a href="" class="btn btn-info btn-md rounded"
                                                        wire:click="$emit('changeCourse', {{ $course->id }})"
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
                        {{$courses->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
