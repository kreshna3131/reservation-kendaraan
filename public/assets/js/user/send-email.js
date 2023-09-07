$("#kpaw_btn_send_email").on("click", function (e) {
    const submitButton = $(this);
    const buttonText = submitButton.html();
    const redirect = $(this).attr("data-redirect");
    e.preventDefault();
    submitButton.prop("disabled", true);
    submitButton.html(
        `<span class="spinner-border spinner-border-sm p-2" role="status" aria-hidden="true"></span>`
    );
    $.ajax({
        url: submitButton.data("url"),
        type: "POST",
        data: {
            _token: $("meta[name='csrf-token']").attr("content"),
            email: $("[name='email']").val(),
        },
    })
        .done(function (res) {
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
            window.location.reload();
        });
});
