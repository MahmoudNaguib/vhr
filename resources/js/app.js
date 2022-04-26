$(function () {
    'use strict';
    function confirmation() {
        $('a[data-confirm]').on('click', function () {
            var href = $(this).attr('href');
            var title = $(this).data("title");
            if (!$('#dataConfirmModal').length) {
                $('body').append('  <div class="modal fade" id="dataConfirmModal" tabindex="-1" role="document">\n\
						   <div class="modal-dialog modal-sm" role="document">\n\
						    <div class="modal-content bd-0">\n\
						      <div class="modal-body tx-center pd-y-20 pd-x-20">\n\
						        Hi I am a Modal Example for Dashio Admin Panel.\n\
						      </div>\n\
						      <div class="modal-footer justify-content-center">\n\
						        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>\n\
						        <a class="btn btn-success" id="dataConfirmOK">Yes</a>\n\
						      </div>\n\
						    </div>\n\
						  </div>\n\
						</div> ');
            }
            $('#dataConfirmModal').find('.modal-body').html('<button type="button" class="close closeBtn" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>' + $(this).attr('data-confirm'));
            $('#dataConfirmOK').attr('href', href);
            $('#dataConfirmModal').modal({show: true});
            return false;
        });
    }
    confirmation();
    $('form').submit(function () {
        $(this).find("button").prop('disabled', true);
    });
    $('.select2').select2({
        placeholder: "Select",
    });
   /* $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: 'c-90:c+10',
    });
*/

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
