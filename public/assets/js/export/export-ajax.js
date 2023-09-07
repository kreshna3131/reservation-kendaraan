function exportGlobal(event, buttonSubmit, url) {
    const submitButton = $(buttonSubmit);
    const buttonText = submitButton.html();
    const redirect = $(this).attr("data-redirect");
    event.preventDefault();
    submitButton.prop("disabled", true);
    submitButton.html(
        `<span class="spinner-border mr-2" role="status" aria-hidden="true"></span> Memproses`
    );
    $.ajax({
        url: url,
        type: "get",
        data: {
            start_date: $('#kpaw_daterange_global input[name="start"]').val(),
            end_date: $('#kpaw_daterange_global input[name="end"]').val(),
            department: $(".kpaw_department_global").val(),
            status_team: $(".kpaw_status_team_global").val(),
        },
        beforeSend: function () {
            if (
                !$('#kpaw_daterange_global input[name="start"]').val() &&
                !$('#kpaw_daterange_global input[name="end"]').val()
            ) {
                new PNotify({
                    title: "Gagal",
                    text: "Periode wajib diisi.",
                    addclass: "icon-nb",
                    width: "340px",
                    icon: false,
                    type: "error",
                    animate_speed: "fast",
                });
                submitButton.prop("disabled", false);
                submitButton.html(buttonText);
                xhr.abort();
            }
        },
    })
        .done(function (res) {
            new PNotify({
                title: "Berhasil",
                text: "Laporan berhasil diexport.",
                addclass: "icon-nb",
                width: "340px",
                icon: false,
                type: "success",
                animate_speed: "fast",
            });

            var a = document.createElement("a");
            a.href = res.file;
            a.download = res.name + ".xlsx";
            document.body.appendChild(a);
            a.click();
            a.remove();

            submitButton.prop("disabled", false);
            submitButton.html(buttonText);
        })
        .fail(function (res) {
            let errorList = "";
            if (typeof res.responseJSON?.errors === "object") {
                $.each(res.responseJSON?.errors, function (key, value) {
                    if (value.length > 1) {
                        $.each(value, function (key, value) {
                            errorList += value + "<br/>";
                        });
                    } else {
                        errorList += value + "<br/>";
                    }
                });
            } else {
                errorList += res.responseJSON?.message;
            }
            new PNotify({
                title: "Gagal",
                text: errorList,
                icon: false,
                width: "340px",
                type: "error",
                animate_speed: "fast",
            });
            submitButton.prop("disabled", false);
            submitButton.html(buttonText);
            if (res.responseJSON?.status === "session_expired") {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            }
        });
}
