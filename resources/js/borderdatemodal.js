$('.btn-borderdate-modal-open').on('click.borderdate-modal-open', () => {
    openBorderdateModal();
});

const borderdateModalElement = $('.borderdate-modal');
borderdateModalElement.on('shown.bs.modal', (event) => {
    $.ajax({
        url: '/entity/modal/borderdate/' + event.target.dataset.type + '/' + event.target.dataset.id
    }).done((response) => {
        $('.borderdate-modal .modal-body').html(response.html);
    })
});
function openBorderdateModal() {
    const borderdateModal = new bootstrap.Modal('.borderdate-modal', {});
    borderdateModal.show();
}

function saveBorderdate() {
    const borderdateModal = new bootstrap.Modal('.borderdate-modal', {});
    borderdateModal.show();
}
