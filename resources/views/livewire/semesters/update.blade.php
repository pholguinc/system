<!-- Modal
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Semester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="name"></label>
                <input wire:model="name" type="text" class="form-control" id="name" placeholder="Name">@error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="status"></label>
                <input wire:model="status" type="text" class="form-control" id="status" placeholder="Status">@error('status') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
       </div>
    </div>
</div> -->
<x-adminlte-modal id="editSemester" title="Crear Usuario" theme="dark" icon="fas fa-user-plus" size='lg'
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
            wire:click.prevent="update()" class="close-modal" />
    </x-slot>
</x-adminlte-modal>
