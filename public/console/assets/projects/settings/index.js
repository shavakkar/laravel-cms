// Image preview
function previewFile1(input) {
    var file = $("input[type=file]#logo").get(0).files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function() {
            $("#logoMain").html(
                `<img src="${reader.result}" width="200" class="mt-4" />`
            );
        }
        reader.readAsDataURL(file);
    }
}

function previewFile2(input) {
    var file = $("input[type=file]#favicon").get(0).files[0];
    if (file) {
        var reader = new FileReader();
        reader.onload = function() {
            $("#faviconMain").html(
                `<img src="${reader.result}" width="50" class="mt-4" />`
            );
        }
        reader.readAsDataURL(file);
    }
}

jQuery(document).ready(function($) {

    $.ajax({
        url: "/getSettings",
        method: "get",
        data: {
            _token: "{{ csrf_token() }}",
        },
        success: function(response) {
            $("#name").val(response.name);
            $("#email").val(response.email);
            $("#mobile").val(response.mobile);
            $("#address").val(
                response.address
            );
            $("#logoMain").html(
                `<img id="image5" src="storage/${response.logo}" width="150" class="mt-4" />`
            );
            $("#faviconMain").html(
                `<img id="image6" src="storage/${response.favicon}" width="50" class="mt-4" />`
            );
            $("#marquee").val(response.marquee);
            $("#metadesc").val(
                response.metadesc
            );
            $("#metakey").val(response.metakey);
        },
    });


    //Submit form 
    $("#settingsForm").submit(function(e) {
        e.preventDefault();

        const form = document.getElementById("settingsForm");
        const formData = new FormData(form);
        formData.append('_method', 'put');

        axios.post('/settings', formData, {
                headers: {
                    'content-Type': 'multipart/form-data'
                }
            })
            .then(response => {
                // console.log(response)
                window.location = "/settings";
            })
            .catch(error => {
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