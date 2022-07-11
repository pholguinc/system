<x-adminlte-modal id="createSemester" title="Crear Usuario" theme="dark" icon="fas fa-user-plus" size='lg'
    wire:ignore.self>

    <form autocomplete="off">

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input wire:model="name" type="text" class="form-control" id="name"
                placeholder="Nombre del curso">
            @error('name')
                <span class="error text-danger">{{ $message }}</span>
            @enderror

        </div>



    </form>

    <x-slot name="footerSlot">
        <x-adminlte-button theme="secondary" icon="fas fa-window-close" label="Cerrar" wire:click.prevent="cancel()"
            data-dismiss="modal" />
        <x-adminlte-button theme="success" icon="fas fa-save" label="Guardar" wire:loading.attr="disabled"
            wire:click.prevent="store()" class="close-modal" />
    </x-slot>
</x-adminlte-modal>

