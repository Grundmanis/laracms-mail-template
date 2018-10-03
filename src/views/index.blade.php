@extends('laracms.dashboard::layouts.app', ['page' => 'Mail Templates'])

@section('content')

    <div class="content">
        <div class="container-fluid">

            <div class="form-group">
                <a class="btn btn-success" href="{{ route('laracms.mail-template.create') }}">Create</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Created at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($templates as $template)
                        <tr>
                            <td>{{ $template->id }}</td>
                            <td><img width="100" src="{{ asset($template->icon) }}" alt=""></td>
                            <td>{{ $template->title }}</td>
                            <td>{{ $template->created_at }}</td>
                            <td>
                                <a href="{{ route('laracms.mail-template.edit', $template->id) }}">Edit</a>
                                |
                                <a onclick="return confirm('Are you sure?')"
                                   href="{{ route('laracms.mail-template.destroy', $template->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $templates->links() }}
            </div>
        </div>
    </div>
@endsection
