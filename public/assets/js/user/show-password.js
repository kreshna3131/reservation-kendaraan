$(".kpaw_show_password").on("click", function () {
    if ($(".password").attr("type") === "password") {
        return $(".password").attr("type", "text");
    }

    return $(".password").attr("type", "password");
});
