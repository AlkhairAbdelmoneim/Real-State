@extends('layouts/master')

@section('navbar')

    @include('layouts._navbar2')

@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('front/css/digrams_info.css') }}">
@endsection

@section('title')
    <title>
        @lang('site.Allbuilding')
    </title>
@endsection

@section('content')

    <!-- Start digram -->
    <div class="digram">
        <div class="container">
            <div class="row">

                @include('front.bu._siteMenu')

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @if (!session('success'))
                    <div class="col-md-8 fl-left">
                        <div class="container">
                            <div class="row">

                                @include('partials._errors')

                                <form action="{{ route('userbuUpdate',$buInfo->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('post') }}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('site.name')</label>
                                                <small id="bu_name_error" class="text-danger"></small>
                                                <input type="text" name="bu_name" class="form-control"
                                                    value="{{ $buInfo->bu_name }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('site.bu_place')</label>
                                                <select name="bu_place" class="form-control select2"
                                                    style="height: 40px !important;">
                                                    <option value="" disabled selected hidden>@lang('site.bu_place')...
                                                    </option>
                                                    @foreach (getBuPlace() as $value)
                                                        <option value="{{ $value }}" @if ($value == $buInfo->bu_place) selected @endif>{{ $value }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('site.bu_square')</label>
                                                <small id="bu_square_error" class="text-danger"></small>
                                                <input type="text" name="bu_square" class="form-control"
                                                    value="{{ $buInfo->bu_square }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('site.rooms')</label>
                                                <small id="rooms_error" class="text-danger"></small>
                                                <input type="text" name="rooms" class="form-control"
                                                    value="{{ $buInfo->rooms }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('site.bu_langtude')</label>
                                                <small id="bu_langtude_error" class="text-danger"></small>
                                                <input type="text" name="bu_langtude" class="form-control"
                                                    value="{{ $buInfo->bu_langtude }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('site.bu_latitude')</label>
                                                <small id="bu_latitude_error" class="text-danger"></small>
                                                <input type="text" name="bu_latitude" class="form-control"
                                                    value="{{ $buInfo->bu_latitude }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('site.bu_price')</label>
                                                <small id="bu_price_error" class="text-danger"></small>
                                                <input type="text" name="bu_price" class="form-control"
                                                    value="{{ $buInfo->bu_price }}">
                                            </div>
                                        </div>

                                        @if (asset('user') <= 0)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="projectinput2">@lang('site.bu_status')</label>
                                                    <select name="bu_status" class="form-control" style="height: 40px">
                                                        <option value="1">مفعل</option>
                                                        <option value="0">غير مفعل</option>
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="row">
                                        @php
                                            $data = ['فيله', 'شقه', 'دكان'];
                                        @endphp

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput2">@lang('site.bu_type')</label>
                                                <select name="bu_type" class="form-control" style="height: 40px">
                                                    @foreach ($data as $key => $value)
                                                        <option value="{{ $key }}" @if ($key == $buInfo->bu_type) selected @endif>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="projectinput2">@lang('site.bu_rent')</label>
                                                <select name="bu_rent" class="form-control" style="height: 40px">
                                                    @foreach (getBuRent() as $key => $value)
                                                        <option value="{{ $key }}" @if ($key == $buInfo->bu_rent) selected @endif>{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('site.bu_image')</label>
                                        <input type="file" name="bu_image" class="form-control demo thumbnail" multiple
                                            data-jpreview-container="#demo-1-container" alt="Not image found">
                                    </div>

                                    <div id="demo-1-container" class="jpreview-container image">
                                        <img src="{{ $buInfo->image_path }}" style="width: 100px;"
                                            class="thumbnail image-preview" alt="Not image found">
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('site.bu_larg_dis')</label>
                                        <small id="bu_larg_dis_error" class="text-danger"></small>
                                        <textarea name="bu_larg_dis" id="textarea1" class="form-control" cols="4"
                                            rows="4">{{ $buInfo->bu_larg_dis }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('site.bu_meta')</label>
                                        <small id="bu_meta_error" class="text-danger"></small>
                                        <textarea name="bu_meta" id="textarea2" class="form-control" cols="4"
                                            rows="4">{{ $buInfo->bu_meta }}</textarea>
                                    </div>

                                    @if (asset('user') <= 0)
                                        <div class="form-group">
                                            <label>@lang('site.bu_smail_dis')</label>
                                            <textarea name="bu_smail_dis" id="textarea" class="form-control" cols="4"
                                                rows="4"></textarea>
                                            <span style="color: #f03">{{ 'لا يمكن إضافة أكثر من 160 حرف !' }}</span>
                                        </div>
                                    @endif


                                    <div class="form-group">
                                        <button type="submit" class="btn button-effect from-top"><i
                                                class=" fa fa-plus">@lang('site.edit')</i></button>
                                    </div>

                                    <div class="alert alert-success" id="success-msg"
                                        style="display: none; margin-top: 20px">
                                        <span id="success"></span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <!-- End digram -->

    <!-- Start contact us -->
    <div class="call-us">
        <div class="container">
            <div class="row">
                <div class="col-md-6 box1">
                    <p class="color-white">أي سؤال أي إستفسار لا تتردد إتصل بنا</p>
                </div>
                <div class="col-md-6 box2">
                    <button class="color-white">إتصل بنا</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End contact us -->
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        use = "strict";

        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "منطقة العقار",
                allowClear: true
            });

        });
    </script>
@endsection
