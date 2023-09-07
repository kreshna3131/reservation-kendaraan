$("[name=sql_file]").on("change", function () {
    const file = this.files[0];
    const fileSize = file.size / 1024 / 1024;
    const invalid = $(this).attr("name");
    const maxFileSize = 4;

    if (fileSize > maxFileSize) {
        $(this).val("");
        $(this).addClass("is-invalid");
        $(`[data-name=${invalid}]`).html(
            `File maksimal berukuran ${maxFileSize} MB.`
        );
    } else {
        $(this).removeClass("is-invalid");
        $(`[data-name=${invalid}]`).html(
            `File maksimal berukuran ${maxFileSize} MB.`
        );
    }
});
