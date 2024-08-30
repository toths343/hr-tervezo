const mergeModalElement = $('.merge-modal');
mergeModalElement.on('shown.bs.modal', (event) => {
    $.ajax({
        url: '/entity/modal/merge/' + event.target.dataset.type + '/' + event.target.dataset.id
    }).done((response) => {
        $('.merge-modal .modal-body').html(response.html);
    })
});

export function openMergeModal() {
    const mergeModal = new bootstrap.Modal('.merge-modal', {});
    mergeModal.show();
}
