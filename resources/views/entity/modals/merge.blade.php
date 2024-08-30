@if($mergeable)
    <button type="button" class="btn btn-outline-success my-2" onclick="openMergeModal()">
        {{ __('entity.szakaszok_osszevonasa') }}
    </button>

    <div class="modal merge-modal" tabindex="-1" id="merge-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        {{ __('entity.szakaszok_osszevonasa') }}
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endif
