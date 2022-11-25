@extends('layouts.app')

@section('title', 'User Registeration')

@section('content')
    <div class="flex items-center justify-center min-h-screen bg-primary">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
            <h3 class="text-2xl font-bold text-center">Join US</h3>
            <div class="mt-4">
                <div>
                    <label class="block" for="Name">Name</label>
                    <input id="name" type="text" placeholder="Name"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
                </div>
                <div class="mt-4">
                    <label class="block" for="email">Phone Number</label>
                    <input id="phone" type="text" placeholder="Phone Number"
                        class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" />
                </div>
                <div class="flex">
                    <button id="createAccount"
                        class="w-full px-6 py-2 mt-4 text-white bg-primary rounded-lg hover:bg-secondary">
                        Create Account
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="success-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="successModalClose absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    aria-hidden="false">
                    <svg aria-hidden="false" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="p-6 text-center">
                    <img class="mx-auto mb-4 w-14 h-14" src="{{ asset('assets/images/success.svg') }}" />

                    <div
                        class="mb-4 border overflow-hidden text-gray-500 dark:text-gray-400 border-solid border-black rounded-lg flex items-center">
                        <h3 id="accesslink" class="text-base px-2 mr-2 overflow-hidden">
                            https://check/$2y$10$RWxwKcLbIzCkginiwV6hOOJpW1IQAPidYgCAvC59zUy1Jkc6oug96
                        </h3>
                        <button id="copyBtn"
                            class="bg-green-600 text-white px-2 py-2 border-l border-solid border-primary">Copy</button>
                    </div>

                    <button id="goToMain" type="button"
                        class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Go to main page
                    </button>
                    <button type="button"
                        class="successModalClose text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 ">
                        Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="error-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id='errorModalClose' type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                    aria-hidden="false">
                    <svg aria-hidden="false" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <h3 id="errText" class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <script>
        const BASE_URL = "{{ route('base_url') }}";
        $(document).ready(() => {
            const errModalRef = document.getElementById('error-modal');
            const errModal = new Modal(errModalRef, {});
            $('#errorModalClose').click((e) => {
                errModal.hide();
            });

            const successModalRef = document.getElementById('success-modal');
            const successModal = new Modal(successModalRef, {});
            $('.successModalClose').click((e) => {
                successModal.hide();
            });

            $('#createAccount').click(function(e) {
                const username = $('#name').val();
                const phone = $('#phone').val().trim();
                // if (!username) {
                //     alert('Please input name');
                //     return;
                // }
                // if (!phone || !/^\d*$/.test(phone)) {
                //     alert('Please input the exact Phone Number');
                //     return;
                // }

                $.ajax({
                    url: "{{ route('registration') }}",
                    type: 'POST',
                    async: true,
                    data: {
                        name: username,
                        phone: phone
                    },
                    success: function(res) {
                        console.log(res);
                        if (res.status == 'error') {
                            $("#errText").html(res.errMessage);
                            errModal.toggle();
                        } else {
                            $("#accesslink").html(BASE_URL + '/check/' + res.response.link);
                            successModal.toggle();
                        }
                    },
                    error: function(xhr, exception) {
                        var msg = "";
                        if (xhr.status === 0) {
                            msg = "Not connect.\n Verify Network.";
                        } else if (xhr.status == 404) {
                            msg = "Requested page not found. [404]";
                        } else if (xhr.status == 500) {
                            msg = "Internal Server Error [500].";
                        } else if (exception === "parsererror") {
                            msg = "Requested JSON parse failed.";
                        } else if (exception === "timeout") {
                            msg = "Time out error.";
                        } else if (exception === "abort") {
                            msg = "Ajax request aborted.";
                        } else {
                            if (xhr.status == 422) {
                                if (xhr.responseJSON.errors) {
                                    Object.values(xhr.responseJSON.errors).forEach((item) => {
                                        msg += (item + "<br />");
                                    })
                                } else msg = "Error:" + xhr.status;
                            }
                            else msg = "Error:" + xhr.status;
                        }
                        $("#errText").html(msg);
                        errModal.toggle();
                    }
                })
            })

            $("#goToMain").click((e) => {
                location.href = $("#accesslink").html().trim();
            })

            $("#copyBtn").click(async (e) => {
                var copyText = $("#accesslink").html();
                await navigator.clipboard.writeText(copyText.trim())
                e.target.innerHTML = 'Copied';
                setTimeout(() => {
                    e.target.innerHTML = 'Copy';
                }, 1000);
            })
        })
    </script>
@endsection
