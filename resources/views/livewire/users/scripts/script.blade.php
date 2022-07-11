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
        Livewire.on('deleteUser', UserId => {
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
                    Livewire.emit('delete', UserId);
                    Swal.fire(
                        '¡Eliminado!',
                        '¡El registro fue removido con éxito!',
                        'success'
                    )
                }
            });
        });
        Livewire.on('changeUser', UserId => {
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
                    Livewire.emit('change', UserId);
                    Swal.fire(
                        '¡Correcto!',
                        '¡El usuario fue actualizado con éxito!',
                        'success'
                    )
                }
            });
        });
        Livewire.on('render', () => {
            $('#createUser').modal('hide');
        });
        Livewire.on('alert', () => {
            $('#editUser').modal('hide');
        });
    });
</script>
