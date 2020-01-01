@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="mb-5">Create a New Post</h2>
        <form method="POST" action="/posts">
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
                <label for="inputTitle" class="col-md-2 col-form-label font-weight-bold">Title</label>
                <div class="col-md-10">
                    <input type="text" id="inputTitle" name="title" placeholder="Title" class="form-control form-control-sm {{ $errors->has('title') ? 'is-invalid' : "" }}" value="{{ old('title') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputImageUrl" class="col-md-2 col-form-label font-weight-bold">Image Url</label>
                <div class="col-md-10">
                    <input type="text" id="inputImageUrl" name="image_url" placeholder="Image Url" class="form-control form-control-sm {{ $errors->has('image_url') ? 'is-invalid' : "" }}" value="{{ old('image_url') }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputContent" class="col-md-2 col-form-label font-weight-bold">Content</label>
                <div class="col-md-10">
                    <input type="text" id="inputContent" name="content" placeholder="Content" class="form-control form-control-sm {{ $errors->has('content') ? 'is-invalid' : "" }}" value="{{ old('content') }}">
                </div>
            </div>

            <div class="col-md-10 offset-md-2">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>

        <p class="mt-5">
            <b>Image Url</b>: To find image Url you can search any bird name. For instance, google
            'parrot' and go to the 'Images' section at the top of Google search. Then if you click on your favorite image,
            you can see increased image on the right. Right mouse click on it and choose 'Copy image address'. Then paste
            this image address into 'Image Url' field.<br/><br/>
            Sometimes image links may be broken. A correct image link should contain .jpg or .png in the end.

        </p>

    </div>

@endsection
