@if($mergeable)
    <button type="button" class="btn btn-outline-success mb-2 btn-borderdate-modal-open">
        {{ __('entity.hatardatum_elmozgatasa') }}
    </button>

    <div class="modal borderdate-modal" tabindex="-1" data-type="{{ $type }}" data-id="{{ $id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ __('entity.hatardatum_elmozgatasa') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
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
                    <button type="button" class="btn btn-primary save-btn" data-type="{{ $type }}" data-id="{{ $id }}">
                        {{ __('entity.modositas') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

@endif
