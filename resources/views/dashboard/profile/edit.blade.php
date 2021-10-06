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

                <div class="col-md-8 fl-left">
                    <div class="container">
                        <div class="row">

                            @include('partials._errors')

                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            @if (!session('success'))

                                <form action="{{ route('updateUserInfo') }}" method="POST">
                                    @csrf
                                    {{ method_field('post') }}

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('site.name')</label>
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $user['name'] }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('site.email')</label>
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ $user['email'] }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>@lang('site.new_password')</label>
                                            <input type="password" name="new_password" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn button-effect from-top"><i
                                                class=" fa fa-plus">{{ ' ' }}@lang('site.edit')</i></button>
                                    </div>

                                    <div class="alert alert-success" id="success-msg"
                                        style="display: none; margin-top: 20px">
                                        <span id="success"></span>
                                    </div>
                                </form>
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

        $(document).on('click', '#submit', function(e) {

            e.preventDefault();

            $('#bu_name_error').text('');
            $('#bu_place_error').text('');
            $('#bu_price_error').text('');
            $('#bu_square_error').text('');
            $('#rooms_error').text('');
            $('#bu_latitude_error').text('');
            $('#bu_langtude_error').text('');
            $('#bu_meta_error').text('');
            $('#bu_larg_dis_error').text('');

            var formData = new FormData($('#form_data')[0]);

            $.ajax({

                type: "post",
                url: "{{ route('userbuStore') }}",
                cache: false,
                processData: false,
                contentType: false,
                data: formData,

                success: function(data, status) {

                    $('input[type=email],input[type=text]').val('');
                    $('#textarea').val('');

                    $.each(data, function(key, val) {

                        $('#success').text(val);

                        $('#success-msg').fadeIn(300, function() {
                            $(this).fadeOut(11000);
                        });
                    });

                },

                error: function(reject) {

                    var response = $.parseJSON(reject.responseText);

                    $.each(response.errors, function(key, val) {

                        $('#' + key + '_error').text(val);

                    });
                }
            });
        });




        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "منطقة العقار",
                allowClear: true
            });

        });
    </script>
@endsection
