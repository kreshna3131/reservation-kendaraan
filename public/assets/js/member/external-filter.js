//datatable regency filter
$("#regency-filter").on("change", function () {
    orderDatatable.columns(2).search($(this).val()).draw();
})

//datatable membership filter
$("#membership-filter").on("change", function () {
    orderDatatable.columns(3).search($(this).val()).draw();
})

//datatable search
$("#search-member").on("keyup", function () {
    const input = $("#DataTables_Table_0_filter").find("input");
    input.val($(this).val());
    input.trigger("keyup");
});