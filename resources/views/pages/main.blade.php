@extends('layouts.app')

@section('title', 'Main')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-primary p-8">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg w-full flex flex-wrap">
            <div
                class="m-1 flex items-center max-w-[300px] border overflow-hidden text-gray-500 dark:text-gray-400 border-solid border-gray-200 rounded-lg">
                <h3 id="accesslink" class="text-base px-2 mr-2 overflow-hidden">
                    {{ route('base_url') }}/check/{{ $user->link }}
                </h3>
                <button id="copyBtn"
                    class="h-full text-white bg-primary hover:bg-secondary border-l border-gray-200 text-sm font-medium px-5 py-2">Copy</button>
            </div>
            <button id="recreate" value="{{ $user->link_active }}"
                class="m-1 text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">Recreate
                Access Link</button>
            <button id="deactivate"
                class="m-1 text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">
                {{ $user->link_active ? 'Deactivate' : 'Activate' }} Access Link</button>
        </div>
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg w-full">
            <button id="feelLucky"
                class="m-1 text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">
                I'm Feeling Lucky</button>
            <button id="history"
                class="m-1 text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">
                Show History</button>
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

    <div id="history-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 md:inset-0 h-modal md:h-full">
        <div class="relative w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id='historyModalClose' type="button"
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
                    <h2 class="text-xl font-bold mb-4">Last Bet Results</h2>
                    <p id="lastBets" class="font-semibold">100, 234, 900</p>
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

            const historyModalRef = document.getElementById('history-modal');
            const historyModal = new Modal(historyModalRef, {});
            $('#historyModalClose').click((e) => {
                historyModal.hide();
            });

            $("#copyBtn").click(async (e) => {
                var copyText = $("#accesslink").html();
                await navigator.clipboard.writeText(copyText.trim())
                e.target.innerHTML = 'Copied';
                setTimeout(() => {
                    e.target.innerHTML = 'Copy';
                }, 1000);
            })

            $("#recreate").click((e) => {
                $.ajax({
                    url: "{{ route('recreate') }}",
                    type: 'POST',
                    async: true,
                    success: function(res) {
                        if (res.status == 'success') {
                            $("#accesslink").html(BASE_URL + "/check/" + res.response.link)
                        } else {
                            $("#errText").html(res.errMessage);
                            errModal.toggle();
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
                            msg = "Error:" + xhr.status;
                        }
                        $("#errText").html(msg);
                        errModal.toggle();
                    }
                })
            })

            $("#deactivate").click((e) => {
                $.ajax({
                    url: "{{ route('deactivate') }}",
                    type: 'POST',
                    async: true,
                    success: function(res) {
                        if (res.status == 'success') {
                            $("#deactivate").html((res.response.link_active ? 'Deactivate' :
                                'Activate') + ' Access Link')
                        } else {
                            $("#errText").html(res.errMessage);
                            errModal.toggle();
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
                            msg = "Error:" + xhr.status;
                        }
                        $("#errText").html(msg);
                        errModal.toggle();
                    }
                })
            })

            $('#feelLucky').click(e => {
                $.ajax({
                    url: "{{ route('bet') }}",
                    type: 'POST',
                    async: true,
                    success: function(res) {
                        if (res.status == 'success') {
                        } else {
                            $("#errText").html(res.errMessage);
                            errModal.toggle();
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
                            msg = "Error:" + xhr.status;
                        }
                        $("#errText").html(msg);
                        errModal.toggle();
                    }
                })
            });

            $('#history').click(e => {
                $.ajax({
                    url: "{{ route('history_bet') }}",
                    type: 'POST',
                    async: true,
                    success: function(res) {
                        if (res.status == 'success') {
                            var rst = res.response.reduce((sum, item) => sum + item.value + ", ", "");
                            $("#lastBets").html(rst.slice(0, rst.length - 2));
                            historyModal.toggle();
                        } else {
                            $("#errText").html(res.errMessage);
                            errModal.toggle();
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
                            msg = "Error:" + xhr.status;
                        }
                        $("#errText").html(msg);
                        errModal.toggle();
                    }
                })
            });
        })
    </script>
@endsection
