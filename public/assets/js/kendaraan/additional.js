var cropper = null;

function initCropper(blobUrl) {
    setTimeout(() => {
        $("#cropper-photo").attr("src", blobUrl).css("display", "block");

        const image = document.getElementById("cropper-photo");
        cropper = new Cropper(image, {
            aspectRatio: 1 / 1,
        });
    }, 500);
}

$(document).on("change", "input[name='photo']", function (e) {
    const blob = e.target.files[0];
    const blobUrl = URL.createObjectURL(blob);

    const cropperModalEl = $("#cropper-modal");
    cropperModalEl.modal("show");

    cropperModalEl.on("shown.bs.modal", function () {
        initCropper(blobUrl);
    });

    cropperModalEl.on("hidden.bs.modal", function () {
        $("#cropper-photo").attr("src", "").css("display", "none");
        $("#photo").val("");
        if (cropper) {
            cropper.destroy();
        }
    });

    $("#cropper-save").on("click", function () {
        const saveButton = this;
        const buttonText = this.innerHTML;
        saveButton.innerHTML = `<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span> Memproses`;
        saveButton.setAttribute("disabled", true);

        cropper.getCroppedCanvas().toBlob((blob) => {
            new Compressor(blob, {
                quality: 0.5,
                width: 600,
                height: 600,
                success(result) {
                    const resultUrl = URL.createObjectURL(result);
                    $(".kpaw_input_photo").css(
                        "background-image",
                        `url(${resultUrl})`
                    );
                    $(".kpaw_profile_photo").css("display", "none");
                    if (formData.has("photo")) {
                        formData.delete("photo");
                    }
                    formData.append("photo", result);
                    cropperModalEl.modal("hide");
                    saveButton.removeAttribute("disabled");
                    saveButton.innerHTML = buttonText;
                },
            });
        });
    });
});

function deleteImage() {
    $(".kpaw_input_photo").css("background-color", "#FAF9FB");
    $(".kpaw_input_photo").css("background-image", "");
    $(".kpaw_profile_photo").css("display", "block");
    $(".kpaw_input_photo").hide();
    $(".kpaw_input_photo").fadeIn(650);

    if (formData.has("photo")) {
        formData.delete("photo");
    }

    if (formData.has("empty_photo")) {
        formData.delete("empty_photo");
    }

    formData.append("empty_photo", true);
}

$(".button-delete").on("click", function () {
    if ($(".kpaw_profile_photo").css("display") === "none") {
        deleteImage();
    }
});

const imageUrlPhoto = $(".kpaw_input_photo").data("image");
if (imageUrlPhoto && imageUrlPhoto !== "/storage/") {
    $(".kpaw_input_photo").css("background-image", `url(${imageUrlPhoto})`);
}
