function initDefaultSummernote() {
    $(".summernote").summernote({
        height: 350,
        toolbar: [
            ["font", ["bold", "underline"]],
            ["color", ["color"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["insert", ["link", "picture"]],
            ["view", ["fullscreen", "codeview", "help"]],
        ],
        spellCheck: false,
        lang: "id-ID",
    });
}

$(function () {
    initDefaultSummernote();
});