class DeleteModal
{
    deleteModalElement;
    deleteModal;
    type;
    uid;

    constructor() {
        this.init();
    }

    init() {
        $('.btn-delete-modal-open').on('click.delete-modal-open', (event) => {
            this.type = event.target.dataset.type;
            this.uid = event.target.dataset.uid;
            this.openDeleteModal();
        });

        $('.delete-modal .save-btn').on('click.delete-modal-save', (event) => {
            this.save(event);
        });

        this.deleteModalElement = $('.delete-modal');
        this.deleteModalElement.on('shown.bs.modal', (event) => {
            $.ajax({
                url: '/entity/modal/delete/' + this.type + '/' + this.uid
            }).done((response) => {
                $('.delete-modal .modal-body').html(response.html);
            })
        });
    }

    openDeleteModal() {
        this.deleteModal = new bootstrap.Modal('.delete-modal', {});
        this.deleteModal.show();
    }

    save(event) {
        $.ajax({
            method: 'POST',
            url: '/entity/save/delete/' + this.type + '/' + this.uid
        })
        .fail((response) => {
            $('.delete-error-container').html(Object.entries(response.responseJSON.errors).map(error => error[1]).join('<br/>')).toggleClass('d-none');
        })
        .done(() => {
            location.reload();
        })
    }
}

new DeleteModal();
