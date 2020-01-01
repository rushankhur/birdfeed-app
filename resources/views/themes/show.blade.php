@extends('themes.layout')

@section('content')
    <h1>{{ $theme->name }}</h1>

    <div class="mt-4">{{ $theme->cdn_url }}</div>
    <div class="mt-4">{{ $theme->description }}</div>


    <p class="mt-4">
        <a href="/admin/themes/{{ $theme->id }}/edit">Edit</a>
    </p>
@endsection
