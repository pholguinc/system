<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        Livewire.on('alert', function($message) {
            Swal.fire(
                'Good job!',
                $message,
                'success',
            )
        });
        Livewire.on('deleteCourse', CourseId => {
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
                    Livewire.emit('delete', CourseId);
                    Swal.fire(
                        '¡Eliminado!',
                        '¡El registro fue removido con éxito!',
                        'success'
                    )
                }
            });
        });
        Livewire.on('changeCourse', CourseId => {
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
                    Livewire.emit('change', CourseId);
                    Swal.fire(
                        '¡Correcto!',
                        '¡El curso fue actualizado con éxito!',
                        'success'
                    )
                }
            });
        });
        Livewire.on('render', () => {
            $('#createCourse').modal('hide');
        });
        Livewire.on('alert', () => {
            $('#editCourse').modal('hide');
        });
    });
</script>
