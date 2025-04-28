// Jquery Function to show Current address when same as Permanent Address
$("#same").click(function() {

    if (this.checked) {
        const permAddress1 = $("#permAddress1").val();
        const permAddress2 = $("#permAddress2").val();
        const permState = $("#permState").val();
        const permCity = $("#permCity").val();
        const permPin = $("#permPin").val();

        $("#currentAddress1").val(permAddress1);
        $("#currentAddress2").val(permAddress2);
        $("#currentState").val(permState);
        $("#currentCity").val(permCity);
        $("#currentPin").val(permPin);
    } else {
        $("#currentAddress1").val("");
        $("#currentAddress2").val("");
        $("#currentState").val("");
        $("#currentCity").val("");
        $("#currentPin").val("");
    }
});

$(".photo").each(function(index, obj) {
    var idTag = "#image" + (index + 1);
    $(this).on("change", function() {
        var files = $(this)[0].files;
        // console.log($(idTag))
        $(idTag).empty();
        if (files.length > 0) {
            for (var i = 0; i < files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("<div class='d-flex align-items-center gap-4 preview'><img style='height: 150px' src='" +
                            e
                            .target.result +
                            "'><a class='btn btn-danger delete fs-6'>Remove</a></div>")
                        .appendTo(idTag);
                };
                reader.readAsDataURL(files[i]);
            }
        }
    });

    var id = "#" + $(this).attr('id');

    $(idTag).on("click", ".delete", function() {
        $(this).parent(".preview").remove();
        $(id).val("");
    });
});

// Form Upload using Axios
jQuery(document).ready(function($) {
    
    // const url = $('.kycForm').attr('action');
    const url = CONSOLE_URL;

    $("#kycForm").submit(function(e) {
        e.preventDefault();

        const form = document.getElementById("kycForm");
        const formData = new FormData(form);

        // console.log(url+'/kycForm')

        axios.post(url + '/kycForm', formData, {
                headers: {
                    'content-Type': 'multipart/form-data'
                }
            })
            .then(response => {
                clearErrors()
                var message = response.data.message

                $("#kycForm").trigger('reset');


                // window.location.replace('/kyc');
                window.location = '/';
                // const itemDom = document.querySelector("#msgCont");


                itemDom.insertAdjacentHTML('afterend',
                    `<div class="text-bg-success text-center rounded-2 w-50 m-auto mb-3">Message Sent Successfully</div>`
                );

                // itemDom.scrollIntoView()
            })
            .catch(error => {
                const errors = error.response.data.errors

                // console.log(errors)

                clearErrors()

                Object.keys(errors).forEach(function(k) {
                    const itemDom = document.getElementById(k);
                    const errorMessage = errors[k];

                    itemDom.parentNode.insertAdjacentHTML('afterend',
                        `<div class="text-danger fs-5">${errorMessage}</div>`
                    );
                    itemDom.classList.add('border', 'border-danger');
                });

                const submitBtn = document.querySelector("#submitBtn");
                submitBtn.parentNode.insertAdjacentHTML('afterend',
                    `<div class="text-danger fs-sm" style="margin-top: 20px;">There are Some Mistakes or Fields properly required</div>`
                );
            });

        function clearErrors() {
            // remove all error messages
            const errorMessages = document.querySelectorAll('.text-danger')
            // console.log(errorMessages)
            errorMessages.forEach((element) => element.remove())

            // remove all form controls with highlighted error text box
            const formControls = document.querySelectorAll('.border-danger')
            formControls.forEach((element) => element.classList.remove('border', 'border-danger'))

            const removeMessages = document.querySelectorAll('.text-bg-success')
            removeMessages.forEach((element) => {
                if (element !== null) {
                    element.remove();
                }
            })
        }

        // function clearImages(){
        //     const imgPreview = document.querySelectorAll('.preview')
        //     imgPreview.forEach((element) => console.log(element));
        // }
    });


});