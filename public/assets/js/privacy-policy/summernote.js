function initPrivacySummernote() {
    $(".summernote").summernote({
        height: 320,
        toolbar: [
            ["style", ["style"]],
            ["font", ["bold", "underline", "clear"]],
            ["para", ["ul", "ol", "paragraph"]],
            ["insert", ["link", "picture"]],
            ["view", ["fullscreen", "codeview", "help"]]
        ],
        spellCheck: false,
        lang: "id-ID"
    });
}

$(function() {
    initPrivacySummernote();
});