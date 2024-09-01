<div class="modal edit-modal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title title-edit d-none">
                    {{ __('entity.szerkesztes') }}
                </h5>
                <h5 class="modal-title title-new d-none">
                    {{ __('entity.uj_felvitele') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="alert alert-danger error-container d-none"></div>

                <div class="d-flex justify-content-center loader-container">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">
                            {{ __('entity.betoltes') }}
                        </span>
                    </div>
                </div>
                <div class="editor-container d-none"></div>
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
