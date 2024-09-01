<div class="modal delete-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    {{ __('entity.torles') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="delete-container d-none"></div>

                <div class="d-flex justify-content-center loader-container">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">
                            {{ __('entity.betoltes') }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    {{ __('layout.megse') }}
                </button>
                <button type="button" class="btn btn-danger save-btn">
                    {{ __('entity.torles') }}
                </button>
            </div>
        </div>
    </div>
</div>
