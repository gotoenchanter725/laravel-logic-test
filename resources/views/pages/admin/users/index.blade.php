@extends('layouts.app')

@section('title', 'Admin Users')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-primary p-8">
        <div class="max-w-[800px] px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg w-full flex flex-col">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold">All Users</h2>
                <a class="px-6 py-2 mt-4 text-white bg-primary rounded-lg hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-300"
                    href="{{ route('admin.users.create') }}"> Create New User</a>
            </div>

            @if ($message = Session::get('success'))
                <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800"
                    role="alert">
                    <span class="font-medium mr-2">Success!</span>{{ $message }}
                </div>
            @endif

            <table class="border bordersolid border-primary rounded-lg mb-4">
                <tr>
                    <th class="px-4 py-2.5 text-center border-r border-solid border-primary">No</th>
                    <th class="px-4 py-2.5 text-center border-r border-solid border-primary">Name</th>
                    <th class="px-4 py-2.5 text-center border-r border-solid border-primary">Phone Number</th>
                    <th class="px-4 py-2.5 text-center w-[250px]">Action</th>
                </tr>
                @foreach ($users as $user)
                    <tr class="border-t border-solid border-primary">
                        <td class="px-4 border-r border-solid border-primary">{{ ++$i }}</td>
                        <td class="px-4 border-r border-solid border-primary">{{ $user->name }}</td>
                        <td class="px-4 border-r border-solid border-primary">{{ $user->phone }}</td>
                        <td class="px-4 py-1">
                            <form class="flex justify-center w-full" action="{{ route('admin.users.destroy', $user->id) }}"
                                method="POST">

                                <a class="mx-1 px-4 py-2 text-white text-sm bg-primary rounded-lg hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-300 btn-info"
                                    href="{{ route('admin.users.show', $user->id) }}">Show</a>

                                <a class="mx-1 px-4 py-2 text-white text-sm bg-primary rounded-lg hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-300 btn-primary"
                                    href="{{ route('admin.users.edit', $user->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="mx-1 px-4 py-2 text-white text-sm bg-primary rounded-lg hover:bg-secondary focus:ring-4 focus:outline-none focus:ring-gray-300 btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

            <div class="">
                {!! $users->links() !!}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(() => {

        })
    </script>
@endsection
