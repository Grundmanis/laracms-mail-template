@extends(view()->exists('laracms.dashboard.layouts.app') ? 'laracms.dashboard.layouts.app' : 'laracms.dashboard::layouts.app', ['page' => __('laracms::admin.menu.mail-template')] )

@section('content')
    <form enctype="multipart/form-data" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('laracms::admin.menu.mail-template') }}</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="image" class="col-form-label text-md-right">{{ __('laracms::admin.icon') }}</label>
                    <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                        <div class="fileinput-new thumbnail">
                            @if(isset($template))
                                <img src="{{ asset($template->icon) }}" alt="">
                            @else
                                <img src="{{ asset('laracms_assets/img/image_placeholder.jpg') }}" alt="...">
                            @endif
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        <div>
                        <span class="btn btn-rose btn-round btn-file">
                          <span class="fileinput-new">{{ __('laracms::admin.select_image') }}</span>
                          <span class="fileinput-exists">{{ __('laracms::admin.change') }}</span>
                          <input name="icon" type="file" id="image" />
                        </span>
                            <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput">
                                <i class="fa fa-times"></i> {{ __('laracms::admin.remove') }}</a>
                        </div>
                    </div>
                </div>
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <ul id="tabs" class="nav nav-tabs" role="tablist">
                            @foreach($locales as $key => $locale)
                                <li class="nav-item">
                                    <a class="nav-link @if(!$key) active @endif" data-toggle="tab" href="#{{ $locale }}"
                                       role="tab" aria-expanded="true">{{ $locale }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="my-tab-content" class="tab-content text-center">
                    @foreach($locales as $key => $locale)
                        <div class="tab-pane @if(!$key) active @endif" id="{{ $locale }}" role="tabpanel"
                             aria-expanded="true">
                            <div class="form-group">
                                <label title="title">{{ __('laracms::admin.title') }}</label>
                                <textarea class="form-control" name="{{ $locale }}[title]">{{ formValue($template ?? null, 'title', $locale) }}</textarea>
                            </div>
                            <div class="form-group">
                                <label title="value">{{ __('laracms::admin.value') }}</label>
                                <textarea class="form-control" name="{{ $locale }}[body]">{{ formValue($template ?? null, 'body', $locale) }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ __('laracms::admin.save') }}</button>

    </form>
@endsection
