class Dates
{
    constructor() {
        this.init();
    }

    init() {
        const dateFormat = 'yy.mm.dd';

        $('input[name="actDate"]').datepicker({
            dateFormat: dateFormat
        });

        const from = $('input[name="startDate"]')
            .datepicker({
                defaultDate: '+1w',
                changeMonth: true,
                dateFormat: dateFormat
            })
            .on('change', function () {
                to.datepicker('option', 'minDate', getDate(this));
            });

        const to = $('input[name="endDate"]')
            .datepicker({
                defaultDate: '+1w',
                changeMonth: true,
                dateFormat: dateFormat
            })
            .on("change", function () {
                from.datepicker('option', 'maxDate', getDate(this));
            });
    }

    getDate(element) {
        let date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }
}

new Dates();
