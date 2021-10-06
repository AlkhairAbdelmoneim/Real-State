@extends('layouts.dashboard.app')
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
                    <h3 class="box-title" style="margin-bottom: 15px">@lang('site.add') {{-- <small>Quick Exapm</small> --}}</h3>
                </div>
                <!----End box of header----->
                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('building.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('post') }}

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.name')</label>
                                <input type="text" name="bu_name" class="form-control" value="{{ old('bu_name') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.bu_place')</label>
                                <select name="bu_place" class="form-control select2" style="height: 40px !important;">
                                    <option value="" disabled selected hidden>@lang('site.bu_place')...
                                    </option>
                                    @foreach (getBuPlace() as $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.bu_square')</label>
                                <input type="text" name="bu_square" class="form-control" value="{{ old('bu_square') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.rooms')</label>
                                <input type="text" name="rooms" class="form-control" value="{{ old('rooms') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.bu_langtude')</label>
                                <input type="text" name="bu_langtude" class="form-control"
                                    value="{{ old('bu_langtude') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.bu_latitude')</label>
                                <input type="text" name="bu_latitude" class="form-control"
                                    value="{{ old('bu_latitude') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>@lang('site.bu_price')</label>
                                <input type="text" name="bu_price" class="form-control" value="{{ old('bu_price') }}">
                            </div>
                        </div>

                        @if (Auth()->user()->admin == 1)
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

                        @php
                            $data = ['فيله', 'شقه', 'دكان'];
                        @endphp

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput2">@lang('site.bu_type')</label>
                                <select name="bu_type" class="form-control" style="height: 40px">
                                    @foreach ($data as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @php
                            $data = ['تمليك', 'إيجار'];
                        @endphp
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="projectinput2">@lang('site.bu_rent')</label>
                                <select name="bu_rent" class="form-control" style="height: 40px">
                                    @foreach ($data as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.photo')</label>
                            <input type="file" name="bu_image" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('uploads/img/default.png') }}" style="width: 100px;"
                                class="thumbnail image-preview" alt="">
                        </div>

                        {{-- <div class="form-group">
                            <label>@lang('site.bu_image')</label>
                            <input type="file" name="bu_image" class="form-control image" multiple
                                data-jpreview-container="#demo-1-container">
                        </div>

                        <div id="demo-1-container" class="jpreview-container image">
                            <img src="{{ asset('uploads/img/default.png') }}" style="width: 100px;"
                                class="thumbnail image-preview" alt="">
                        </div> --}}

                        <div class="form-group">
                            <label>@lang('site.bu_larg_dis')</label>
                            <textarea name="bu_larg_dis" id="" class="form-control" cols="4" rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label>@lang('site.bu_meta')</label>
                            <textarea name="bu_meta" id="" class="form-control" cols="4" rows="4"></textarea>
                        </div>

                        @if (Auth()->user()->admin == 1)
                            <div class="form-group">
                                <label>@lang('site.bu_smail_dis')</label>
                                <textarea name="bu_smail_dis" id="" class="form-control" cols="4" rows="4"></textarea>
                                <span style="color: #f03">{{ 'لا يمكن إضافة أكثر من 160 حرف !' }}</span>
                            </div>
                        @endif


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i
                                    class=" fa fa-plus">@lang('site.add')</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
