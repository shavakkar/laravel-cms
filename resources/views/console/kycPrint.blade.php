@extends('console.layouts.app')

@section('title', 'KYC Print')

@section('content')
    <main>
        <!-- about start -->
        <section id="elem">
            <div class="container grid justify-center">
                <div class="bg-white p-7 mb-5 mt-4">
                    <div class="mb-8">
                        <div>
                            <div class="grid grid-cols-12 items-center">
                                <h2 class="font-bold text-4xl col-span-8">KYC</h2>
                                <div id="image1" class="col-span-4"></div>
                            </div>

                            <div class="">
                                <div class="">
                                    <div class="text-black">

                                        <div>
                                            <h4 class="mb-3 text-xl font-bold">Personal Details</h4>
                                            <div>
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Name:</td>
                                                            <td><input type="text" name="name" id="name"
                                                                    class="ms-5 border-none bg-transparent"
                                                                    placeholder="Enter your name" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email:</td>
                                                            <td><input type="text" name="email" id="email"
                                                                    class="ms-5 border-none bg-transparent"
                                                                    placeholder="Enter your email" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Mobile:</td>
                                                            <td><input type="text" name="mobile" id="mobile"
                                                                    class="ms-5 border-none bg-transparent"
                                                                    placeholder="Enter your mobile" />
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Aadhar Number:</td>
                                                            <td><input type="text" name="aadhar" id="aadhar"
                                                                    class="ms-5 border-none bg-transparent"
                                                                    placeholder="Enter your Aadhar Number" /></td>
                                                        </tr>
                                                        <tr>
                                                            <td>PAN Number:</td>
                                                            <td><input type="text" name="pan" id="pan"
                                                                    class="ms-5 border-none bg-transparent"
                                                                    placeholder="Enter your PAN Number" /></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-12 gap-10">
                                            <div class="mt-4 col-span-6">
                                                <h4 class="mb-3 text-xl font-bold">Permanent Address</h4>
                                                <div class="grid">

                                                    <input type="text" name="permAddress1" id="permAddress1"
                                                        class="border-none w-full bg-transparent"
                                                        placeholder="Enter your Address" />

                                                    <input type="text" name="permAddress2" id="permAddress2"
                                                        class="border-none w-full bg-transparent"
                                                        placeholder="Enter your Address" />

                                                    <input type="text" name="permCity" id="permCity"
                                                        class="border-none w-full bg-transparent"
                                                        placeholder="Enter your city" />

                                                    <input type="text" name="permState" id="permState"
                                                        class="border-none w-full bg-transparent"
                                                        placeholder="Enter your state" />

                                                    <input type="text" name="permPin" id="permPin"
                                                        class="border-none w-full bg-transparent"
                                                        placeholder="Enter your pincode" />

                                                </div>
                                            </div>

                                            <div class="mt-4 col-span-6">
                                                <h4 class="mb-2 text-xl font-bold">Current Address</h4>

                                                <div class="grid">

                                                    <input type="text" name="currentAddress1" id="currentAddress1"
                                                        class="border-none w-full bg-transparent"
                                                        placeholder="Enter your Address" />

                                                    <input type="text" name="currentAddress2" id="currentAddress2"
                                                        class="border-none w-full bg-transparent"
                                                        placeholder="Enter your Address" />

                                                    <input type="text" name="currentCity" id="currentCity"
                                                        class="border-none w-full bg-transparent"
                                                        placeholder="Enter your city" />

                                                    <input type="text" name="currentState" id="currentState"
                                                        class="border-none w-full bg-transparent"
                                                        placeholder="Enter your state" />


                                                    <input type="text" name="currentPin" id="currentPin"
                                                        class="border-none w-full bg-transparent"
                                                        placeholder="Enter your pincode" />

                                                </div>
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-12 gap-10">
                                            <div class="mt-4 col-span-6">
                                                <h4 class="text-xl font-bold mb-2">Aadhar Photo</h4>
                                                <div id="image2">

                                                </div>
                                            </div>
                                            <div class="mt-4 col-span-6">
                                                <h4 class="text-xl font-bold mb-2">PAN Card Photo</h4>
                                                <div id="image3">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about end -->

    </main>

@endsection

@section('scripts')
    <script>
        const id = location.pathname.split('/')[2];

        axios
            .get("/getKyc/" + id)
            .then(function(response) {
                var arr = response.data;
                delete arr.id;
                // delete arr.kycmobile;
                delete arr.created_at;
                delete arr.updated_at;

                Object.keys(arr).forEach(function(k) {
                    const dbValue = arr[k];

                    var idTag = "#" + k;

                    $(idTag).val(dbValue);
                    $(idTag).attr("readonly", true);
                });

                $("#image1").html(
                    `<img id="image5" src="{{ asset('/storage') }}/${arr.userphoto}" width="130px" height="150px" />`
                );

                $("#image2").html(
                    `<img id="image6" src="{{ asset('/storage') }}/${arr.aadharphoto}" width="330px" height="250px" />`
                );

                $("#image3").html(
                    `<img id="image7" src="{{ asset('/storage') }}/${arr.panphoto}" width="330px" height="250px" />`
                );

                var elem = document.getElementById("elem");
                let opt = {
                    margin: 7,
                    filename: "User.pdf",
                    // filename: arr.name + '.pdf',
                    image: {
                        type: "jpeg",
                        quality: 1,
                    },
                    html2canvas: {
                        scale: 2,
                        scrollY: 0,
                    },
                    jsPDF: {
                        unit: "mm",
                        format: "a4",
                        orientation: "portrait",
                    },
                };

                html2pdf().from(elem).set(opt).save();
            })
            .catch(function(err) {
                console.log(err);
            });
    </script>

@endsection
