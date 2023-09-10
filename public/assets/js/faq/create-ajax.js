const mainFormEl = $(".kpaw_main_form");
var formData = new FormData(mainFormEl[0]);

$(".submit-button").on("click", function (e) {
    e.preventDefault();
    submitForm($(this));
});

function submitForm(button) {
    const submitButton = button;
    const buttonText = submitButton.html();
    const redirect = mainFormEl.attr("data-redirect");

    if (formData.has("photo")) {
        const photoData = formData.get("photo");
        formData = new FormData(mainFormEl[0]);
        formData.append("photo", photoData);
    } else if (formData.has("empty_photo")) {
        const emptyPhotoData = formData.get("empty_photo");
        formData = new FormData(mainFormEl[0]);
        formData.append("empty_photo", emptyPhotoData);
    } else {
        formData = new FormData(mainFormEl[0]);
    }

    submitButton.prop("disabled", true);
    submitButton.html(
        `<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Memproses`
    );
    $.ajax({
        url: mainFormEl.attr("action"),
        type: mainFormEl.attr("method"),
        data: formData,
        contentType: false,
        processData: false,
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

            if (typeof res.redirect_url !== typeof undefined && res.redirect_url !== false) {
                setTimeout(function () {
                    window.location = res.redirect_url;
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

$("#draft").on("click", function () {
    if (this.checked) {
        $("#draft").each(function () {
            $("#save").text("Simpan Dan Preview");
            $("#preview").val(1);
        });
    }
});

$("#publish").on("click", function () {
    if (this.checked) {
        $("#publish").each(function () {
            $("#save").text("Simpan Dan Publish");
            $("#preview").val(0);
        });
    }
});


