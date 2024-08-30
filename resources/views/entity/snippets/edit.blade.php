<div class="modal edit-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ __('entity.szerkesztes') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger edit-error-container d-none"></div>

                <div class="editor-container">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">
                                {{ __('entity.betoltes') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    {{ __('layout.megse') }}
                </button>
                <button type="button" class="btn btn-primary save-btn">
                    {{ __('entity.mentes') }}
                </button>
            </div>
        </div>
    </div>
</div>
