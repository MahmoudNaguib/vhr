$(function () {
    'use strict';

    $('form').submit(function () {
        $(this).find("button").prop('disabled', true);
    });
    $('.select2').select2({
        placeholder: "Select",
    });
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: 'c-90:c+10',
    });
    // Datatable
    /*var table = $('.dataTable').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
        },
        "order": [[0, 'desc']]
    });
    table.on('draw', function () {
        confirmation();
    });
    $('.dataTables_length select').select2({minimumResultsForSearch: Infinity});*/
    // Select2


    /*
        $('.editor').trumbowyg({
            svgPath: 'svg/icons.svg',
            btns: [
                // ['viewHTML'],
                ['formatting'],
                ['strong', 'em', 'del'],
                ['superscript', 'subscript'],
                ['link'],
                ['removeformat'],
                ['insertImage'],
                ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                ['unorderedList', 'orderedList'],
                ['fullscreen']
                // ['horizontalRule'],
            ]
        });
    */
    /*
        $('.timepicker').timepicker({'disableTextInput': true, 'scrollDefault': 'now', 'step': 15, 'timeFormat': 'h:i A'});
    */

    /*$('.tags').tagsinput();*/
});
