@extends('layouts.app')

@section('title', 'Admin Users')

@section('content')
    <div class="flex flex-col items-center justify-center min-h-screen bg-primary p-8">
        <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg w-full flex">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Laravel 8 CRUD Example from scratch - ItSolutionStuff.com</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-success" href="{{ route('admin.users.create') }}"> Create New User</a>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">

                                <a class="btn btn-info" href="{{ route('admin.users.show', $user->id) }}">Show</a>

                                <a class="btn btn-primary" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script>
        $(document).ready(() => {

        })
    </script>
@endsection
