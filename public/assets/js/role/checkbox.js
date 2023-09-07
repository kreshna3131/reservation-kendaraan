const checkboxParents = document.querySelectorAll(".checkbox-parent");
Array.from(checkboxParents).forEach((element) => {
    const checkbox = element.querySelectorAll(".form-check-input");
    let checkedCheckbox = 0;
    let waitLoop = 0;

    element
        .querySelector(".checkbox-all")
        .addEventListener("change", function () {
            const checkboxs = element.querySelector(".checkbox-list").children;

            Array.from(checkboxs).forEach((element) => {
                if (this.checked) {
                    checkedCheckbox++;
                    element.querySelector(".form-check-input").checked = true;
                } else {
                    checkedCheckbox--;
                    element.querySelector(".form-check-input").checked = false;
                }
            });
        });

    Array.from(checkbox).forEach((checkboxElement) => {
        waitLoop++;
        if (checkboxElement.checked == true) {
            checkedCheckbox++;
        }
    });

    if (waitLoop == checkbox.length) {
        Array.from(checkbox).forEach((checkboxElement) => {
            let associations =
                checkboxElement.getAttribute("data-associations");
            associations = JSON.parse(associations);

            checkboxElement.addEventListener("change", function () {
                if (this.checked == false) {
                    element.querySelector(".checkbox-all").checked = false;
                    checkedCheckbox--;
                } else {
                    checkedCheckbox++;

                    if (Array.isArray(associations)) {
                        associations.forEach((element) => {
                            document.querySelector(`[value='${element}']`).checked = true;
                        });
                    }

                    if (checkedCheckbox == waitLoop) {
                        element.querySelector(".checkbox-all").checked = true;
                    }
                }
            });
        });
    }
});
