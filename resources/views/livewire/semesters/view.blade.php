@section('title', __('Semesters'))
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4><i class="fas fa-users text-primary"></i>
                                <strong class="font-weight-semibold">Lista de Semestres</strong>
                            </h4>
                        </div>
                        <a class="btn btn-md btn-info" data-toggle="modal" data-target="#createSemester">
                            <i class="fa fa-plus"></i> Registrar nuevo semestre
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @include('livewire.semesters.create')
                    @include('livewire.semesters.update')
                    <div class="px-2 py-4">
                        <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                            placeholder="Search Semesters">
                    </div>
                    <div class="px-2 py-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semesters as $semester)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $semester->name }}</td>
                                            <td width="170px">
                                                @if ($semester->status == 'Activo')
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
                                                    wire:click="edit({{ $semester->id }})" data-toggle="modal"
                                                    data-target="#editSemester">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <a class="btn btn-danger btn-md rounded"
                                                    wire:click="$emit('deleteSemester', {{ $semester->id }})">
                                                    <i class="fas fa-trash-alt"></i>
                                                </a>
                                                <a href="" class="btn btn-info btn-md rounded"
                                                    wire:click="$emit('changeSemester', {{ $semester->id }})"
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
                        {{ $semesters->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
