class Dates
{
    constructor() {
        this.init();
    }

    init() {
        const dateFormat = 'yy.mm.dd';

        // Define common datepicker options
        const datepickerOptions = {
            dateFormat: dateFormat,
            changeMonth: true,
            monthNamesShort: ['Jan', 'Febr', 'Márc', 'Ápr', 'Máj', 'Jún', 'Júl', 'Aug', 'Szept', 'Okt', 'Nov', 'Dec']
        };

        // Apply the options to the 'actDate' input
        $('input[name="actDate"]').datepicker(datepickerOptions);

        // Reuse the same options for the other two inputs and add specific settings
        const from = $('input[name="startDate"]')
            .datepicker($.extend({}, datepickerOptions, {
                defaultDate: '+1w'
            }))
            .on('change', (event) => {
                const selectedDate = this.getDate(event.target);
                to.datepicker('option', 'minDate', selectedDate);
            });

        const to = $('input[name="endDate"]')
            .datepicker($.extend({}, datepickerOptions, {
                defaultDate: '+1w'
            }))
            .on('change', (event) => {
                const selectedDate = this.getDate(event.target);
                from.datepicker('option', 'maxDate', selectedDate);
            });
    }

    getDate(element) {
        let date;
        try {
            date = $.datepicker.parseDate('yy.mm.dd', element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }
}

new Dates();
