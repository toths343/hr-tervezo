import './bootstrap';

import 'bootstrap';

import 'jszip';
import 'pdfmake';
import 'datatables.net-bs5';
import "datatables.net-buttons-bs5";
import 'datatables.net-plugins/i18n/hu.js';

import language from 'datatables.net-plugins/i18n/hu.json';
$.extend($.fn.dataTable.defaults, {
    language: language,
    /*dom: 'Bftip',
    buttons: [
        'copy', 'excel', 'pdf'
    ]*/
});

import 'jquery-ui/dist/jquery-ui';



