<!-- Modal
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
					<input type="hidden" wire:model="selected_id">
            <div class="form-group">
                <label for="course_name"></label>
                <input wire:model="course_name" type="text" class="form-control" id="course_name" placeholder="Course Name">@error('course_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="course_description"></label>
                <input wire:model="course_description" type="text" class="form-control" id="course_description" placeholder="Course Description">@error('course_description') <span class="error text-danger">{{ $message }}</span> @enderror
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

<x-adminlte-modal id="editCourse" title="Crear Usuario" theme="dark" icon="fas fa-user-plus" size='lg'
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
            <textarea wire:model="course_description" type="text" class="form-control" id="course_description" rows="8" cols="50" placeholder="Descripción del curso">

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
            wire:click.prevent="update()" class="close-modal" />
    </x-slot>
</x-adminlte-modal>

