@extends('laracms.dashboard::layouts.app')

@section('content')

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar1"></span>
                    <span class="icon-bar bar2"></span>
                    <span class="icon-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="#">Mail Templates</a>
            </div>
            @include('laracms.dashboard::partials.topnav')
        </div>
    </nav>

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
