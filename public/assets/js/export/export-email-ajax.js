function exportPersonalEmail(event, buttonSubmit, url) {
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
            start_date: $('#kpaw_daterange_personal input[name="start"]').val(),
            end_date: $('#kpaw_daterange_personal input[name="end"]').val(),
            team: $(".kpaw_team_personal").val(),
        },
        beforeSend: function () {
            if (
                !$('#kpaw_daterange_personal input[name="start"]').val() &&
                !$('#kpaw_daterange_personal input[name="end"]').val() &&
                !$(".kpaw_team_personal").val()
            ) {
                new PNotify({
                    title: "Gagal",
                    text: "Periode dan Team wajib diisi.",
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
                text: res?.message,
                addclass: "icon-nb",
                width: "340px",
                icon: false,
                type: "success",
                animate_speed: "fast",
            });

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
