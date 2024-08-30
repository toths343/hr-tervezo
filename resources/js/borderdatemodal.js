const borderdateModalElement = $('.borderdate-modal');
borderdateModalElement.on('shown.bs.modal', (event) => {
    $.ajax({
        url: '/entity/modal/borderdate/' + event.target.dataset.type + '/' + event.target.dataset.id
    }).done((response) => {
        $('.borderdate-modal .modal-body').html(response.html);
    })
});
export function openBorderdateModal() {
    const borderdateModal = new bootstrap.Modal('.borderdate-modal', {});
    borderdateModal.show();
}
