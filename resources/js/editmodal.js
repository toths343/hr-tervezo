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
            this.uid = event.target.dataset.uid || 0;
            $('.edit-modal .modal-body .error-container').addClass('d-none');
            $('.edit-modal .modal-body .loader-container').removeClass('d-none');
            $('.edit-modal .modal-body .editor-container').addClass('d-none');
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
                $('.edit-modal .modal-body .editor-container').html(response.html).removeClass('d-none');
                $('.edit-modal .modal-body .loader-container').addClass('d-none');
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
            contentType: false,
            beforeSend(jqXHR, settings) {
                $('.is-invalid').removeClass('is-invalid');
                $('.invalid-feedback').remove();
            }
        })
            .fail((response) => {
                for (const [key, value] of Object.entries(response.responseJSON.errors)) {
                    this.editModalElement.find('input[name=' + key + ']').after('<div class="invalid-feedback">' + value + '</div>').addClass('is-invalid');
                }
                $('input:not(.is-invalid), select:not(.is-invalid), textarea:not(.is-invalid)').addClass('is-valid')
            })
            .done(() => {
                location.reload();
            });
    }
}

new EditModal();
