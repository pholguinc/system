<div class="card card-outline card-primary" wire:ignore.self>
    <div class="card-header">
        <a href="{{ route('admin.students.create') }}" class="btn btn-md btn-secondary">
            <i class="fas fa-plus mr-1"></i>
            <span>Nuevo alumno</span>
        </a>
    </div>
    <div class="card-body">
        <div class="dataTables_wrapper dt-bootstrap4">
            <input type="search" class="form-control form-control-md mb-3" placeholder="Buscar alumno"
                            wire:model="search">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped table-bordered table-hover">
                        <thead class="thead-dark">
                            <th style="cursor: pointer;" wire:click="order('id')">Id
                                @if ($sort == 'id')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th style="cursor: pointer;" wire:click="order('code')">Código
                                @if ($sort == 'code')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif

                            </th>
                            <th style="cursor: pointer;" wire:click="order('first_name')">Nombres
                                @if ($sort == 'first_name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th style="cursor: pointer;" wire:click="order('last_name')">Apellidos
                                @if ($sort == 'last_name')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th style="cursor: pointer;" wire:click="order('dni')">DNI
                                @if ($sort == 'dni')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th style="cursor: pointer;" wire:click="order('email')">Email
                                @if ($sort == 'email')
                                    @if ($direction == 'asc')
                                        <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                    @else
                                        <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                    @endif
                                @else
                                    <i class="fas fa-sort float-right mt-1"></i>
                                @endif
                            </th>
                            <th>Grado</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </thead>
                        <tbody>
                            @if ($students->count())
                                @foreach ($students as $student)
                                    <tr>
                                        <td width="10px">{{ $student->id }}</td>
                                        <td width="10px">{{ $student->code }}</td>
                                        <td width="10px">{{ $student->first_name }}</td>
                                        <td width="10px">{{ $student->last_name }}</td>
                                        <td width="10px">{{ $student->dni }}</td>
                                        <td width="10px">{{ $student->email }}</td>
                                        <td width="10px">
                                            {{ $student->levels->name }}
                                        </td>
                                        <td width="10px">
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
                                        <td width="10px">

                                            <a class="btn btn-primary btn-md rounded"
                                                href="{{ route('admin.students.edit', $student) }}">
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
                                    </tr>
                                @endforeach
                            @else
                                <tr class="odd text-center">
                                    <td valign="top" colspan="10" class="dataTables_empty">No existe ningún
                                        registrop con su búsqueda</td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <div class="card-footer">
        <div class="float-right">
            {{ $students->links() }}
        </div>
    </div>

</div>

@push('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('').DataTable({
                "language": {
                    "sProcessing": "Procesando...",
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla =(",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad"
                    }
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            Livewire.on('alert', function($message) {
                Swal.fire(
                    'Good job!',
                    $message,
                    'success',
                )
            });
            Livewire.on('deleteStudent', StudentId => {
                Swal.fire({
                    title: '¿Está seguro de querer eliminarlo?',
                    text: "¡Al eliminarlo no hay opción a recuperarlo!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('delete', StudentId);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                });
            });
            Livewire.on('changeStudent', StudentId => {
                Swal.fire({
                    title: '¿Desea cambiar el estado de este usuario?',
                    text: "¡Al realizarlo se otorgará permisos adicionales!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, deseo cambiarlo!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emit('change', StudentId);
                        Swal.fire(
                            '¡Correcto!',
                            '¡El usuario fue actualizado con éxito!',
                            'success'
                        )
                    }
                });
            });
        });
    </script>
@endpush
