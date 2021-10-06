@extends('layouts/master')

@section('meta')

<meta property="og:image" content="{{ asset('front/img/og.jpg') }}">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:title" content="@lang('site.contact-us')">
<meta property="og:description" content="{!! getSetting('description') !!}">
<meta name="keywords" content="{!! getSetting('keywords') !!}">
<meta property="og:type" content="website">
<meta property="og:url" content="{{route('contact')}}">

@endsection

@section('navbar')

    @include('layouts._navbar')

@endsection

@section('title')
    <title>
        @lang('site.contact-us')
    </title>
@endsection

@section('content')

    <!-- Start carsuel -->
    <div class="slider">
        <div id="main-slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators carousel-none">
                <button type="button" data-bs-target="#main-slider" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#main-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#main-slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="overlay"></div>
                <div class="carousel-item active carousel-two">
                    <div class="carousel-caption d-md-block">
                        <h2>@lang('site.contact-us')</h2>
                        <p>أُطلب خدمتك من فريقنا العامل</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End carsuel -->

    <!-- Start content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 box-1">
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى، حيث يمكنك أن تولد مثل هذا
                        النص أو العديد من النصوص</p>

                    @include('partials._errors')

                    <div class="form">
                        <form action="" id="form_data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <div class="col-md">
                                        <label class="form-label color-black">الإسم رباعي</label>
                                        <small id="name_error" class="text-danger"></small>
                                        <input type="text" name="name" class="form-control" placeholder="الإسم"
                                            value="{{ old('name') }}">
                                    </div>
                                    <div class="col-md">
                                        <label class="form-label color-black">البريد الإلكتروني</label>
                                        <small id="email_error" class="text-danger"></small>
                                        <input type="email" name="email" class="form-control" placeholder="name@example.com"
                                            value="{{ old('email') }}">
                                    </div>

                                    <div class="mb">
                                        <label class="form-label color-black">إعجابات</label>
                                        <select class="form-select" name="contact_type">
                                            @foreach (getTypeLike() as $key => $value)
                                                <option @if ($key == 0) selected @endif {{ $key }}>{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 fl-left">
                                    <div class="mb">
                                        <label class="form-label color-black">العنوان/السكن</label>
                                        <small id="address_error" class="text-danger"></small>
                                        <input type="text" name="address" class="form-control" placeholder="العنوان"
                                            value="{{ old('address') }}">
                                    </div>
                                    <div class="mb">
                                        <label class="form-label color-black">رقم الهاتف</label>
                                        <small id="phone_error" class="text-danger"></small>
                                        <input type="text" name="phone" class="form-control" placeholder="الهاتف"
                                            value="{{ old('phone') }}">
                                    </div>
                                    <div class="mb">
                                        <label for="exampleFormControlTextarea1"
                                            class="form-label color-black">الرسالة</label>
                                        <small id="message_error" class="text-danger"></small>
                                        <textarea id="textarea" class="form-control" rows="8" name="message"></textarea>
                                    </div>
                                    <a id="send" class="button-effect from-top"><span class="color-white">أرسل</span></a>
                                </div>
                            </div>
                            <div class="alert alert-success" id="success-msg"
                                style="display: none; margin-top: 20px">
                                <span id="success"></span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 fl-left box-2">
                    <h2>لديك <span class="color-red">إستفسار؟</span></h2>
                    <div class="info">
                        <div class="image">
                            <span class="color-red">5858</span>
                            <img src="{{ asset('front/img/message.jpg') }}" alt="">
                        </div>
                        <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                            النص العربى، حيث يمكنك أن تولد مثل
                            هذا
                            النص أو العديد من النصوص</p>
                        <div class="work-time">
                            <span>ساعات العمل</span>
                            <i class="fa fa-clock fl-left color-red"></i>
                            <p class="p-color">السبت-الخميس 7:00-5:00</p>
                            <p class="p-color">الجُمعة عطلة رسمية</p>
                        </div>

                        <div class="address">
                            <span>العناوين</span>
                            <i class="fa fa-home fl-left color-red"></i>
                            <p class="p-color">{{ getSetting('address') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End content -->
@endsection

@section('scripts')
    <script>
        use = "strict";

        $(document).on('click', '#send', function(e) {

            e.preventDefault();

            $('#name_error').text('');
            $('#email_error').text('');
            $('#address_error').text('');
            $('#phone_error').text('');                 
            $('#message_error').text('');                 
            $('#message_error').text('');                 

            var formData = new FormData($('#form_data')[0]);

            $.ajax({
                type: "post",
                url: "{{ route('store') }}",
                cach: false,
                processData: false,
                contentType: false,
                data: formData,

                success: function(data) {

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
    </script>
@endsection
