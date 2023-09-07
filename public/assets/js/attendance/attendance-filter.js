$("#date_filter").on("change", function (e) {
    orderDatatable.draw();
});

//datatable search
$("#search-attendance").on("keyup", function () {
    const input = $("#DataTables_Table_0_filter").find("input");
    input.val($(this).val());
    input.trigger("keyup");
});