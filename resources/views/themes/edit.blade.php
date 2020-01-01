@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Edit Theme</h2>

        <form method="POST" action="/admin/themes/{{ $theme->id }}">
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
                <label for="inputName" class="col-md-2 col-form-label">Name</label>
                <div class="col-md-10">
                    <input type="text" id="inputName" name="name" placeholder="Name" class="form-control form-control-sm {{ $errors->has('name') ? 'is-invalid' : "" }}" value="{{ $theme->name }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputUrl" class="col-md-2 col-form-label">CDN Url</label>
                <div class="col-md-10">
                    <input type="text" id="inputUrl" name="cdn_url" placeholder="CDN Url" class="form-control form-control-sm {{ $errors->has('cdn_url') ? 'is-invalid' : "" }}" value="{{ $theme->cdn_url }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputDescription" class="col-md-2 col-form-label">Description</label>
                <div class="col-md-10">
                    <input type="text" id="inputDescription" name="description" placeholder="Description" class="form-control form-control-sm {{ $errors->has('description') ? 'is-invalid' : "" }}" value="{{ $theme->description }}">
                </div>
            </div>

            <div class="form-check form-check-inline mb-4">
                <label for="checkboxDefault" class="form-check-label">Make Theme Default</label>
                <input type="hidden" name="is_default" class="form-check-input ml-5" id="checkboxDefault" value="0">
                <input type="checkbox" name="is_default" class="form-check-input ml-5" id="checkboxDefault" {{ $theme->is_default ? 'checked' : '' }} value="1" {{ $theme->is_default ? 'disabled' : '' }}>
            </div>

            <div class="col-md-10 offset-md-2">
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </form>
    </div>

@endsection
