class BorderdateModal
{
    borderdateModalElement;
    borderdateModal;

    constructor() {
        this.init();
    }

    init() {
        $('.btn-borderdate-modal-open').on('click.borderdate-modal-open', () => {
            this.openBorderdateModal();
        });

        $('.borderdate-modal .save-btn').on('click.borderdate-modal-save', (event) => {
            this.save(event);
        });

        this.borderdateModalElement = $('.borderdate-modal');
        this.borderdateModalElement.on('shown.bs.modal', (event) => {
            $.ajax({
                url: '/entity/modal/borderdate/' + event.target.dataset.type + '/' + event.target.dataset.id
            }).done((response) => {
                $('.borderdate-modal .modal-body').html(response.html);
            })
        });
    }

    openBorderdateModal() {
        this.borderdateModal = new bootstrap.Modal('.borderdate-modal', {});
        this.borderdateModal.show();
    }

    save(event) {
        $.ajax({
            method: 'POST',
            url: '/entity/save/borderdate/' + event.target.dataset.type + '/' + event.target.dataset.id,
            data: new FormData(document.querySelector('.borderdate-form')),
            processData: false,
            contentType: false
        })
            .fail((response) => {
                $('.borderdate-error-container').html(Object.entries(response.responseJSON.errors).map(error => error[1]).join('<br/>')).toggleClass('d-none');
            })
            .done(() => {
                location.reload();
            })
    }
}

new BorderdateModal();
