import './bootstrap';

import * as bootstrap from 'bootstrap';
import 'jszip';
import 'pdfmake';
import 'datatables.net-bs5';
import "datatables.net-buttons-bs5";
import 'datatables.net-plugins/i18n/hu.js';

import language from 'datatables.net-plugins/i18n/hu.json';
import 'jquery-ui/dist/jquery-ui';

import './dates';
import './mergemodal';
import './splitmodal';
import './borderdatemodal';
import './deletemodal';
import './edit';

window.bootstrap = bootstrap;

$.extend($.fn.dataTable.defaults, {
    language: language,
    /*dom: 'Bftip',
    buttons: [
        'copy', 'excel', 'pdf'
    ]*/
});

