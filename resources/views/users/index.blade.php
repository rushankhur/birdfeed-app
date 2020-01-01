@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="mb-5">User Administration</h2>

        <div class="row mb-4">
            <div class="col-md-4">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input class="form-control form-control-sm" type="text" name="q" placeholder="Find By Name and Email">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary btn-sm" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <table class="table table-hover table-condensed">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a class="btn btn-info btn-sm" href="/admin/users/{{ $user->id }}/edit" role="button">Edit</a>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-id="{{ $user->id }}" data-target="#deleteModal" onclick="deleteData({{ $user->id }})">Delete</button>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <!-- Modal 'Delete confirmation' -->
    @include('modals.delete')


    <script type="text/javascript">
        function deleteData(id)
        {
            var id = id;
            var url = '{{ route("users.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>
@endsection
