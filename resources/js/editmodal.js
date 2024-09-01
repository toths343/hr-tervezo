class EditModal {
    editModalElement;
    editModal;
    type;
    id;
    uid;
    newHatkezd;
    newHatvege

    constructor() {
        this.init();
    }

    init() {
        this.editModalElement = $('.edit-modal');
        this.editModalElement.on('shown.bs.modal', () => {
            $.ajax({
                url: '/entity/modal/edit/' + this.type + '/' + this.uid
            }).done((response) => {
                $('.edit-modal .modal-body .editor-container').html(response.html).removeClass('d-none');
                $('.edit-modal .modal-body .loader-container').addClass('d-none');
            }).always(() => {
                if (!this.uid) {
                    this.editModalElement.find('input.id').val(this.id);
                    this.editModalElement.find('input.hatkezd').val(this.newHatkezd);
                    this.editModalElement.find('input.hatvege').val(this.newHatvege);
                }
            })
        });

        $('.btn-edit-modal-open').on('click.edit-modal-open', (event) => {
            this.type = event.target.dataset.type;
            this.id = event.target.dataset.id || '';
            this.uid = event.target.dataset.uid || 0;
            this.newHatkezd = event.target.dataset.hatkezd || '';
            this.newHatvege = event.target.dataset.hatvege || '';
            $('.edit-modal .modal-body .error-container').addClass('d-none');
            $('.edit-modal .modal-body .loader-container').removeClass('d-none');
            $('.edit-modal .modal-body .editor-container').addClass('d-none');
            this.editModalElement.find('.title-edit, .title-new').addClass('d-none');

            if (this.uid) {
                this.editModalElement.find('.title-edit').removeClass('d-none');
            } else {
                this.editModalElement.find('.title-new').removeClass('d-none');
            }

            this.openEditModal();
        });

        $('.edit-modal .save-btn').on('click.edit-modal-save', () => {
            this.save();
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
                    this.editModalElement.find('input[name=' + key + '],select[name=' + key + ']').after('<div class="invalid-feedback">' + value + '</div>').addClass('is-invalid');
                }
                $('input:not(.is-invalid), select:not(.is-invalid), textarea:not(.is-invalid)').addClass('is-valid')
                $(".edit-modal").animate({scrollTop: $('.is-invalid:first').offset().top + window.innerHeight}, 200);
            })
            .done(() => {
                location.reload();
            });
    }
}

new EditModal();
