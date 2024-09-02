class Edit {
    editForm;
    type;
    id;
    uid;
    newHatkezd;
    newHatvege

    constructor() {
        this.init();
    }

    init() {
        this.editForm = $('.edit-form');
        this.type = this.editForm.data('type');
        this.id = this.editForm.data('id') || '';
        this.uid = this.editForm.data('uid') || 0;
        this.newHatkezd = this.editForm.data('hatkezd') || '';
        this.newHatvege = this.editForm.data('hatvege') || '';

        if (!this.uid) {
            this.editForm.find('input.id').val(this.id);
            this.editForm.find('input.hatkezd').val(this.newHatkezd);
            this.editForm.find('input.hatvege').val(this.newHatvege);
        }

        this.editForm.find('.save-btn').on('click.edit-save', () => {
            this.save();
        });
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
                    this.editForm.find('input[name=' + key + '],select[name=' + key + ']').after('<div class="invalid-feedback">' + value + '</div>').addClass('is-invalid');
                }
                $('input:not(.is-invalid), select:not(.is-invalid), textarea:not(.is-invalid)').addClass('is-valid')
                this.editForm.animate({scrollTop: $('.is-invalid:first').offset().top + window.innerHeight}, 200);
            })
            .done((response) => {
                location.href = '/entity/' + this.type + '/' + response.id;
            });
    }
}

new Edit();
