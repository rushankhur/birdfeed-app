@extends('layouts.app')

@section('content')

    <div class="container">
        <h2 class="mb-5">Bootstrap Themes Administration</h2>
        <a class="btn btn-primary btn-sm mb-4" href="/admin/themes/create" role="button">Create New</a>

        <table class="table table-hover table-condensed">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">CDN Url</th>
                <th scope="col">Description</th>
                <th scope="col">Is Default</th>
                <th scope="col">Actions</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

                @foreach($themes as $theme)
                    <tr>
                        <td>{{ $theme->name }}</td>
                        <td>{{ $theme->cdn_url }}</td>
                        <td>{{ $theme->description }}</td>
                        <td>{{ $theme->is_default ? 'Yes' : 'No' }}</td>
                        <td>
                            <a class="btn btn-info btn-sm" href="/admin/themes/{{ $theme->id }}/edit" role="button">Edit</a>
                        </td>
                        <td>
                            <button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-id="{{ $theme->id }}" data-target="#deleteModal" onclick="deleteData({{ $theme->id }})">Delete</button>
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
            var url = '{{ route("themes.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit()
        {
            $("#deleteForm").submit();
        }
    </script>
@endsection
