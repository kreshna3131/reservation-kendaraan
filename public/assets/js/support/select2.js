$(function () {
    $("select").select2({
        theme: "bootstrap",
        tags: true,
        minimumResultsForSearch: -1,
    });

    $("select").on("select2:open", function () {
        // get values of selected option
        var values = $(this).val();
        // get the pop up selection
        var pop_up_selection = $(".select2-results__options");

        if (values != null) {
            // hide the selected values
            pop_up_selection.find("li[aria-selected=true]").hide();
            console.log(pop_up_selection.find("li[aria-selected=true]"));
        } else {
            // show all the selection values
            pop_up_selection.find("li[aria-selected=true]").show();
        }
    });
});
