$(".submit-order").on("click", function (e) {
    console.log('jalan');
    const buttonText = $(this).html();
    const redirect = $(this).attr('data-redirect');
    const id = $(this).attr('data-id');
    const url = $(this).attr('data-url');
    const value = document.getElementById('submit-order' + id).value 
    e.preventDefault();
    $(this).prop("disabled", true);
    $(this).html(
        `<span class="spinner-border mr-2" role="status" aria-hidden="true"></span>`
    );
    $.ajax({
        url: url,
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            order: value
        },
    })
    .done(function (res) {
        new PNotify({
            title: "Berhasil",
            text: res?.message,
            addclass: "icon-nb",
            width: "340px",
            icon: false,
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
        let errorList = "";
        if (typeof(res.responseJSON?.errors) === 'object') {
            $.each(res.responseJSON?.errors, function (key, value) {
                if (value.length > 1) {
                    $.each(value, function (key, value) {
                        errorList += value + "<br/>";
                    });
                } else {
                    errorList += value + "<br/>";
                }
            });
        } else {
            errorList += res.responseJSON?.message;
        }
        new PNotify({
            title: "Gagal",
            text: errorList,
            icon: false,
            width: "340px",
            type: "error",
            animate_speed: "fast",
        });
        $(this).prop("disabled", false);
        $(this).html(buttonText);
        if (res.responseJSON?.status === "session_expired") {
            setTimeout(function () {
                window.location.reload();
            }, 1000);
        }
    });
});