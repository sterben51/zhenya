$(document).ready(function() {
        $('.button--excel').attr('disabled', false);
        var excel_data = $('#report_table').html(); 
        $('#xls_data').val(excel_data);
    });
    