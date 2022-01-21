$(function () {
    "use strict";

    $(document).ready(function () {
        var table = $('#example2').DataTable({
            lengthChange: true,
            buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
        });

        table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });


});