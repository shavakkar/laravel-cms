$(document).ready(function () {
    // DataTable
    var table = $("#datatable").dataTable({
        Paginate: true,
        processing: true,
        pageLength: 10,
        serverSide: true,
        rowCallback: function (nRow, aData, iDisplayIndex) {
            var oSettings = this.fnSettings();
            $("td:first", nRow).html(
                oSettings._iDisplayStart + iDisplayIndex + 1
            );
            return nRow;
        },
        bDestroy: true,
        ajax: get_banners,
        columns: [
            { data: "id" },
            { data: "banner" },
            { data: "video" },
            { data: "mobile_video" },
            { data: "status" },
            {
                data: "action_edit",
                mRender: function (data, type, row) {
                    return row.action_edit + " " + row.action_delete;
                },
            },
        ],
    });
    var newScript;
    newScript = document.createElement("script");
    newScript.type = "text/javascript";
    newScript.src = "http://127.0.0.1:8000/assets/js/pages/lightbox.init.js";
    document.getElementsByTagName("head")[0].appendChild(newScript);

    // Store
    var form = document.getElementById("new-banner-form");
    var new_submit = document.getElementById("new-banner-submit");
    let e1 = $("#banner_error"),
        e2 = $("#status_error"),
        e3 = $("#video_error");
        e4 = $("#mobile_video_error");

    form.addEventListener("submit", function (e) {
        e.preventDefault();
        // new_submit.disabled = true;
        let a = $("#banner"),
            b = $("#status"),
            c = $("#video");
            d = $("#mobile_video");
        if (!a.val()) a.addClass("is-invalid");
        else a.removeClass("is-invalid");
        if (!$("input:radio[name='status']").is(":checked"))
            $("#status1").addClass("is-invalid");

        if (a.val() && $("input:radio[name='status']").is(":checked")) {
            new_submit.innerHTML = `<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Loading`;
            // console.log(...data);
            axios
                .post(form.getAttribute("action"), new FormData(form), {
                    headers: {
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then(function (response) {
                    console.log(response.data);
                    $("#datatable").DataTable().ajax.reload();
                    $(".toast-body").text(response.data.success);
                    $("#new-banner").modal("hide");
                    new bootstrap.Toast(toastLiveExample).show();
                    form.reset();
                })
                .catch(function (error) {
                    if (error.response.status === 422) {
                        if (error.response.data.errors.banner) {
                            a.addClass("is-invalid");
                            e1.text(error.response.data.errors.banner[0]);
                        }
                        if (error.response.data.errors.status) {
                            b.addClass("is-invalid");
                            e2.text(error.response.data.errors.status[0]);
                        }
                        if (error.response.data.errors.video) {
                            c.addClass("is-invalid");
                            e3.text(error.response.data.errors.video[0]);
                        }
                    }
                    // console.log(error.response);
                })
                .then(function () {
                    new_submit.disabled = false;
                    new_submit.innerHTML = "Submit";
                });
        } else {
            new_submit.disabled = false;
        }
    });

    // Edit
    $(document).on("click", ".edit-banner", function (e) {
        let id = $(this).data("id");
        Swal.fire({
            title: "Are you sure to Edit ?",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, Edit it!",
            cancelButtonText: "No, cancel!",
            confirmButtonClass: "btn btn-success mt-2",
            cancelButtonClass: "btn btn-danger ms-2 mt-2",
            buttonsStyling: !1,
        }).then(function (t) {
            if (t.value) {
                axios
                    .get("/banners/" + id)
                    .then((response) => {
                        if (response.status === 200) {
                            console.log(response.data);
                            $("#edit_id").val(response.data.id);
                            $(
                                "input[name=edit_status][value=" +
                                    response.data.status +
                                    "]"
                            ).prop("checked", true);
                            $("#edit_banner").val(response.data.banner);
                            $("#old_vdo").val(response.data.video);
                            $("#old_mobile_vdo").val(response.data.mobile_video);
                            // $("#edit_email").val(response.data.email);
                            $("#update-banner").modal("show");
                        }
                    })
                    .catch((error) => {
                        console.log(error.response.data);
                        if (error.response.status === 401) {
                            alert("login");
                        }
                    });
            } else {
            }
        });
    });

    //Update
    var update_form = document.getElementById("update-banner-form");
    var update_submit = document.getElementById("update-banner-submit");
    let e5 = $("#edit_banner_error"),
        e6 = $("#edit_status_error"),
        e7 = $("#edit_video_error");
        e8 = $("#edit_mobile_video_error");
    update_form.addEventListener("submit", function (e) {
        e.preventDefault();
        update_submit.disabled = true;
        let a = $("#edit_banner"),
            b = $("#edit_status"),
            c = $("#edit_video");
            d = $("#edit_mobile_video");
        if (!a.val()) a.addClass("is-invalid");
        else a.removeClass("is-invalid");
        if (!$("input:radio[name='status']").is(":checked"))
            $("#status1").addClass("is-invalid");
        if (a.val() && $("input:radio[name='edit_status']").is(":checked")) {
            update_submit.innerHTML = `<i class="bx bx-loader bx-spin font-size-16 align-middle me-2"></i> Updating...`;
            let id = $("#edit_id").val();
            axios
                .post(
                    "/banners/" + id,
                    new FormData(update_form),
                    {
                        headers: {
                            "Content-Type": "multipart/form-data",
                        },
                    }
                )
                .then(function (response) {
                    update_form.reset();
                    update_submit.disabled = false;
                    update_submit.innerHTML = "Update";
                    $("#update-banner").modal("hide");
                    $(".toast-body").text(response.data.success);
                    new bootstrap.Toast(toastLiveExample).show();
                    $("#datatable").DataTable().ajax.reload();
                })
                .catch(function (error) {
                    if (error.response.status === 422) {
                        if (error.response.data.errors.banner) {
                            a.addClass("is-invalid");
                            e5.text(error.response.data.errors.banner[0]);
                        }
                        if (error.response.data.errors.edit_status) {
                            b.addClass("is-invalid");
                            e6.text(error.response.data.errors.edit_status[0]);
                        }
                        if (error.response.data.errors.video) {
                            c.addClass("is-invalid");
                            e7.text(error.response.data.errors.video[0]);
                        }
                    }
                })
                .then(function () {
                    update_submit.disabled = false;
                    update_submit.innerHTML = "Update";
                });
        } else {
            update_submit.disabled = false;
        }
    });

    // Delete
    $(document).on("click", ".delete-banner", function (e) {
        let id = $(this).data("id");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: !0,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            confirmButtonClass: "btn btn-success mt-2",
            cancelButtonClass: "btn btn-danger ms-2 mt-2",
            buttonsStyling: !1,
        }).then(function (t) {
            if (t.value) {
                axios
                    .delete("/banners/" + id)
                    .then((response) => {
                        if (response.status === 200) {
                            $(".toast-body").text(response.data.success);
                            new bootstrap.Toast(toastLiveExample).show();
                            $("#datatable").DataTable().ajax.reload();
                        }
                    })
                    .catch((error) => {
                        console.log(error.response.data);
                        if (error.response.status === 450) {
                            $(".toast-error-body").text(
                                error.response.data.error
                            );
                            new bootstrap.Toast(toastError).show();
                        }
                    });
            } else {
                // alert("wsafe");
            }
        });
    });
});
