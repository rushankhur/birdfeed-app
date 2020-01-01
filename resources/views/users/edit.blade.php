@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="mb-5">Edit User</h2>

        <form method="POST" action="/admin/users/{{ $user->id }}">
            @method('PATCH')
            {{ csrf_field() }}

            {{--Error message--}}
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group row">
                <label for="inputName" class="col-md-2 col-form-label font-weight-bold">Name</label>
                <div class="col-md-10">
                    <input type="text" id="inputName" name="name" placeholder="Name" class="form-control form-control-sm {{ $errors->has('name') ? 'is-invalid' : "" }}" value="{{ $user->name }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail" class="col-md-2 col-form-label font-weight-bold">Email</label>
                <div class="col-md-10">
                    <input type="text" id="inputEmail" name="email" placeholder="Email" class="form-control form-control-sm {{ $errors->has('email') ? 'is-invalid' : "" }}" value="{{ $user->email }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="checkboxRole" class="col-md-2 col-form-label font-weight-bold">Roles</label>
                <div class="col-md-10">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" {{ $user->hasRole('editor') ? 'checked' : '' }} name="role[]" value="2">User Administrator
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" {{ $user->hasRole('post moderator') ? 'checked' : '' }} name="role[]" value="3">Post Moderator
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" {{ $user->hasRole('theme manager') ? 'checked' : '' }} name="role[]" value="4">Theme Manager
                        </label>
                    </div>
                </div>
            </div>

            <div class="col-md-10 offset-md-2">
                <button type="submit" name="submit" class="btn btn-primary btn-sm mt-3">Update</button>
            </div>
        </form>
    </div>

@endsection
