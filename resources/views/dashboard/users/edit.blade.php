@extends('layouts.dashboard.app')
@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.users')</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminbanel') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{ route('users.index') }}">@lang('site.users')</a></li>
                <li class="active">@lang('site.edit')</li>
            </ol>
        </section>
        <section class="content">

            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title" style="margin-bottom: 15px">@lang('site.edit') {{-- <small>Quick Exapm</small> --}}</h3>
                        </div>
                        <!----End box of header----->
                        <div class="box-body">

                            @include('partials._errors')

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                {{ method_field('put') }}

                                <div class="form-group">
                                    <label>@lang('site.name')</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label>@lang('site.email')</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                </div>

                                <div class="form-group">
                                    <label>@lang('site.password')</label>
                                    <input type="password" name="new_password" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary"><i
                                            class=" fa fa-plus">@lang('site.edit')</i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title" style="margin-bottom: 15px">@lang('site.edit') {{-- <small>Quick Exapm</small> --}}</h3>
                        </div>
                        <!----End box of header----->
                        <div class="box-body">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1-1" data-toggle="tab" aria-expanded="true">عقارات
                                            مفعلة</a>
                                    </li>
                                    <li class="card-li"><a href="#tab_2-2" data-toggle="tab" aria-expanded="false">عقارات
                                            غير
                                            مفعلة</a>
                                    </li>

                                    <li class="pull-right header"><i class="fa fa-building"></i>عقاراتي</li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1-1">

                                        @if (isset($buactive) && $buactive->count() > 0)
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>@lang('site.bu_name')</th>
                                                        <th>@lang('site.bu_place')</th>
                                                        <th>@lang('site.bu_price')</th>
                                                        <th>@lang('site.bu_rent')</th>
                                                        <th>@lang('site.bu_date')</th>
                                                        <th>@lang('site.action')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($buactive as $index => $value)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $value->bu_name }}</td>
                                                            <td>{{ $value->bu_place }}</td>
                                                            <td>{{ $value->bu_price }}</td>
                                                            <td>{{ $value->getBuRent() }}</td>
                                                            <td>{{ $value->created_at->toFormattedDateString() }}</td>
                                                            <td>
                                                                <a href="{{ route('changeStatus', $value->id) }}"
                                                                    class="btn btn-success btn-sm">
                                                                    @if ($value->bu_status == 1)
                                                                        {{ getStatus()[1] }}
                                                                    @endif
                                                                </a>

                                                                <a href="{{ route('building.edit', $value->id) }}"
                                                                    class="btn btn-info btn-sm"><i
                                                                        class="fa fa-edit"></i>@lang('site.edit')</a>

                                                                <form method="post"
                                                                    action="{{ route('building.destroy', $value->id) }}"
                                                                    style="display: inline-block">
                                                                    @csrf
                                                                    {{ method_field('delete') }}
                                                                    @if ($user->id != 1)
                                                                        <div class="form-group">
                                                                            <button type="submit"
                                                                                class="btn btn-danger delete btn-sm"><i
                                                                                    class="fa fa-trash"></i>@lang('site.delete')</button>
                                                                        </div>
                                                                    @else
                                                                        <span class="btn btn-danger btn-sm disabled"><i
                                                                                class="fa fa-trash"></i>@lang('site.delete')</span>
                                                                    @endif
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <div class="content-center">
                                                {{ $buactive->appends(request()->query())->links() }}
                                            </div>

                                        @else
                                            <span> @lang('site.no_data_found')</span>
                                        @endif

                                    </div><!-- /.tab-pane -->

                                    <div class="tab-pane" id="tab_2-2">

                                        @if (isset($bunotacitve) && $bunotacitve->count() > 0)
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>@lang('site.bu_name')</th>
                                                        <th>@lang('site.bu_place')</th>
                                                        <th>@lang('site.bu_price')</th>
                                                        <th>@lang('site.bu_rent')</th>
                                                        <th>@lang('site.bu_date')</th>
                                                        <th>@lang('site.bu_status')</th>
                                                        <th>@lang('site.action')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($bunotacitve as $index => $value)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $value->bu_name }}</td>
                                                            <td>{{ $value->bu_place }}</td>
                                                            <td>{{ $value->bu_price }}</td>
                                                            <td>{{ $value->getBuRent() }}</td>
                                                            <td>{{ $value->created_at->toFormattedDateString() }}</td>
                                                            <td>
                                                                <a href="{{ route('changeStatus', $value->id) }}"
                                                                    class="btn btn-warning btn-sm">
                                                                    @if ($value->bu_status == 0)
                                                                        {{ getStatus()[0] }}
                                                                    @endif
                                                                </a>

                                                                <a href="{{ route('building.edit', $value->id) }}"
                                                                    class="btn btn-info btn-sm"><i
                                                                        class="fa fa-edit"></i>@lang('site.edit')</a>

                                                                <form method="post"
                                                                    action="{{ route('building.destroy', $value->id) }}"
                                                                    style="display: inline-block">
                                                                    @csrf
                                                                    {{ method_field('delete') }}
                                                                    @if ($user->id != 1)
                                                                        <div class="form-group">
                                                                            <button type="submit"
                                                                                class="btn btn-danger delete btn-sm"><i
                                                                                    class="fa fa-trash"></i>@lang('site.delete')</button>
                                                                        </div>
                                                                    @else
                                                                        <span class="btn btn-danger btn-sm disabled"><i
                                                                                class="fa fa-trash"></i>@lang('site.delete')</span>
                                                                    @endif
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <div class="content-center clearfix">
                                                {{ $bunotacitve->appends(request()->query())->links() }}
                                            </div>

                                        @else
                                            <span> @lang('site.no_data_found')</span>
                                        @endif

                                    </div><!-- /.tab-pane -->
                                </div><!-- /.tab-content -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>
    </div>
@endsection
