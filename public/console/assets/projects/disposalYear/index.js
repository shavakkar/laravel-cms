jQuery(document).ready(function($) {
    $("#disposalForm").submit(function(e) {
        e.preventDefault();

        const form = document.getElementById("disposalForm");
        const formData = new FormData(form);

        axios.post('/disposalYear-store', formData)
            .then(response => {
                window.location = "/disposalYear";
            })
            .catch(error => {
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
        errorMessages.forEach((element) => element.remove())

        // remove all form controls with highlighted error text box
        const formControls = document.querySelectorAll('.border')
        formControls.forEach((element) => element.classList.remove('border', 'border-danger'))
    }

    $("#formService").submit(function(e) {
        e.preventDefault();

        const form1 = document.getElementById("formService");
        const formData1 = new FormData(form1);
        formData1.append('_method', 'put');


        var id1 = $("#disposalId").val();

        // axios
        axios.post('/disposalYear-update/' + id1, formData1)
            .then(response => {
                // console.log(response)
                window.location = "/disposalYear";
            })
            .catch(error => {
                // console.log(error.response.data.errors)

                const errors = error.response.data.errors

                clearErrors()

                Object.keys(errors).forEach(function(k) {
                    var orgK = k;
                    k = k.substr(0, 1).toUpperCase() + k.substr(1);
                    k = "disposal" + k;
                    const itemDom = document.getElementById(k);
                    const errorMessage = errors[orgK];

                    itemDom.insertAdjacentHTML('afterend',
                        `<div class="text-danger text-[12px]">${errorMessage}</div>`
                    );
                    itemDom.classList.add('border', 'border-danger');
                });
            });
    });
});