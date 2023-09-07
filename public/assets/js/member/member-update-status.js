function setActiveAjax(isBlocked, url, blockedAt) {
    $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: "PATCH",
                is_active: isBlocked,
                blocked_at: blockedAt
            }
        })
        .done(function (res) {
            new PNotify({
                title: "Berhasil",
                text: res?.message,
                addclass: "icon-nb",
                width: "340px",
                icon: true,
                type: "success",
                animate_speed: "fast",
            });
            if (typeof redirect !== typeof undefined && redirect !== false) {
                setTimeout(function () {
                    window.location = redirect;
                }, 1000);
            } else {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            }
        })
        .fail(function (res) {
            submitButton.prop("disabled", false);
            submitButton.html(buttonText);
            new PNotify({
                title: "Gagal",
                text: "Gagal diperbarui.",
                addclass: "icon-nb",
                width: "340px",
                icon: true,
                type: "danger",
                animate_speed: "fast",
            });
            if (res.responseJSON ?.status === "session_expired") {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            }
        });
}

function setInactiveAjax(isBlocked, url, blockedAt) {
    $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                _method: "PATCH",
                is_active: isBlocked,
                blocked_at: blockedAt
            }
        })
        .done(function (res) {
            new PNotify({
                title: "Berhasil",
                text: res?.message,
                addclass: "icon-nb",
                width: "340px",
                icon: true,
                type: "success",
                animate_speed: "fast",
            });
            if (typeof redirect !== typeof undefined && redirect !== false) {
                setTimeout(function () {
                    window.location = redirect;
                }, 1000);
            } else {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            }
        })
        .fail(function (res) {
            submitButton.prop("disabled", false);
            submitButton.html(buttonText);
            new PNotify({
                title: "Gagal",
                text: "Gagal diperbarui.",
                addclass: "icon-nb",
                width: "340px",
                icon: true,
                type: "danger",
                animate_speed: "fast",
            });
            if (res.responseJSON ?.status === "session_expired") {
                setTimeout(function () {
                    window.location.reload();
                }, 1000);
            }
        });
}

try {
    $(document).on("click", ".isActive", function () {
        const value = $(this).data("is-blocked");
        const url = $(this).data("url");
        const blockedAt = $(this).data("blocked-at");

        setActiveAjax(value, url, blockedAt);
    });
} catch (err) {
    console.log(err.message);
}

try {
    $(document).on("click", ".isInactive", function () {
        const value = $(this).data("is-blocked");
        const url = $(this).data("url");
        const blockedAt = $(this).data("blocked-at");

        setInactiveAjax(value, url, blockedAt);
    })
} catch (err) {
    console.log(err.message);
}
