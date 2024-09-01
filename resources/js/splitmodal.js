class SplitModal
{
    splitModalElement;
    splitModal;
    type;
    uid;

    constructor() {
        this.init();
    }

    init() {
        $('.btn-split-modal-open').on('click.split-modal-open', (event) => {
            this.type = event.target.dataset.type;
            this.uid = event.target.dataset.uid;
            this.openSplitModal();
        });

        $('.split-modal .save-btn').on('click.split-modal-save', (event) => {
            this.save();
        });

        this.splitModalElement = $('.split-modal');
        this.splitModalElement.on('shown.bs.modal', () => {
            $.ajax({
                url: '/entity/modal/split/' + this.type + '/' + this.uid
            }).done((response) => {
                $('.split-modal .modal-body').html(response.html);

                this.splitModalElement.find('.datepicker').datepicker({
                    dateFormat: 'yy.mm.dd'
                });
            })
        });
    }

    openSplitModal() {
        this.splitModal = new bootstrap.Modal('.split-modal', {});
        this.splitModal.show();
    }

    save() {
        $.ajax({
            method: 'POST',
            url: '/entity/save/split/' + this.type + '/' + this.uid,
            data: new FormData(document.querySelector('.split-form')),
            processData: false,
            contentType: false
        })
        .fail((response) => {
            $('.split-error-container').html(Object.entries(response.responseJSON.errors).map(error => error[1]).join('<br/>')).toggleClass('d-none');
        })
        .done(() => {
            location.reload();
        })
    }
}

new SplitModal();
