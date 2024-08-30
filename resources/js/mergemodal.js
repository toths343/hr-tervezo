class MergeModal
{
    constructor() {
        this.init();
    }

    init() {
        $('.btn-merge-modal-open').on('click.merge-modal-open', () => {
            this.openMergeModal();
        });

        const mergeModalElement = $('.merge-modal');
        mergeModalElement.on('shown.bs.modal', (event) => {
            $.ajax({
                url: '/entity/modal/merge/' + event.target.dataset.type + '/' + event.target.dataset.id
            }).done((response) => {
                $('.merge-modal .modal-body').html(response.html);
            })
        });
    }

    openMergeModal() {
        const mergeModal = new bootstrap.Modal('.merge-modal', {});
        mergeModal.show();
    }
}

new MergeModal();
