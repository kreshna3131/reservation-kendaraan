$(".kpaw_input--daterange")
    .datepicker({
        format: "dd/mm/yyyy",
        language: "id",
        autoclose: true,
        todayHighlight: true,
    })
    .on("changeDate", function (data) {
        var date = $("[name='start']").val();
        var datearray = date.split("/");
        var newdate = datearray[1] + "/" + datearray[0] + "/" + datearray[2];

        var startDate = new Date(newdate);
        startDate.setDate(startDate.getDate() + 31);
        console.log(startDate);

        $(".kpaw_input--daterange [name='end']").datepicker(
            "setEndDate",
            startDate
        );
    });

$(".kpaw_input--daterange [name='start']").on("change", function () {
    $start = $("[name='start']").val();
    $end = $("[name='end']").val();

    sendAjaxAttendance($start, $end);
});

$(".kpaw_input--daterange [name='end']").on("change", function () {
    $start = $("[name='start']").val();
    $end = $("[name='end']").val();

    sendAjaxAttendance($start, $end);
});

function sendAjaxAttendance(start = null, end = null) {
    console.log("jalan");
    let url = "dashboard/attendance";

    if (start && end) {
        url = "dashboard/attendance?since=" + start + "&until=" + end;
    }

    $.ajax(url).done(function (data) {
        attendanceChart.updateSeries([
            {
                name: "Masuk",
                data: data.attend,
            },
            {
                name: "Izin",
                data: data.permission,
            },
            {
                name: "Alfa",
                data: data.alpha,
            },
        ]);
        attendanceChart.updateOptions({
            xaxis: {
                categories: data.days,
            },
        });
    });
}

sendAjaxAttendance();
