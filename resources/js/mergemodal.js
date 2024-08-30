export function openMergeModal() {
    const mergeModalElement = $('.merge-modal');
    mergeModalElement.on('shown.bs.modal', (event) => {
        $.ajax({
            url: '/entity/modal/merge',
            data: {
                type: event.target.dataset.type,
                id: event.target.dataset.id
            }
        }).done((response) => {
            $('.merge-modal .modal-body').html(response.html);
        })
    })

    const mergeModal = new bootstrap.Modal('.merge-modal', {});
    mergeModal.show();
}
