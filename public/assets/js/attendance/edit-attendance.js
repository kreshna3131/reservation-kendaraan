function editData(event, id, url) {
    event.preventDefault();
    $("#edit-modal .modal-content").append(
        `<div class="kpaw_modal_loading text-center p-2">
            <div class="spinner-border text-primary" role="status">
                <span class="sr-only">Loading...</span>
            </div>
            <p class="text-muted">Mohon menunggu sistem sedang memproses.</p>
        </div>`
    );
    $("#edit-modal").modal("show");
    $(
        "#edit-modal .modal-header, #edit-modal .modal-body, #edit-modal .modal-footer"
    ).addClass("d-none");
    $.ajax({
        url: url,
        method: "GET",
    })
        .done(function (res) {
            $("#edit-modal .modal-content").replaceWith(
                $(res).find(".modal-content")
            );
            $(
                "#edit-modal .modal-header, #edit-modal .modal-body, #edit-modal .modal-footer"
            ).removeClass("d-none");
            $(".kpaw_modal_loading").remove();
        })
        .fail(function () {
            console.log("gagal");
        });
}
