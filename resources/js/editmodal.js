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
            contentType: false
        })
            .fail((response) => {
                $('.edit-modal .modal-body .error-container').html(Object.entries(response.responseJSON.errors).map(error => error[1]).join('<br/>')).removeClass('d-none');
            })
            .done((response) => {
                if (response.entityDisplay) {
                    var entityDisplayContainer = $('[data-entity-display="' + this.type + '"][data-uid="' + this.uid + '"]');
                    if (entityDisplayContainer.length) {
                        entityDisplayContainer.html(response.entityDisplay);
                    }
                    var entityUniqueNameContainer = $('[data-entity-unique-name="' + this.type + '"][data-uid="' + this.uid + '"]');
                    if (entityUniqueNameContainer.length) {
                        entityUniqueNameContainer.html(response.entityUniqueName);
                    }
                    var entityIntervalContainer = $('[data-entity-interval="' + this.type + '"][data-uid="' + this.uid + '"]');
                    if (entityIntervalContainer.length) {
                        entityIntervalContainer.html(response.entityInterval);
                    }

                    this.editModal.hide();
                } else {
                    location.reload();
                }
            });
    }
}

new EditModal();
