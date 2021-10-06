@extends('layouts/master')

@section('meta')

    <meta property="og:image" content="{{ asset('front/img/og.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:title" content="كل العقارات">
    <meta property="og:description" content="{!! getSetting('description') !!}">
    <meta name="keywords" content="{!! getSetting('keywords') !!}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{route('showAllBuilding')}}">

@endsection

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
<!-- Start carsuel -->
{{-- <div class="slider">
        <div id="main-slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators carousel-none">
                <button type="button" data-bs-target="#main-slider" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#main-slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#main-slider" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="overlay"></div>
                <div class="carousel-item active carousel-one">
                    <div class="carousel-caption d-md-block">
                        <h2>الأُمراء</h2>
                        <p>عدد من المشاريع الخدمية والبنية التحتية</p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
<!-- End carsuel -->
<!-- Start digram -->
<div class="digram">
    <div class="container">
        <div class="row">

            @include('front.bu._siteMenu')

            <div class="col-md-8 fl-left">

                <div class="container">
                    <h1>كل العقارات</h1>
                    <div class="row all-card">
                        @if (isset($buAll) && $buAll->count() > 0)
                            @foreach ($buAll as $bu)
                                <div class="col-sm-6 col-lg-4">
                                    <div class="card">
                                        <a href="{{ route('singleBuilding', $bu->id) }}" title="{{ $bu->bu_name }}">
                                            <img class="card-img-top" src="{{ $bu->image_path }}" alt="No image">
                                        </a>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                {{ $bu->bu_name }}
                                            </h5>

                                            <span class="card-subtitle mb-2 text-muted fl-right">
                                                <span>{{ 'المساحة ' }}{{ $bu->bu_square }}</span>
                                            </span>
                                            <h6 class="card-subtitle mb-2 text-muted fl-left">
                                                <span>{{ $bu->getBuRent() }}</span>
                                            </h6>

                                            <p class="card-text p-color card-style-p  clearfix">
                                                {{ $bu->bu_smail_dis }}
                                            </p>
                                            <a href="{{ route('singleBuilding', $bu->id) }}"
                                                title="{{ $bu->bu_name }}" class="button-effect from-top"><span
                                                    class="color-white">
                                                    التفاصيل</span></a>
                                            <span class="span-price">${{ $bu->bu_price }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h2> @lang('site.no_data_found')</h2>
                        @endif
                    </div>

                    <div class="content-center">
                        {{ $buAll->appends(request()->query())->links() }}
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
                <button class="color-white"><a href="{{ route('contact') }}"
                        title="@lang('site.contact-us')">@lang('site.contact-us')</a></button>
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

        var formData = new FormData($('#form_data')[0]);

        $.ajax({

            type: "post",
            url: "",
            cache: false,
            processData: false,
            contentType: false,
            data: formData,

            success: function(data, status) {

                $.each(data, function(key, val) {
                    console.log(val);
                });

            },

            error: function(reject) {

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
