class EditModal {
    editModalElement;
    editModal;
    type;
    uid;

    constructor() {
        this.init();
    }

    init() {
        $('.btn-edit-modal-open').on('click.edit-modal-open', (event) => {
            this.type = event.target.dataset.type;
            this.uid = event.target.dataset.uid;
            this.openEditModal();
        });

        $('.edit-modal .save-btn').on('click.edit-modal-save', () => {
            this.save();
        });

        this.editModalElement = $('.edit-modal');
        this.editModalElement.on('shown.bs.modal', () => {
            $.ajax({
                url: '/entity/modal/edit/' + this.type + '/' + this.uid
            }).done((response) => {
                $('.edit-modal .modal-body .editor-container').html(response.html);
            })
        });
    }

    openEditModal() {
        this.editModal = new bootstrap.Modal('.edit-modal', {});
        this.editModal.show();
    }

    save() {
        $.ajax({
            method: 'POST',
            url: '/' + this.type + '/save/' + this.uid,
            data: new FormData(document.querySelector('.edit-form')),
            processData: false,
            contentType: false
        })
            .fail((response) => {
                $('.edit-error-container').html(Object.entries(response.responseJSON.errors).map(error => error[1]).join('<br/>')).removeClass('d-none');
            })
            .done(() => {
                location.reload();
            })
    }
}

new EditModal();
