<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        Livewire.on('alert', function($message) {
            Swal.fire(
                'Good job!',
                $message,
                'success',
            )
        });
        Livewire.on('deleteSemester', SemesterId => {
            Swal.fire({
                title: '¿Está seguro de querer eliminarlo?',
                text: "¡Al eliminarlo no hay opción a recuperarlo!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, deseo eliminarlo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('delete', SemesterId);
                    Swal.fire(
                        '¡Eliminado!',
                        '¡El registro fue removido con éxito!',
                        'success'
                    )
                }
            });
        });
        Livewire.on('changeSemester', SemesterId => {
            Swal.fire({
                title: '¿Desea cambiar el estado de este usuario?',
                text: "¡Al realizarlo se otorgará/editará permisos adicionales!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '¡Sí, deseo cambiarlo!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('change', SemesterId);
                    Swal.fire(
                        '¡Correcto!',
                        '¡El curso fue actualizado con éxito!',
                        'success'
                    )
                }
            });
        });
        Livewire.on('render', () => {
            $('#createSemester').modal('hide');
        });
        Livewire.on('alert', () => {
            $('#editSemester').modal('hide');
        });
    });
</script>
