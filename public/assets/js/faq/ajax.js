$(".kpaw_main_form button:submit").on("click", function (e) {
    e.preventDefault();
    submitForm($(this), $(".kpaw_header--submit"));
});

$(".kpaw_header--submit").on("click", function (e) {
    e.preventDefault();
    submitForm($(this), $(".kpaw_main_form button:submit"));
});

function submitForm(button, secondaryButton) {
    const form = $(".kpaw_main_form");
    const submitButton = button;
    const secondarySubmitButton = secondaryButton;
    const buttonText = submitButton.html();
    const redirect = form.attr('data-redirect');
    submitButton.prop("disabled", true);
    submitButton.html(
        `<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Memproses`
    );
    secondarySubmitButton.prop("disabled", true);
    secondarySubmitButton.html(
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
        setTimeout(function () {
            window.location.reload();
        }, 1000);
    })
    .fail(function (res) {
        let errorList = "";
        if (typeof(res.responseJSON?.errors) === 'object') {
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
        secondarySubmitButton.prop("disabled", false);
        secondarySubmitButton.html(buttonText);
        if (res.responseJSON?.status === "session_expired") {
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        }
    });
}
