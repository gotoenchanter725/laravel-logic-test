@extends('layouts.app')

@section('title', 'Admin User')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-primary p-8">
        <div class="max-w-[800px] px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg w-full flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Show User Detail</h2>
                <a class="px-6 py-2 mt-4 text-white bg-primary rounded-lg hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-300"
                    href="{{ route('admin.users.index') }}"> Back</a>
            </div>

            <div class="flex flex-col">
                <div class="flex items-center mb-2">
                    <div class="min-w-[200px] font-semibold text-lg">
                        Name:
                    </div>
                    <div>
                        {{ $user->name }}
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="min-w-[200px] font-semibold text-lg">
                        Phone Number:
                    </div>
                    <div>
                        {{ $user->phone }}
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="min-w-[200px] font-semibold text-lg">
                        Access Link:
                    </div>
                    <div class="overflow-hidden">
                        {{ route('base_url') . '/check/' . $user->link }}
                    </div>
                </div>
                <div class="flex items-center mb-2">
                    <div class="min-w-[200px] font-semibold text-lg">
                        Expires DateTime:
                    </div>
                    <div class="overflow-hidden">
                        {{ $user->expires_at }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(() => {

        })
    </script>
@endsection
