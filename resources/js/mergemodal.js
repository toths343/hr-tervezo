class MergeModal
{
    mergeModalElement;
    mergeModal;

    constructor() {
        this.init();
    }

    init() {
        $('.btn-merge-modal-open').on('click.merge-modal-open', () => {
            this.openMergeModal();
        });

        $('.merge-modal .save-btn').on('click.merge-modal-save', (event) => {
            this.save(event);
        });

        this.mergeModalElement = $('.merge-modal');
        this.mergeModalElement.on('shown.bs.modal', (event) => {
            $.ajax({
                url: '/entity/modal/merge/' + event.target.dataset.type + '/' + event.target.dataset.id
            }).done((response) => {
                $('.merge-modal .modal-body').html(response.html);
            })
        });
    }

    openMergeModal() {
        this.mergeModal = new bootstrap.Modal('.merge-modal', {});
        this.mergeModal.show();
    }

    save(event) {
        $.ajax({
            method: 'POST',
            url: '/entity/save/merge/' + event.target.dataset.type + '/' + event.target.dataset.id,
            data: new FormData(document.querySelector('.merge-form')),
            processData: false,
            contentType: false
        })
        .fail((response) => {
            $('.merge-error-container').html(Object.entries(response.responseJSON.errors).map(error => error[1]).join('<br/>')).toggleClass('d-none');
        })
        .done(() => {
            location.reload();
        })
    }
}

new MergeModal();
