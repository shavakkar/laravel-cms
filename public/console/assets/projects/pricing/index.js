$.ajax({
    url: "/getService",
    method: "get",
    data: {
        _token: "{{ csrf_token() }}",
    },
    success: function(response) {
        for (let j = 0; j < response.length; j++) {
            $('#service_id')
                .append($('<option>')
                    .text(response[j].name)
                    .attr('value', response[j].id));

            $('#priceService')
                .append($('<option>')
                    .text(response[j].name)
                    .attr('value', response[j].id));
        }
    },
});

jQuery(document).ready(function($) {
    $("#pricingForm").submit(function(e) {
        e.preventDefault();

        const form = document.getElementById("pricingForm");
        const formData = new FormData(form);

        axios.post('/pricing-store', formData, {
                headers: {
                    'content-Type': 'multipart/form-data'
                }
            })
            .then(response => {
                // console.log(response)
                window.location = "/pricing";
            })
            .catch(error => {
                // console.log(error.response.data.errors)

                const errors = error.response.data.errors

                clearErrors()

                Object.keys(errors).forEach(function(k) {
                    const itemDom = document.getElementById(k);
                    const errorMessage = errors[k];

                    itemDom.insertAdjacentHTML('afterend',
                        `<div class="text-danger">${errorMessage}</div>`);
                    itemDom.classList.add('border', 'border-danger');
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
    });

    $("#formPricing").submit(function(e) {
        e.preventDefault();

        const form1 = document.getElementById("formPricing");
        const formData1 = new FormData(form1);
        formData1.append('_method', 'put');


        var id1 = $("#pricingId").val();

        // axios
        axios.post('/pricing-update/' + id1, formData1, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
            .then(response => {
                // console.log(response)
                window.location = "/pricing";
            })
            .catch(error => {
                const errors = error.response.data.errors

                clearErrors()

                Object.keys(errors).forEach(function(k) {
                    var orgK = k;
                    k = k.substr(0, 1).toUpperCase() + k.substr(1);
                    k = "price" + k;
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
        const formControls = document.querySelectorAll('.border')
        formControls.forEach((element) => element.classList.remove('border', 'border-danger'))
    }
});