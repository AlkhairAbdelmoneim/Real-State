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
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.site_setting')<small
                            style="color: #f03">{{ ' ' . $siteSettings->total() }}</small></h3>

                    <form action="{{ route('settings.index') }}" method="GET">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" value="{{ request()->search }}"
                                        placeholder="@lang('site.search')">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-primary btn-flat">@lang('site.search')</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body">

                    @if (isset($siteSettings) && $siteSettings->count() > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.name')</th>
                                    <th>@lang('site.value')</th>
                                    <th>@lang('site.value')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($siteSettings as $index => $setting)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $setting->slug }}</td>
                                        @if ($setting->type != 2)
                                            <td>{!! $setting->value !!}</td>

                                        @else
                                            <td><img src="{{ $setting->image_path }}" alt="No image available"
                                                    style="width: 100px" class="img-thumbnail"></td>
                                        @endif

                                        <td>
                                            <a href="{{ route('settings.edit', $setting->id) }}"
                                                class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>

                                            <form method="post" action="{{ route('settings.destroy', $setting->id) }}"
                                                style="display: inline-block">
                                                @csrf
                                                {{ method_field('delete') }}

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-danger delete btn-sm"><i
                                                            class="fa fa-trash"></i>@lang('site.delete')</button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="content-center">
                            {{ $siteSettings->appends(request()->query())->links() }}
                        </div>
                    @else
                        <h2> @lang('site.no_data_found')</h2>
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
