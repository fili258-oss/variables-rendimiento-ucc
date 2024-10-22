<div wire:ignore.self class="modal modal-danger fade" id="delete-modal" data-bs-backdrop="static" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="backDropModalTitle">Desactivar estudiante</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-6">
                        @if(isset($student->name))
                            <h3 for="nameBackdrop" class="form-control" style="color: red">¿Confirmas desactivar al estudiante {{ $student->name }} {{ $student->lastname }} ({{ $student->identification }})?</h3>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" wire:click="cancel()" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" class="btn btn-primary" wire:click="desable()">Si, Desactivalo</button>
            </div>
        </form>
    </div>
</div>

