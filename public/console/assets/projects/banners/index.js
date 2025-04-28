function previewFile(input) {
    var file = $("input[type=file]").get(0).files[0];

    if (file) {
        var reader = new FileReader();

        reader.onload = function() {
            $("#imageMain").html(
                `<img src="${reader.result}" width="300" class="mt-4" />`
            );
        }

        reader.readAsDataURL(file);
    }
}

jQuery(document).ready(function($) {
    $("#postForm").submit(function(e) {
        e.preventDefault();

        const form = document.getElementById("postForm");
        const formData = new FormData(form);

        axios.post('/banner-store', formData, {
                headers: {
                    'content-Type': 'multipart/form-data'
                }
            })
            .then(response => {
                // console.log(response)
                window.location = "/banner";
            })
            .catch(error => {
                // console.log(error.response.data.errors)

                const errors = error.response.data.errors

                clearErrors()

                Object.keys(errors).forEach(function(k) {
                    const itemDom = document.getElementById(k);
                    const errorMessage = errors[k];

                    itemDom.insertAdjacentHTML('afterend',
                        `<div class="text-danger text-[12px]">${errorMessage}</div>`
                    );
                    itemDom.classList.add('border', 'border-danger');
                });
            });
    });

    function clearErrors() {
        // remove all error messages
        const errorMessages = document.querySelectorAll('.text-danger')
        errorMessages.forEach((element) => element.textContent = '')

        // remove all form controls with highlighted error text box
        const formControls = document.querySelectorAll('.border')
        formControls.forEach((element) => element.classList.remove('border', 'border-danger'))
    }

    $("#formSubmit").submit(function(e) {
        e.preventDefault();

        const form1 = document.getElementById("formSubmit");
        const formData1 = new FormData(form1);
        formData1.append('_method', 'put');


        var id1 = $("#imgId").val();

        // axios
        axios.post('/banner-update/' + id1, formData1, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(response => {
                // console.log(response)
                window.location = "/banner";
            })
            .catch(error => {
                const errors = error.response.data.errors

                // console.log(errors)

                clearErrors()

                Object.keys(errors).forEach(function(k) {
                    var orgK = k;
                    k = k.substr(0, 1).toUpperCase() + k.substr(1);
                    k = "img" + k;
                    const itemDom = document.getElementById(k);
                    const errorMessage = errors[orgK];

                    itemDom.insertAdjacentHTML('afterend',
                        `<div class="text-danger text-[12px]">${errorMessage}</div>`
                    );
                    itemDom.classList.add('border', 'border-danger');
                });

            });
    });

    function clearErrors() {
        // remove all error messages
        const errorMessages = document.querySelectorAll('.text-danger')
        errorMessages.forEach((element) => element.remove())


        // remove all form controls with highlighted error text box
        const formControls = document.querySelectorAll('.border-danger')
        formControls.forEach((element) => element.classList.remove('border', 'border-danger'))
    }
});