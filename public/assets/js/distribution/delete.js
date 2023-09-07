$(document).on("click", "#kpaw_distribution_delete", function (event) {
    $("#kpaw_distribution_edit").modal("hide");
    const url = $(this).data("url");

    $.ajax(url)
        .then(function (res) {
            $("#kpaw_modal_delete_confirmation").modal("show");

            $("#kpaw_modal_delete_confirmation")
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
