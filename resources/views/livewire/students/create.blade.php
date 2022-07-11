
<x-adminlte-modal id="createStudent" title="Crear Usuario" theme="dark" icon="fas fa-user-plus" size='lg'
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
            <label for="parents_name">Nombre del padre:</label>
            <input wire:model="parents_name" type="text" class="form-control" id="parents_name"
                placeholder="Ingrese el nombre del padre">
            @error('parents_name')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {{ Form::label('Grado Académico') }}
            {{ Form::select('level_id', $levels, null, ['class' => 'form-control' . ($errors->has('level_id') ? ' is-invalid' : ''), 'placeholder' => 'Level Id']) }}
            {!! $errors->first('level_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </form>

    <x-slot name="footerSlot">
        <x-adminlte-button theme="secondary" icon="fas fa-window-close" label="Cerrar" wire:click.prevent="cancel()"
            data-dismiss="modal" />
        <x-adminlte-button theme="success" icon="fas fa-save" label="Guardar" wire:loading.attr="disabled"
            wire:click.prevent="store()" class="close-modal" />
    </x-slot>
</x-adminlte-modal>
