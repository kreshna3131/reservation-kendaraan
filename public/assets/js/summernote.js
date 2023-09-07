function initDefaultSummernote() {
    $(".summernote").summernote({
        height: 130,
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "underline", "clear"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["table", ["table"]],
            ["insert", ["link"]],
            ["view", ["fullscreen", "codeview", "help"]]
        ],
        spellCheck: false,
        lang: "id-ID"
    });
}

$(function() {
    initDefaultSummernote();
});