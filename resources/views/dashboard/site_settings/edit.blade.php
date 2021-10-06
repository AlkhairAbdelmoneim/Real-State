@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.site_setting')</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminbanel') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li class="active">@lang('site.site_setting')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.edit_setting')<small
                            style="color: #f03">{{-- ' '.$users->total() --}}</small></h3>
                </div>
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('settings.update', $setting->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>{{ $setting->slug }}</label>

                            @if ($setting->type == 0)
                                <input type="text" name="namesetting[{{ $setting->namesetting }}]" class="form-control"
                                    value="{{ $setting->value }}" required>
                            @else
                                @if ($setting->type == 1)
                                    <textarea name="namesetting[{{ $setting->namesetting }}]" id=""
                                        class="form-control ckeditor" cols="4" rows="4" required>
                                            {!! $setting->value !!}
                                        </textarea>
                                @endif
                            @endif
                            @if ($setting->type == 2)
                                <div class="form-group">
                                    <input type="file" name="main_slider" class="form-control demo" multiple
                                        data-jpreview-container="#demo-1-container">
                                </div>

                                <div id="demo-1-container" class="jpreview-container image">
                                    <img src="{{ $setting->image_path }}" style="width: 100px;"
                                        class="thumbnail image-preview" alt="">
                                </div>

                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i
                                    class=" fa fa-plus">@lang('site.edit')</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
