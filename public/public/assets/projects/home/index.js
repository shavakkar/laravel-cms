$(window).on('load', function() {
    $(".search-input-area").addClass("show");
    $('body').css("overflow", "hidden");
    $('body').css('height', '100vh')
    $("#anywhere-home").addClass("bgshow");
});
$(document).on('click', '#close', function() {
    $(".search-input-area").removeClass("show");
    $('body').css("overflow", "auto");
    $('body').css('height', 'auto')
    $("#anywhere-home").removeClass("bgshow");
});
$(document).on('click', '#anywhere-home', function() {
    $(".search-input-area").removeClass("show");
    $('body').css("overflow", "auto");
    $('body').css('height', 'auto')
    $("#anywhere-home").removeClass("bgshow");
});

jQuery(document).ready(function($) {

    $('.homeContact').each(function(index, value) {
        contactFunction(value)
    });

    const url = $('.homeContact').attr('action');

    function contactFunction(value) {
        $(value).submit(function(e) {
            e.preventDefault();

            // const form = document.getElementById("homeContact");
            const formData = new FormData(value);
            axios.post(url, formData)
                .then(response => {
                    // console.log(response)
                    clearErrors()
                    $(".homeContact").trigger('reset');
                    const resp = document.getElementsByName("resp");
                    let myArray = Array.from(resp)
                    myArray.forEach(i => {
                        i.insertAdjacentHTML('afterend',
                            `<div class="text-success bg-body text-center fs-5 rounded-1 mb-3">Enquiry Sent Successfully</div>`
                        );
                    });
                })
                .catch(error => {
                    const errors = error.response.data.errors

                    // console.log(removeMessages === null)

                    clearErrors()

                    Object.keys(errors).forEach(function(k) {

                        const itemDom = document.getElementsByName(k);
                        let myArray = Array.from(itemDom)

                        const errorMessage = errors[k];

                        myArray.forEach(i => {
                            i.insertAdjacentHTML('afterend',
                                `<div class="text-danger fs-5" style="margin-bottom: 1rem; margin-top: -1.5rem;">${errorMessage}</div>`
                            );
                            i.classList.add('border', 'border-danger');
                        });
                    });
                });
        });

        function clearErrors() {
            // remove all error messages
            const errorMessages = document.querySelectorAll('.text-danger')
            errorMessages.forEach((element) => element.remove())


            // remove all form controls with highlighted error text box
            const formControls = document.querySelectorAll('.border-danger')
            formControls.forEach((element) => element.classList.remove('border',
                'border-danger'))


            const removeMessages = document.querySelectorAll('.text-success')
            removeMessages.forEach((element) => {
                if (element !== null) {
                    element.remove();
                }
            })
        }

    }

});