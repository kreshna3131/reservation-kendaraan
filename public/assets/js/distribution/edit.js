$(document).on("click", ".kpaw_edit_button", function (e) {
    e.preventDefault();
    const url = $(this).attr("href");

    $.ajax(url)
        .done(function (res) {
            $("#kpaw_distribution_edit").modal("show");

            $("#kpaw_distribution_edit")
                .find(".modal-dialog")
                .replaceWith($(res).find(".modal-dialog"));
        })
        .catch((res) => {
            new PNotify({
                title: "Gagal",
                text: res?.responseJSON?.message,
                icon: false,
                width: "340px",
                type: "error",
                animate_speed: "fast",
            });
            if (res.responseJSON?.status === "session_expired") {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            }
        });
});
