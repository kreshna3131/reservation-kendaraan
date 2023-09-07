$(".kpaw_main_form button:submit").on("click", function (e) {
    e.preventDefault();
    submitForm($(this));
});

$(".kpaw_header--submit").on("click", function (e) {
    e.preventDefault();
    submitForm($(this));
});

function submitForm(button) {
    const form = $(".kpaw_main_form");
    const submitButton = button;
    const buttonText = submitButton.html();
    const redirect = form.attr("data-redirect");
    submitButton.prop("disabled", true);
    submitButton.html(
        `<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Memproses`
    );

    $(".summernote").each(function () {
        var summernote = $(this);
        if (summernote.summernote("isEmpty")) {
            summernote.val("");
        } else if (summernote.val() == "<p><br></p>") {
            summernote.val("");
        }
    });

    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: form.serialize(),
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
            if (typeof redirect !== typeof undefined && redirect !== false) {
                setTimeout(function () {
                    window.location = redirect;
                }, 1000);
            } else {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            }
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
