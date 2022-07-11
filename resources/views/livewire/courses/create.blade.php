<x-adminlte-modal id="createCourse" title="Crear Usuario" theme="dark" icon="fas fa-user-plus" size='lg'
    wire:ignore.self>

    <form autocomplete="off">
        <div class="form-group">
            <label for="code">Código:</label>
            <input wire:model="code" type="text" class="form-control" id="code" placeholder="Código">
            @error('code')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="course_name">Nombre:</label>
            <input wire:model="course_name" type="text" class="form-control" id="course_name"
                placeholder="Nombre del curso">
            @error('course_name')
                <span class="error text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="course_description">Descripción</label>
            <textarea wire:model="course_description" type="text" class="form-control" id="course_description" rows="8"
                cols="50" placeholder="Descripción del curso">

            </textarea>
            @error('course_description')
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
