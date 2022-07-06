<div class="box-footer mt20">
    <div class="float-right">
        <button type="submit" class="btn btn-md bg-primary">
            <i class="fas fa-save mr-1"></i>
            <span>Actualizar</span>
        </button>
        <button type="submit" href="" class="btn btn-md bg-danger" wire:click="clearData">
            <i class="fas fa-window-close mr-1"></i>
            <span>Cancelar</span>
        </button>
        <button type="submit" class="btn btn-md bg-purple" href="{{ route('admin.students.index') }}">
            <i class="fas fa-angle-double-left mr-1"></i>
            <span>Regresar</span>
        </button>
    </div>
</div>
</div>
