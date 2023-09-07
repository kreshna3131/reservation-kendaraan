function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".kpaw_input_photo").css(
                "background-image",
                "url(" + e.target.result + ")"
            );
            $(".kpaw_input_photo").hide();
            $(".kpaw_input_photo").fadeIn(650);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#photo").on("change", function () {
    readURL(this);
});

function deleteImage() {
    $(".kpaw_input_photo").css("background-color", "var(--primary)");
    $(".kpaw_input_photo").css("background-image", "");
    $(".kpaw_input_photo").hide();
    $(".kpaw_input_photo").fadeIn(650);
}

const imageUrlPhoto = $(".kpaw_input_photo").data("image");
if (imageUrlPhoto != "/storage/") {
    $(".kpaw_input_photo").css("background-image", `url(${imageUrlPhoto})`);
}
