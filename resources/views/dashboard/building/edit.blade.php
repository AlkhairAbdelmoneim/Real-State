@extends('layouts.dashboard.app')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('front/css/digrams_info.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <section class='content-header'>
            <h1>@lang('site.building')</h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('adminbanel') }}"><i class="fa fa-dashboard"></i>@lang('site.dashboard')</a></li>
                <li><a href="{{ route('building.index') }}">@lang('site.building')</a></li>
                <li class="active">@lang('site.add')</li>
            </ol>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.edit') {{-- <small>Quick Exapm</small> --}}</h3>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box-header">
                                <h3 class="box-title">معلومات صاحب العقار</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body no-padding">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>@lang('site.name')</th>
                                                    <th>@lang('site.email')</th>
                                                    <th>@lang('site.action')</th>
                                                </tr>
                                            <tbody>
                                                <tr>
                                                    @foreach ($user_info as $key => $info)
                                                        <td>{{ $info['name'] }}</td>
                                                        <td>{{ $info['email'] }}</td>
                                                        <td>
                                                            <a href="{{ route('users.edit', Auth()->user()->id) }}"
                                                                class="btn btn-info btn-sm">@lang('site.moere-info')</a>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            </tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div><!-- /.box-body -->
                        </div>
                    </div>
                </div>
                <!----End box of header----->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('building.update', $building->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.name')</label>
                                <input type="text" name="bu_name" class="form-control" value="{{ $building->bu_name }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.bu_square')</label>
                                <input type="text" name="bu_square" class="form-control"
                                    value="{{ $building->bu_square }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.rooms')</label>
                                <input type="text" name="rooms" class="form-control" value="{{ $building->rooms }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.bu_price')</label>
                                <input type="text" name="bu_price" class="form-control"
                                    value="{{ $building->bu_price }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.bu_langtude')</label>
                                <input type="text" name="bu_langtude" class="form-control"
                                    value="{{ $building->bu_langtude }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.bu_latitude')</label>
                                <input type="text" name="bu_latitude" class="form-control"
                                    value="{{ $building->bu_latitude }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.bu_latitude')</label>
                                <select name="bu_place" class="form-control select2" style="height: 40px">
                                    <option value="" disabled selected hidden>@lang('site.bu_place')...</option>
                                    @foreach (getBuPlace() as $value)
                                        <option value="{{ $value }}" @if ($building->bu_place == $value) selected @endif>
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.bu_image')</label>
                                <input type="file" name="bu_image" class="form-control demo" multiple
                                    data-jpreview-container="#demo-1-container">
                            </div>

                            <div id="demo-1-container" class="jpreview-container image">
                                <img src="{{ $building->image_path }}" style="width: 100px;"
                                    class="thumbnail image-preview" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.bu_larg_dis')</label>
                            <textarea name="bu_larg_dis" id="" class="form-control" cols="4"
                                rows="4">{{ $building->bu_larg_dis }}</textarea>
                        </div>


                        <div class="form-group">
                            <label>@lang('site.bu_meta')</label>
                            <textarea name="bu_meta" id="" class="form-control" cols="4"
                                rows="4">{{ $building->bu_meta }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.bu_smail_dis')</label>
                            <textarea name="bu_smail_dis" id="" class="form-control" cols="4"
                                rows="4">{{ $building->bu_smail_dis }}</textarea>
                            <span style="color: #f03">{{ 'لا يمكن إضافة أكثر من 160 حرف !' }}</span>
                        </div>

                        <div class="form-group">
                            <label for="projectinput2">@lang('site.bu_status')</label>
                            <select name="bu_status" class="form-control" style="height: 40px">
                                @foreach (getStatus() as $key => $value)
                                    <option value="{{ $key }}" @if ($building->bu_status == $key) selected @endif>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        @php
                            $data = ['فيله', 'شقه', 'دكان'];
                        @endphp
                        <div class="form-group">
                            <label for="projectinput2">@lang('site.bu_type')</label>
                            <select name="bu_type" class="form-control" style="height: 40px">
                                @foreach ($data as $key => $value)
                                    <option value="{{ $key }}" @if ($building->getType() == $value) selected @endif>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        @php
                            $data_rent = ['تمليك', 'إيجار'];
                        @endphp
                        <div class="form-group">
                            <label for="projectinput2">@lang('site.bu_rent')</label>
                            <select name="bu_rent" class="form-control" style="height: 40px">
                                @foreach ($data_rent as $key => $value)
                                    <option value="{{ $key }}" @if ($building->bu_rent == $key) selected @endif>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
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

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "منطقة العقار",
                allowClear: true
            });

        });
    </script>
@endsection
