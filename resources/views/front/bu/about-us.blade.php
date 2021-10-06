@extends('layouts/master')

@section('meta')
    <meta property="og:image" content="{{ asset('front/img/og.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:title" content="@lang('site.about-us')">
    <meta property="og:description" content="{!! getSetting('description') !!}">
    <meta name="keywords" content="{!! getSetting('keywords') !!}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{route('about-us')}}">
@endsection


@section('title')
    <title>
        @lang('site.about-us')
    </title>
@endsection

@section('content')

    <!-- Start navbar -->
    <nav class="navbar scriptnavbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}" title="@lang('site.home')">
                <h1 class="color-white">شموس <span class="color-red">العقارية</span></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('welcome') }}"
                            title="@lang('site.home')">@lang('site.home')</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('showAllBuilding') }}"
                            title="@lang('site.Allbuilding')">@lang('site.Allbuilding')</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            title="@lang('site.bu_tmlek')" data-bs-toggle="dropdown"
                            aria-expanded="false">@lang('site.bu_tmlek')</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @foreach (getBuType() as $key => $value)
                                <li><a class="dropdown-item color-white"
                                        href="{{ route('search', ['bu_rent' => 1, 'bu_type' => $key], $key) }}"
                                        title="{{ $value }}">{{ $value }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            title="@lang('site.bu_aejar')" data-bs-toggle="dropdown"
                            aria-expanded="false">@lang('site.bu_aejar')</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @foreach (getBuType() as $key => $value)
                                <li><a class="dropdown-item color-white"
                                        href="{{ route('search', ['bu_rent' => 0, 'bu_type' => $key]) }}"
                                        {{ $value }} title="{{ $value }}">{{ $value }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="r-item">
                        <a class="nav-link" href="{{ route('contact') }}"
                            title="@lang('site.contact-us')">@lang('site.contact-us')</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about-us') }}" title="@lang('site.about-us')" title="@lang('site.about_us')">@lang('site.about-us')</a>
                    </li>

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"
                                    title="{{ __('site.login') }}">{{ __('site.login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"
                                    title="{{ __('site.Register') }}">{{ __('site.Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item color-white" href="{{ route('showuserbu') }}"
                                    title="@lang('site.bu_active')">العقارات المفعلة</a>
                                <a class="dropdown-item color-white" href="{{ route('ShowbuNotActive') }}"
                                    title="@lang('site.bu_notactive')">العقارات الغير
                                    مفعلة</a>
                                <a class="dropdown-item color-white" href="{{ route('UserEditInfo') }}"
                                    title="@lang('site.updateInfo')">@lang('site.updateInfo')</a>
                                <a class="dropdown-item color-white" href="{{ route('userbucreate') }}"
                                    title="@lang('site.addBu')">@lang('site.addBu')</a>
                                <a class="dropdown-item color-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('site.logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

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
                <div class="carousel-item active carousel-about">
                    <div class="carousel-caption d-md-block">
                        <h1>من نحن</h1>
                        <p>نستثمر في الحاضر ... لنكسب المستقبل</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End carsuel -->

    <!-- Start commpany info -->
    <div class="commpany-info">
        <div class="container">
            <div class="info">
                <div class="row">
                    <div class="col-md-3 col-lg-3">
                        <i class="fa fa-pie-chart fl-right color-red"></i>
                        <h4>300+</h4>
                        <p class="p-color">قطعه أرض</p>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <i class="fa fa-users fl-right color-red"></i>
                        <h4>30+</h4>
                        <p class="p-color">موظف</p>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <i class="fa fa-volume-control-phone fl-right color-red"></i>
                        <h4>50+</h4>
                        <p class="p-color">خدمات إستشارية</p>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <i class="fa fa-handshake-o fl-right color-red"></i>
                        <h4>120+</h4>
                        <p class="p-color">عميل</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End commpany info -->

    <!-- Start message -->
    <div class="message">
        <div class="container">
            <div class="row">
                <div class="info">
                    <div class="image">
                        <img src="{{asset('front/img/Coumpny.jpg')}}" alt="No image" title="شعار الموقع">
                    </div>
                </div>
                <div class="msg">
                    <h3>نستثمر في الحاضر<span class="color-red"> ... لنكسب المستقبل</span></h3>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى، حيث يمكنك أن تولد مثل هذا
                        النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن
                        يبدو مقسما ولا يحوي
                        أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من
                        الأحيان أن يطلع على صورة
                        حقيقية لتصميم الموقع.
                        ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص العربى
                        أن يوفر على المصمم
                    </p>
                    <a href="{{ route('contact') }}" class="button-effect from-top" title="@lang('site.contact-us')"><span class="color-white">@lang('site.contact-us')</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End message -->

    <!-- Start about company -->
    <div class="about-commpany">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5">
                    <span><i class="fa fa-eye color-red"></i>رؤيتنا</span>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى، حيث يمكنك أن تولد مثل هذا
                        النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                </div>
                <div class="col-md-5 col-lg-5">
                    <span><i class="fa fa-flag color-red"></i>أهدافنا</span>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى، حيث يمكنك أن تولد مثل هذا
                        النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-lg-5">
                    <span><i class="fa fa-star color-red"></i>رسالتنا</span>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى، حيث يمكنك أن تولد مثل
                        هذا
                        النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                </div>
                <div class="col-md-5 col-lg-5">
                    <span><i class="fa fa-cubes color-red"></i>أهداف الشركة</span>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى، حيث يمكنك أن تولد مثل
                        هذا
                        النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End about company -->

    <!-- Start box info -->
    <div class="box-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <span class="fl-right color-red">2019</span>
                    <h5>التأسيس</h5>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى</p>
                </div>
                <div class="col-md-4 col-lg-4">
                    <span class="fl-right color-red">2020</span>
                    <h5>تعدد مجالاتنا</h5>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى</p>
                </div>
                <div class="col-md-4 col-lg-4">
                    <span class="fl-right color-red">2021</span>
                    <h5>حالياً</h5>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End box info -->

    <!-- Start our services -->
    <div class="our-services text-center">
        <div class="overlay">
            <div class="container">
                <div class="content color-white">
                    <h4>تبحث عن إستثمار ... قطعه أرض أو عقار ... معنا تجد غايتك</h4>
                    <a href="{{route('userbucreate')}}" title="@lang('site.addBu')" class="color-white"><span>أضف عقارك معنا</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End our services -->

    <!-- Start Latest Posts -->
    <div class="latest-post">
        <div class="container">
            <div class="row">
                <h2>أحدث <span class="color-red">العقارات المضافة</span></h2>
                @foreach ($lastBu as $value)
                    <div class="col-md-2 col-lg-2">
                        <div class="image">
                            <div class="over">
                                <h1 class="color-white">{{{$value->bu_name}}}</h1>
                                {{-- <p>{!!$value->bu_smail_dis!!}</p> --}}
                                <h6 class=" h-place">@lang('site.bu_place'){{' '.$value->bu_place}}</h6>
                                <h6 class=" h-rent">{{$value->getBuRent()}}</h6>                                
                                <a href="{{route('singleBuilding',$value->id)}}"><span class="color-white span-first"> التفاصيل</span></a>
                                <span class="color-white span-last">${{$value->bu_price}}</span>  
                       
                            </div>
                            <img src="{{$value->image_path}}" alt="No Image" title="{{$value->bu_name}}">
                        </div>
                    </div>                                      
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Latest Posts -->


    <a href="#" class="scrollTop color-red"    <!-- Start scroll up -->><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
    <!-- End scroll up -->

@endsection

{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>من نحن</title>
    <link rel="icon" href="./img/icont-title.png" type="image/x-icon">

    <!-- CSS Style -->
    <link rel="stylesheet" href="./css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/about-us.css">

    <!-- Font Awesome Iconc Library -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- font Arabic -->
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
</head>

<body>

    <!-- Start Upper Bar -->
    <div class="upper-bar color-white">
        <div class="container">
            <div class="row">
                <div class="col-sm dir-right">
                    <span>مرحبا بكم</span>
                </div>
                <div class="col-sm">
                    <div class="info">
                        <i class="fa fa-home color-red"><span>شارع 64 , العمارات , الخرطوم</span></i>
                        <i class="fa fa-clock color-red"><span>السبت-الخميس 7:00-5:00</span></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- End Upper Bar -->

    <!-- Start navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <h2>شموس <span class="color-red">العقارية</span></h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.html">الرئيسيه</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            مخططاتنا
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item color-white" href="#">الذهبي 1</a></li>
                            <li><a class="dropdown-item color-white" href="#">الذهبي 2</a></li>
                            <li><a class="dropdown-item color-white" href="#">شموس العقاريه</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="send_message.html">إستفسار</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about-us.html">من نحن</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <!-- Start carsuel -->
    <div class="slider">
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
                        <h2>من نحن</h2>
                        <p>نستثمر في الحاضر ... لنكسب المستقبل</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End carsuel -->

    <!-- Start commpany info -->
    <div class="commpany-info">
        <div class="container">
            <div class="info">
                <div class="row">
                    <div class="col-md-3 col-lg-3">
                        <i class="fa fa-pie-chart fl-right color-red"></i>
                        <h4>300+</h4>
                        <p class="p-color">قطعه أرض</p>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <i class="fa fa-users fl-right color-red"></i>
                        <h4>30+</h4>
                        <p class="p-color">موظف</p>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <i class="fa fa-volume-control-phone fl-right color-red"></i>
                        <h4>50+</h4>
                        <p class="p-color">خدمات إستشارية</p>
                    </div>
                    <div class="col-md-3 col-lg-3">
                        <i class="fa fa-handshake-o fl-right color-red"></i>
                        <h4>120+</h4>
                        <p class="p-color">عميل</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End commpany info -->

    <!-- Start message -->
    <div class="message">
        <div class="container">
            <div class="row">
                <div class="info">
                    <div class="image">
                        <img src="./img/Coumpny.jpg" alt="">
                    </div>
                </div>
                <div class="msg">
                    <h3>نستثمر في الحاضر<span class="color-red"> ... لنكسب المستقبل</span></h3>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى، حيث يمكنك أن تولد مثل هذا
                        النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.
                        إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص
                        لن يبدو مقسما ولا يحوي
                        أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من
                        الأحيان أن يطلع على صورة
                        حقيقية لتصميم الموقع.
                        ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص
                        العربى أن يوفر على المصمم
                    </p>
                    <a href="#" class="button-effect from-top"><span class="color-white">تواصل</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End message -->

    <!-- Start about company -->
    <div class="about-commpany">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5">
                    <span><i class="fa fa-eye color-red"></i>رؤيتنا</span>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى، حيث يمكنك أن تولد مثل هذا
                        النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                </div>
                <div class="col-md-5 col-lg-5">
                    <span><i class="fa fa-flag color-red"></i>أهدافنا</span>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى، حيث يمكنك أن تولد مثل هذا
                        النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-lg-5">
                    <span><i class="fa fa-star color-red"></i>رسالتنا</span>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى، حيث يمكنك أن تولد مثل
                        هذا
                        النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                </div>
                <div class="col-md-5 col-lg-5">
                    <span><i class="fa fa-cubes color-red"></i>أهداف الشركة</span>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى، حيث يمكنك أن تولد مثل
                        هذا
                        النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End about company -->

    <!-- Start box info -->
    <div class="box-info">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <span class="fl-right color-red">2019</span>
                    <h5>التأسيس</h5>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى</p>
                </div>
                <div class="col-md-4 col-lg-4">
                    <span class="fl-right color-red">2020</span>
                    <h5>تعدد مجالاتنا</h5>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى</p>
                </div>
                <div class="col-md-4 col-lg-4">
                    <span class="fl-right color-red">2021</span>
                    <h5>حالياً</h5>
                    <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد
                        النص العربى</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End box info -->

    <!-- Start our services -->
    <div class="our-services text-center">
        <div class="overlay">
            <div class="container">
                <div class="content color-white">
                    <h4>تبحث عن إستثمار ... قطعه أرض أو عقار ... معنا تجد غايتك</h4>
                    <a class="color-white" href="#">مخططاتنا</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End our services -->

    <!-- Start Latest Posts -->
    <div class="latest-post">
        <div class="container">
            <div class="row">
                <h2>أحدث <span>مخططاتنا</span></h2>
                <div class="col-md-2 col-lg-2"><img src="./img/Photo-View.png" alt=""></div>
                <div class="col-md-2 col-lg-2"><img src="./img/Photo-View.png" alt=""></div>
                <div class="col-md-2 col-lg-2"><img src="./img/Photo-View.png" alt=""></div>
                <div class="col-md-2 col-lg-2"><img src="./img/Photo-View.png" alt=""></div>
                <div class="col-md-2 col-lg-2"><img src="./img/Photo-View.png" alt=""></div>
                <div class="col-md-2 col-lg-2"><img src="./img/Photo-View.png" alt=""></div>
            </div>
        </div>
    </div>
    <!-- End Latest Posts -->

    <!-- Start scroll up -->
    <a href="#" class="scrollTop color-red"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
    <!-- End scroll up -->

    <!-- Start footer -->
    <div class="footer color-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <div class="contact">
                        <h2>معلومات الإتصال</h2>
                        <ul>
                            <li><i class="fa fa-phone color-red"></i><span>0920016568</span></li>
                            <li><i class="fa fa-envelope color-red"></i><span>alhir1996@gmail.com</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="info">
                        <h2>معلومات عنا</h2>
                        <p>ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل كاملاً،دور مولد النص
                            العربى أن يوفر على المصمم
                            عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.</p>
                        <i class="fa fa-facebook fa-lg fa-fw"></i>
                        <i class="fa fa-google fa-lg fa-fw"></i>
                        <i class="fa fa-twitter fa-lg fa-fw"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End footer -->

    <!-- Start copyright -->
    <div class="copyright text-center">
        <div class="container">
            <p>كل الحقوق محفوظه شموس العقارية &copy;</p>
        </div>
    </div>
    <!-- End copyright -->
    <!-- JavaScript -->
    <script src="./js/jQuery v3.6.0.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="./js/custom.js"></script>
</body>

</html> --}}
