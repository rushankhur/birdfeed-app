@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="mb-5">User Administration</h2>

        <div class="row mb-4">
            <div class="col-md-4">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group mb-3">
                        <input class="form-control form-control-sm" type="text" name="q"  placeholder="Find By Name and Email">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{--Search users by name or email output--}}
        <div class="container">
            @if(isset($details))
                <p class="mb-5"> The Search results for your query <b>"{{ $query }}"</b> are :</p>
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
                    @foreach($details as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="/admin/users/{{ $user->id }}/edit" role="button">Edit</a>
                            </td>
                            <td>
                                <form method="POST" action="/admin/users/{{ $user->id }}">
                                    @method('DELETE')
                                    {{ csrf_field() }}

                                    <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
