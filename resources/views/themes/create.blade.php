@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="mb-5">Bootstrap Themes Administration - Create</h2>
        <form method="POST" action="/admin/themes">
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
                    <input type="text" id="inputName" name="name" placeholder="Name" class="form-control form-control-sm {{ $errors->has('name') ? 'is-invalid' : "" }}" value="{{ old('name') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputUrl" class="col-md-2 col-form-label font-weight-bold">CDN Url</label>
                <div class="col-md-10">
                    <input type="text" id="inputUrl" name="cdn_url" placeholder="CDN Url" class="form-control form-control-sm {{ $errors->has('cdn_url') ? 'is-invalid' : "" }}" value="{{ old('cdn_url') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputDescription" class="col-md-2 col-form-label font-weight-bold">Description</label>
                <div class="col-md-10">
                    <input type="text" id="inpuDescription" name="description" placeholder="Description" class="form-control form-control-sm {{ $errors->has('description') ? 'is-invalid' : "" }}" value="{{ old('description') }}">
                </div>
            </div>

            <div class="form-check form-check-inline mb-4">
                <label for="checkboxDefault" class="form-check-label font-weight-bold">Make Theme Default</label>
                <input type="hidden" name="is_default" class="form-check-input ml-5" id="checkboxDefault" value="0">
                <input type="checkbox" name="is_default" class="form-check-input ml-5" id="checkboxDefault" value="1">
            </div>

            <div class="col-md-10 offset-md-2">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>

        <p class="mt-5">
            <b>CDN Url</b>: Please use the <a href="https://www.bootstrapcdn.com/bootswatch/">BootstrapCDN</a> website
            to find 'CDN Url'. You can copy any link which you like and then paste it into 'CDN Url' field. For example:
            https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/cerulean/bootstrap.min.css for the 'Cerulean' theme.
        </p>

    </div>

@endsection
