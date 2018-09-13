@extends('laracms.dashboard::layouts.app')

@section('styles')

    <!-- Include external CSS. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

    <!-- Include Editor style. -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_editor.pkgd.min.css"
          rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/css/froala_style.min.css" rel="stylesheet"
          type="text/css"/>

@endsection

@section('scripts')
    <!-- Include external JS libs. -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

    <!-- Include Editor JS files. -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.7.3/js/froala_editor.pkgd.min.js"></script>

    <script> $(function () {
            $('textarea').froalaEditor()
        }); </script>
@endsection

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
                <a class="navbar-brand" href="#">Shops</a>
            </div>
            @include('laracms.dashboard::partials.topnav')
        </div>
    </nav>

    <div class="content">
        <div class="container-fluid">
            <form enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">

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
                                    <textarea name="{{ $locale }}[title]">
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
                                        <textarea name="{{ $locale }}[body]">
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
