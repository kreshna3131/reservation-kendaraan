$(function () {
    function passwordCheck(password) {
        if (
            password.length >= 8 &&
            password.match(/(?=.*[a-z])/) &&
            password.match(/(?=.*[A-Z])/) &&
            password.match(/(?=.*[0-9])/) &&
            password.match(/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/\\\\/]/)
        ) {
            strength = 3;
        } else if (
            password.length >= 8 &&
            ((password.match(/(?=.*[a-z])/) && password.match(/(?=.*[0-9])/)) ||
                (password.match(/(?=.*[a-z])/) &&
                    password.match(/(?=.*[A-Z])/)) ||
                (password.match(/(?=.*[a-z])/) &&
                    password.match(
                        /[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/\\\\/]/
                    )) ||
                (password.match(/(?=.*[A-Z])/) &&
                    password.match(/(?=.*[0-9])/)) ||
                (password.match(/(?=.*[A-Z])/) &&
                    password.match(/(?=.*[a-z])/)) ||
                (password.match(/(?=.*[A-Z])/) &&
                    password.match(
                        /[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/\\\\/]/
                    )) ||
                (password.match(/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/\\\\/]/) &&
                    password.match(/(?=.*[0-9])/)) ||
                (password.match(/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/\\\\/]/) &&
                    password.match(/(?=.*[a-z])/)) ||
                (password.match(/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/\\\\/]/) &&
                    password.match(/(?=.*[A-Z])/)))
        ) {
            strength = 2;
        } else if (
            password.match(/(?=.*[a-z])/) ||
            password.match(/(?=.*[A-Z])/) ||
            password.match(/(?=.*[0-9])/) ||
            password.match(/[-!@#$%^&*()_+|~=`{}\[\]:";'<>?,.\/\\\\/]/)
        ) {
            strength = 1;
        }

        displayBar(strength);
    }

    function displayBar(strength) {
        switch (strength) {
            case 1:
                $("#password-strength span")
                    .css({
                        width: "33%",
                        background: "#FF3B3B",
                    })
                    .html("asasas");
                $("#password-strength span").html("");
                addCheckbox();
                break;

            case 2:
                $("#password-strength span").css({
                    width: "66%",
                    background: "#FF8801",
                });
                $("#password-strength span").html("");
                removeCheckbox();
                break;

            case 3:
                $("#password-strength span").css({
                    width: "100%",
                    background: "#05C270",
                });
                $("#password-strength span").html("");
                removeCheckbox();
                break;

            default:
                $("#password-strength span").css({
                    width: "0",
                    background: "#F5F8FA",
                });
                $("#password-strength span").html("");
                removeCheckbox();
        }
    }

    $("[name='password']").keyup(function () {
        strength = 0;
        var password = $(this).val();
        passwordCheck(password);
    });

    $("[name='password']").on("keyup", function () {
        if ($(this).val() == "") {
            $("#password-strength").addClass("d-none");
        } else {
            $("#password-strength").removeClass("d-none");
        }
    });

    showPassword();
});

function addCheckbox() {
    $("#week-password-checkbox").html(`
        <input type="hidden" name="weak_password" value=""/>
        <div class="form-group mb-4">
            <div class="custom-control custom-checkbox kpaw_custom--checkbox">
                <input type="checkbox" class="custom-control-input" name="weak_password" id="weak_password" value="1">
                <label class="custom-control-label kpaw_weight--medium" for="weak_password">
                    Yakin ingin melanjutkan dengan password lemah?
                </label>
            </div>
        </div>
    `);
}

function removeCheckbox() {
    $("#week-password-checkbox").removeClass(
        "form-group row align-items-center"
    );
    $("#week-password-checkbox").html(``);
}
