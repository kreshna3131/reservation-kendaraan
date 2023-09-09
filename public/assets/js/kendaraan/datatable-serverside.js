function initDatatables(url, orderFalse, callback = "") {
    return $(".table").DataTable({
        sDom: '<"text-right mb-md"T><"d-none"lf><"table-responsive"t>pr',
        serverSide: true,
        language: {
            search: "",
            searchPlaceholder: "Search",
            processing:
                '<div class="d-flex justify-content-center align-items-center kpaw_dt_spinner"><div class="spinner-border text-light" role="status"></div> Sedang memproses</div>',
            loadingRecords: "",
            paginate: {
                next: nextIcon,
                previous: previousIcon,
            },
            emptyTable: "Belum ada Data Kendaraan",
            zeroRecords: "Data Kendaraan yang kamu cari tidak ada",
        },
        order: [[0, "desc"]],
        processing: true,
        columnDefs: [
            {
                orderable: false,
                targets: orderFalse,
            },
        ],
        ajax: {
            url: url,
            type: "GET",
            data: function (d) {
                d.date = $("#date_filter").val();
                console.log(d.date);
            },
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
                    title: "Gagal!",
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
        columns: [
            { data: "DT_RowIndex", orderable: false, searchable: false },
            { data: "kendaraan_name" },
        ],
        drawCallback: function () {
            typeof callback == "function" && callback();
        },
    });
}
