@extends('layouts.app')

@section('title', 'Admin User Edit')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-primary p-8">
        <div class="max-w-[800px] px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg w-full flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">Edit User</h2>
                <a class="px-6 py-2 mt-4 text-white bg-primary rounded-lg hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-300"
                    href="{{ route('admin.users.index') }}"> Back</a>
            </div>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <span class="font-bold">Whoops!</span> There were some problems with your input.
                    <ul class="my-4">
                        @foreach ($errors->all() as $error)
                            <div class="p-4 mb-2 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                                role="alert">
                                <span class="font-medium mr-2">Error!</span>{{ $error }}
                            </div>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="flex flex-col">
                    <div class="flex items-center mb-2">
                        <div class="min-w-[200px] font-semibold text-lg">
                            Name:
                        </div>
                        <div>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                placeholder="Name">
                        </div>
                    </div>
                    <div class="flex items-center mb-2">
                        <div class="min-w-[200px] font-semibold text-lg">
                            Phone Number:
                        </div>
                        <div>
                            <input type="tel" class="form-control" name="phone" placeholder="Phone Number"
                                value="{{ $user->phone }}" />
                        </div>
                    </div>
                    <div class="flex items-center mb-2 text-center">
                        <button type="submit"
                            class="px-6 py-2 mt-4 text-white bg-primary rounded-lg hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-300">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        $(document).ready(() => {

        })
    </script>
@endsection
