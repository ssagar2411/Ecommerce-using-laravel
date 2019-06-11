$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip(); 
    $('#datatables').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
            [5, 10, 15, -1],
            [5, 10, 15, "All"]
        ],
        responsive: true,
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records",
        }
    });
    var table = $('#datatables').DataTable();
    //Like record
    table.on('click', '.like', function() {
        alert('You clicked on Like button');
    });

    $('.card .material-datatables label').addClass('form-group');
});