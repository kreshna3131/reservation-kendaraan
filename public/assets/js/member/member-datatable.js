let nextIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
    <g id="Layer_2" data-name="Layer 2" transform="translate(0 -0.378)">
        <g id="arrow-ios-forward">
            <rect id="Rectangle_1173" data-name="Rectangle 1173" width="20" height="20" transform="translate(0 20.378) rotate(-90)" fill="#c4c6c8" opacity="0"/>
            <path id="Path_345" data-name="Path 345" d="M9.849,16.883A.849.849,0,0,1,9.2,15.49L13,10.939,9.331,6.38A.868.868,0,1,1,10.7,5.31L14.8,10.4a.849.849,0,0,1,0,1.078l-4.245,5.094A.849.849,0,0,1,9.849,16.883Z" transform="translate(-1.358 -0.75)" fill="#c4c6c8"/>
        </g>
    </g>
</svg>`;

let previousIcon = `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
    <g id="Layer_2" data-name="Layer 2" transform="translate(20 20.378) rotate(180)">
        <g id="arrow-ios-forward">
            <rect id="Rectangle_1173" data-name="Rectangle 1173" width="20" height="20" transform="translate(0 20.378) rotate(-90)" fill="#c4c6c8" opacity="0"/>
            <path id="Path_345" data-name="Path 345" d="M9.849,16.883A.849.849,0,0,1,9.2,15.49L13,10.939,9.331,6.38A.868.868,0,1,1,10.7,5.31L14.8,10.4a.849.849,0,0,1,0,1.078l-4.245,5.094A.849.849,0,0,1,9.849,16.883Z" transform="translate(-1.358 -0.75)" fill="#c4c6c8"/>
        </g>
    </g>
</svg>`;

function initDatatables(url, orderFalse, visibleFalse, drawCallback = "") {
    return $(".table").DataTable({
        sDom: '<"text-right mb-md"T><"row d-none"<"col-lg-6"l><"col-lg-6"f>><"table-responsive"t>pr',
        language: {
            searchPlaceholder: "filter records",
            processing:
                '<div class="d-flex justify-content-center align-items-center kpaw_dt_spinner"><div class="spinner-border text-light" role="status"></div> Sedang memproses</div>',
            loadingRecords: "",
            paginate: {
                next: nextIcon,
                previous: previousIcon,
            },
            emptyTable: "Belum ada data karyawan",
        },
        processing: true,
        columnDefs: [
            {
                orderable: false,
                targets: orderFalse,
            },
            {
                visible: false,
                targets: visibleFalse,
            },
        ],
        ajax: {
            url: url,
            type: "GET",
            error: function (res) {
                let errorList = "";
                if (typeof res.responseJSON.errors === "object") {
                    $.each(res.responseJSON.errors, function (key, value) {
                        if (value.length > 1) {
                            $.each(value, function (key, value) {
                                errorList += value + "<br/>";
                            });
                        } else {
                            errorList += value + "<br/>";
                        }
                    });
                } else {
                    errorList +=
                        "Terjadi kesalahan pada sistem. Silakan reload ulang halaman ini.";
                }
                new PNotify({
                    title: "Gagal",
                    text: errorList,
                    icon: false,
                    width: "340px",
                    type: "error",
                    animate_speed: "fast",
                });
                if (res.responseJSON?.status === "session_expired") {
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                }
            },
        },
        drawCallback: function () {
            typeof callback == "function" && callback();
        },
    });
}