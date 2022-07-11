<!-- Modal
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Teacher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="code"></label>
                <input wire:model="code" type="text" class="form-control" id="code" placeholder="Code">@error('code') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="first_name"></label>
                <input wire:model="first_name" type="text" class="form-control" id="first_name" placeholder="First Name">@error('first_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="last_name"></label>
                <input wire:model="last_name" type="text" class="form-control" id="last_name" placeholder="Last Name">@error('last_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="email"></label>
                <input wire:model="email" type="text" class="form-control" id="email" placeholder="Email">@error('email') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="dni"></label>
                <input wire:model="dni" type="text" class="form-control" id="dni" placeholder="Dni">@error('dni') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="phone"></label>
                <input wire:model="phone" type="text" class="form-control" id="phone" placeholder="Phone">@error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="address"></label>
                <input wire:model="address" type="text" class="form-control" id="address" placeholder="Address">@error('address') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="birthday"></label>
                <input wire:model="birthday" type="text" class="form-control" id="birthday" placeholder="Birthday">@error('birthday') <span class="error text-danger">{{ $message }}</span> @enderror
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
</div>-->

<x-adminlte-modal id="editTeacher" title="Crear Usuario" theme="dark" icon="fas fa-user-plus" size='lg'
    wire:ignore.self>

    <form autocomplete="off">
        <div class="form-group">
            <label for="code">Código</label>
            <input wire:model="code" type="text" class="form-control" id="code"
                placeholder="Ingrese código del alumno">
            @error('code')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">Nombres:</label>
                <input wire:model="first_name" type="text" class="form-control" id="first_name"
                    placeholder="Ingrese los nombres del alumno">
                @error('first_name')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Apellidos</label>
                <input wire:model="last_name" type="text" class="form-control" id="last_name"
                    placeholder="Ingrese los apellidos del anlumno">
                @error('last_name')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Email:</label>
                <input wire:model="email" type="email" class="form-control" id="email"
                    placeholder="Ingrese el email del alumno">
                @error('email')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="dni">DNI:</label>
                <input wire:model="dni" type="text" class="form-control" id="dni"
                    placeholder="Ingrese el dni del alumno">
                @error('dni')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="phone">Teléfono:</label>
                <input wire:model="phone" type="text" class="form-control" id="phone"
                    placeholder="Ingrese el télefono de contacto">
                @error('phone')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="birthday">Fecha de Nacimiento:</label>
                <input wire:model="birthday" type="date" class="form-control" id="birthday"
                    placeholder="Birthday">
                @error('birthday')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="address">Dirección:</label>
            <input wire:model="address" type="text" class="form-control" id="address"
                placeholder="Ingrese la dirección del alumno">
            @error('address')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input wire:model="password" type="text" class="form-control" id="password"
                placeholder="Ingrese la contraseña">
            @error('password')
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

