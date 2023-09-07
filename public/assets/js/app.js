$(function () {
    /* ======================================
	* Button ripple
	====================================== */
    "use strict";
    [].map.call(document.querySelectorAll('[anim="ripple"]'), (el) => {
        el.addEventListener("click", (e) => {
            e = e.touches ? e.touches[0] : e;
            const r = el.getBoundingClientRect(),
                d = Math.sqrt(Math.pow(r.width, 2) + Math.pow(r.height, 2)) * 2;
            el.style.cssText = `--s: 0; --o: 1;`;
            el.offsetTop;
            el.style.cssText = `--t: 1; --o: 0; --d: ${d}; --x:${
                e.clientX - r.left
            }; --y:${e.clientY - r.top};`;
        });
    });

    /* ======================================
	* Select2 initialize & number separator
	====================================== */
    $("select").select2({
        theme: "bootstrap",
    });

    if ($(".number-separator")[0]) {
        var numberSeparator = new AutoNumeric.multiple(".number-separator", {
            allowDecimalPadding: false,
            minimumValue: 0,
            decimalCharacter: ",",
            digitGroupSeparator: ".",
            defaultValueOverride: "",
            modifyValueOnWheel: false,
        });
    }
});

/* ======================================
 * Modal dismiss
====================================== */
$(document).on("click", ".modal-dismiss", function (e) {
    e.preventDefault();
    $.magnificPopup.close();
});

/* ======================================
 * Dropdown with accordion inside
====================================== */
$(".dropdown-accordion").on("show.bs.dropdown", function (event) {
    var accordion = $(this).find($(this).data("accordion"));
    accordion.find(".kpaw_collapse.show").collapse("hide");
});

$(".dropdown-accordion").on(
    "click",
    'a[data-toggle="collapse"]',
    function (event) {
        event.preventDefault();
        event.stopPropagation();
        $($(this).data("parent")).find(".kpaw_collapse.show").collapse("hide");
        $($(this).attr("href")).collapse("show");
    }
);

$('[type="number"]').on("keypress", function (evt) {
    var charCode = evt.which ? evt.which : event.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) return false;
    return true;
});
