@extends('laracms.dashboard::layouts.app', ['page' => __('admin.menu.mail-template')])

@section('content')
    <div class="form-group">
        <a class="btn btn-success" href="{{ route('laracms.mail-template.create') }}">{{ __('texts.create') }}</a>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>{{ __('texts.icon') }}</th>
                    <th>{{ __('texts.title') }}</th>
                    <th>{{ __('texts.created_at') }}</th>
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
                        <a href="{{ route('laracms.mail-template.edit', $template->id) }}">{{ __('texts.edit') }}</a>
                        |
                        <a onclick="return confirm('Are you sure?')"
                           href="{{ route('laracms.mail-template.destroy', $template->id) }}">{{ __('texts.delete') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $templates->links() }}
    </div>
@endsection
