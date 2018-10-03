@extends('laracms.dashboard::layouts.app', ['page' => 'Mail Templates'])

@include('laracms.dashboard::partials.summernote')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <form enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('form.icon') }}</label>
                            <div class="col-md-6">
                                <input class="form-control" id="icon" type="file" name="icon">
                            </div>
                            @if(isset($template))
                                <img width="300" src="{{ asset($template->icon) }}" alt="">
                            @endif
                        </div>


                        <!-- Nav tabs -->
                        <div class="form-group">
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach($locales as $key => $locale)
                                    <li role="presentation" @if(!$key) class="active" @endif>
                                        <a href="#title_{{ $locale }}" data-toggle="tab">
                                            {{ $locale }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <label title="value">Title</label>

                            @foreach($locales as $key => $locale)
                                <div class="tab-pane @if(!$key) active @endif" id="title_{{ $locale }}">
                                    <div class="form-group">
                                    <textarea class="summernote" name="{{ $locale }}[title]">
                                        {{ formValue($template ?? null, 'title', $locale) }}
                                    </textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                        <!-- Nav tabs -->
                        <div class="form-group">
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach($locales as $key => $locale)
                                    <li role="presentation" @if(!$key) class="active" @endif>
                                        <a href="#{{ $locale }}" data-toggle="tab">
                                            {{ $locale }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <label title="value">Value</label>

                            @foreach($locales as $key => $locale)
                                <div class="tab-pane @if(!$key) active @endif" id="{{ $locale }}">
                                    <div class="form-group">
                                        <textarea class="summernote" name="{{ $locale }}[body]">
                                            {{ formValue($template ?? null, 'body', $locale) }}
                                        </textarea>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('menu.save') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
