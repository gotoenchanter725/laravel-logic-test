@extends('layouts.app')

@section('title', 'Main')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-primary p-8">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg w-full flex flex-wrap">
            <div
                class="m-1 flex items-center max-w-[300px] border overflow-hidden text-gray-500 dark:text-gray-400 border-solid border-gray-200 rounded-lg">
                <h3 id="accesslink" class="text-base px-2 mr-2 overflow-hidden">
                    https://check/{{ $user->link }}
                </h3>
                <button id="copyBtn"
                    class="h-full text-white bg-primary hover:bg-secondary border-l border-gray-200 text-sm font-medium px-5 py-2">Copy</button>
            </div>
            <button id="recreate"
                class="m-1 text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">Recreate
                Access Link</button>
            <button id="deactivate"
                class="m-1 text-white bg-primary hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5">Deactivte
                Access Link</button>
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

    <script>
        const BASE_URL = "{{ route('base_url') }}";
        $(document).ready(() => {
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
                        console.log(res);
                    }
                })
            })

            $("#deactivate").click((e) => {
                $.ajax({
                    url: "{{ route('deactivate') }}",
                    type: 'POST',
                    async: true,
                    success: function(res) {
                        console.log(res);
                    }
                })
            })
        })
    </script>
@endsection
