$(document).on("click", ".open-edit-modal", function(e) {
    $.ajax($(this).data("url"))
        .then(res => {
            $("#edit-error-page-modal").modal("show");
            $("#edit-error-page-modal").on("shown.bs.modal", function(e) {
                $(this)
                    .find("#edit-content")
                    .replaceWith($(res).find("#edit-content"));
            });
        })
        .catch(res => {
            new PNotify({
                title: "Gagal",
                text: res?.responseJSON?.message,
                icon: false,
                width: "340px",
                type: "error",
                animate_speed: "fast"
            });
            if (res.responseJSON?.status === "session_expired") {
                setTimeout(function() {
                    window.location.reload();
                }, 1000);
            }
        });
});

$(document).on("change", "[name='logo_path']", function(e) {
    previewImage(this);
});

function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $(input)
                .prev(".error-image-preview")
                .attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).on("click", "#reset-error-title", function() {
    const el = $(this);
    el.closest(".row")
        .find("[name='title']")
        .val(el.data("default-value"));
});

$(document).on("click", "#reset-error-desc", function() {
    const el = $(this);
    el.closest(".row")
        .find("[name='desc']")
        .val(el.data("default-value"));
});
