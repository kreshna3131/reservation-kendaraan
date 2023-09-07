if ($("#throttle-alert").length) {
    const DateTime = luxon.DateTime;
    const throttleEnd = $("#throttle-alert").data('throttle-end');
    let countDownDate = DateTime.fromSQL(throttleEnd).toMillis();

    setInterval(() => {
        let now = DateTime.now().toMillis();
        let distance = countDownDate - now;
        let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        let seconds = Math.floor((distance % (1000 * 60)) / 1000);

        seconds < 10 ? $("#seconds").html(`0${seconds}`) : $("#seconds").html(seconds);
        minutes < 10 ? $("#minutes").html(`0${minutes}`) : $("#minutes").html(minutes);

        if (distance < 0) {
            $("#throttle-alert").remove();
        }
    }, 1000);
}