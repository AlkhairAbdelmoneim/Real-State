@extends('layouts/master')

@section('meta')
    <meta property="og:image" content="{{ asset('front/img/og.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:title" content="شموس العقارية , Shmos real state">
    <meta property="og:description" content="نستثمر في الحاضر... لنكسب المستقبل - شموس العقارية">
    <meta name="keywords" content="{!!getSetting('keywords')!!}">
    <meta property="og:type" content="website">
    <meta name="description" content="{!!getSetting('description')!!}">
@endsection 

@section('navbar')

    @include('layouts._navbar')

@endsection
<link rel="stylesheet" href="{{ asset('front/css/reset.css') }}"> <!-- CSS reset -->
<link rel="stylesheet" href="{{ asset('front/css/style.css') }}"> <!-- Resource style -->
{{--  <script src="{{ asset('front/css/modernizr.js') }}"></script>  --}}
<!-- Modernizr -->


@section('title')
    <title>
        الصفحة الرئيسية
    </title>
@endsection

@section('content')

    <!-- Start carsuel -->
    <div class="slider">
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

                    @if (getSetting('main_slider') == 'not data found')
                        <div class="carousel-item active carousel-one default-img">
                    @endif

                    @if (getSetting('main_slider') != 'not data found')
                        <div class="carousel-item active carousel-one"
                            style="background-image: url({{ asset('uploads/slider/' . getSetting('main_slider')) }})">
                    @endif

                    <div class="carousel-caption d-md-block">
                        <h1>{{ getSetting() }} الرئيسية</h1>
                        <div class="form-search">
                            <form action="{{ route('search') }}" method="GET">
                                @csrf

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="custom-select">
                                            <div class="form-group">
                                                <select name="bu_place" class="form-control">
                                                    <option value="" disabled selected hidden>@lang('site.bu_place')...
                                                    </option>
                                                    @foreach (getBuPlace() as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="custom-select">
                                            <div class="form-group">
                                                <select name="bu_rent" class="form-control">
                                                    <option value="" disabled selected hidden>@lang('site.bu_rent')...
                                                    </option>
                                                    @foreach (getBuRent() as $key => $value)
                                                        <option value="{{ $key }}">{{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="custom-select">
                                            <div class="form-group">
                                                <select name="rooms" class="form-control">
                                                    <option value="" disabled selected hidden>@lang('site.rooms')...
                                                    </option>
                                                    @for ($i = 2; $i <= 40; $i++)
                                                        <option value="{{ $i }}">{{ $i . ' ' . 'غرفة' }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="custom-select">
                                            <div class="form-group">
                                                <select name="bu_type" class="form-control">
                                                    <option value="" disabled selected hidden>@lang('site.bu_type')...
                                                    </option>
                                                    @foreach (getBuType() as $key => $value)
                                                        <option class="custom-option" value="{{ $key }}">
                                                            {{ $value }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="bu_price_from" class="form-control"
                                                placeholder="@lang('site.bu_priceFrom')">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="bu_price_to" class="form-control"
                                                placeholder="@lang('site.bu_priceTo')">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="bu_square" class="form-control"
                                                placeholder="@lang('site.bu_square')">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button type="submit" class="btn button-effect from-top"><i
                                                    class=" fa fa-search">{{ ' ' }}@lang('site.search')</i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End carsuel -->

    <!-- Start box -->
    <div class="box">
        <div class="container">
            <div class="row">
                <div class="col-sm text1">
                    <h4 class="color-white">تبحث عن إستثمار...! <span class="color-red">؟</span></h4>
                    <p class="color-white">إختار مساحتك في أحد مخططاتنا المتميزة،وأستمتع بإمتيازاتنا</p>
                </div>
                <div class="col-sm text2">
                    <a href="{{route('userbucreate')}}" title="@lang('site.addBu')"><span>أضف عقارك معنا</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End box -->

    <!-- Start features -->
    <div class="features">
        <div class="container">
            <div class="box-1">
                <div class="row">
                    <div class="col-md">
                        <h2>ساعات <span class="color-red">العمل</span></h2>
                        <ul class="p-color">
                            <li>السبت <span>07:00-17:00</span></li>
                            <li>الأحد <span>07:00-17:00</span></li>
                            <li>الأثنين <span>07:00-17:00</span></li>
                            <li>الثلاثاء <span>07:00-17:00</span></li>
                            <li>الأربعاء <span>07:00-17:00</span></li>
                            <li>الخميس <span>07:00-17:00</span></li>
                            <li>الجمعة <span class="color-white">عطله رسمية</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="box-2">
                <div class="row">
                    {{--  <ul class="cd-items cd-container">
                        @foreach ($bu as $item)
                            <li class="cd-item boxShadow">
                                <img src="{{ $item->image_path }}" alt="No image"
                                    title="{{ $item->bu_name }}" width="auto" height="auto" alt="On image">
                                <a href="#0" data-id="{{ $item->id }}" title="{{ $item->bu_name }}"
                                    class="cd-trigger">{{ 'وصف مختصر' }}</a>
                            </li> <!-- cd-item -->
                        @endforeach
                    </ul> <!-- cd-items -->

                    <div class="cd-quick-view">
                        <div class="cd-slider-wrapper">

                            <ul class="cd-slider">
                                <li><img class="image" src="" style="object-fit: cover"></li>
                            </ul> <!-- cd-slider -->

                        </div> <!-- cd-slider-wrapper -->

                        <div class="cd-item-info">
                            <h2 class="title"></h2>
                            <p class="dis"></p>

                            <ul class="cd-item-action">
                                <li><a href="" class="more button-effect from-top"><span class="color-white">إقرأ
                                            المزيد</span></a></li>
                                <li><a href="" class="price"></a></li>
                            </ul> <!-- cd-item-action -->
                        </div> <!-- cd-item-info -->
                        <a href="#0" class="cd-close">Close</a>

                    </div> <!-- cd-quick-view -->  --}}

                    @foreach ($firstBu as $value)
                        <div class="col-md-4 col-lg-4">
                            <div class="card">
                                <div class="image-1">
                                    <div class="over"><a href="{{ route('singleBuilding', $value->id) }}" title="{{$value->bu_name}}">تفاصيل المخطط</a></div>
                                    <img class="card-img-top" src="{{$value->image_path}}" alt="No image" title="{{$value->bu_name}}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        {{$value->bu_name}}
                                    </h5>
                                    
                                    <span class="card-subtitle mb-2 text-muted fl-right">
                                        <span>{{ 'المساحة ' }}{{ $value->bu_square }}</span>
                                    </span>
                                    <h6 class="card-subtitle mb-2 text-muted fl-left">
                                        <span>{{ $value->getBuRent() }}</span>
                                    </h6>

                                    <p class="card-text p-color card-style-p clearfix">
                                        {{$value->bu_smail_dis}}
                                    </p>
                                    <a href="{{ route('singleBuilding', $value->id) }}" title="{{$value->bu_name}}" class="button-effect from-top"><span class="color-white">التفاصيل</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <!-- End features -->

    <!-- Start featured work -->
    <div class="featured-work text-center">
        <div class="container">
            <h1 class="color-white">نُقدر <span class="color-red">النجاح وندعمه</span></h1>
            <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص
                العربى، حيث يمكنك أن تولد مثل هذا
                النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
            <div class="images">
                <div class="row">
                    <div class="col-md-3 col-lg-3"><img src="{{ asset('front/img/header1.jpg') }}" alt="No image" title="صوره"></div>
                    <div class="col-md-3 col-lg-3"><img src="{{ asset('front/img/header.jpg') }}" alt= "No image" title="صوره"></div>
                    <div class="col-md-3 col-lg-3"><img src="{{ asset('front/img/header2.jpg') }}" alt="No image" title="صوره"></div>
                    <div class="col-md-3 col-lg-3"><img src="{{ asset('front/img/header3.jpg') }}" alt="No image" title="صوره"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- End featured work -->


    <!-- Start message -->
    <div class="message">
        <div class="container">
            <div class="row">
                <div class="info fl-right">
                    <div class="row">
                        <h2>شموس <span class="color-red">خيارك الأفضل</span></h2>
                        <div class="col-md-5 col-lg-5">
                            <div class="image fl-right">
                                <img src="{{ asset('front/img/Coumpny.jpg') }}" alt="No image" title="شعار الموقع">
                            </div>
                        </div>
                        <div class="col-md-7 col-lg-7">
                            <div class="text fl-left">
                                <p class="p-color">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص
                                    من مولد النص العربى، حيث يمكنك أن تولد مثل هذا
                                    إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما
                                    تريد، النص لن يبدو مقسما ولا يحوي
                                    أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى
                                    كثير من الأحيان أن يطلع على صورة
                                    حقيقية لتصميم الموقع.</p>
                                <a href="#" class="button-effect from-top"><span class="color-white">إقرأ المزيد</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="msg fl-left">
                    <h3>أُطلب <span class="color-red">فاتورتك</span></h3>

                    <form action="" method="">
                        <div class="mb-3">
                            <label class="form-label">الاسم رباعي</label>
                            <input type="text" class="form-control" placeholder="الإسم">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" placeholder="name@example.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label color-red">مخططاتنا</label>
                            <select class="form-select">
                                <option selected>الدبلوماسي</option>
                                <option value="1">الشباب</option>
                                <option value="2">الفردوس</option>
                                <option value="3">الياقوت</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">رسالة</label>
                            <textarea class="form-control" rows="3" placeholder="رساله"></textarea>
                        </div>
                        <button type="submit" class="button-effect from-top"><span class="color-white">طلب
                                فاتورة</span></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End message -->

    <!-- Start services -->
    <div class="services">
        <div class="container">
            <h2>إمتيازات <span class="color-red">نفخر بها</span></h2>
            <div class="row box1">
                <div class="col-md-4 col-lg-4"><span class="fl-right color-red"><i class="fa fa-comments"></i></span>
                    <p class="fl-right">إستشارات مجانيه</p>
                </div>
                <div class="col-md-4 col-lg-4"><span class="fl-right color-red"><i class="fa fa-money"></i></span>
                    <p class="fl-right">تمويل عقاري</p>
                </div>
                <div class="col-md-4 col-lg-4"><span class="fl-right color-red"><i class="fa fa-bank"></i></span>
                    <p class="fl-right">ضمانات لإستثمارك</p>
                </div>
            </div>
            <div class="row box2">
                <div class="col-md-4 col-lg-4"><span class="fl-right color-red"><i class="fa fa-cogs"></i></span>
                    <p class="fl-right">خدمات متنوعه</p>
                </div>
                <div class="col-md-4 col-lg-4"><span class="fl-right color-red"><i class="fa fa-flag-checkered"></i></span>
                    <p class="fl-right">سمعه طيبه</p>
                </div>
                <div class="col-md-4 col-lg-4"><span class="fl-right color-red"><i class="fa fa-home"></i></span>
                    <p class="fl-right">تقسيط الأراضي</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End services -->

    <!-- Start our services -->
    <div class="our-services text-center">
        <div class="overlay">
            <div class="container">
                <div class="content color-white">
                    <h4>تبحث عن إستثمار ... قطعه أرض أو عقار ... معنا تجد غايتك</h4>
                    <a class="color-white" href="{{route('showAllBuilding')}}" title="@lang('site.building_us')">عقاراتنا</a>
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

    <!-- Start scroll up -->
    <a href="#" class="scrollTop color-red"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
    <!-- End scroll up -->

@endsection

<script src="{{ asset('front/js/jquery-2.1.1.js') }}"></script>
<script src="{{ asset('front/js/velocity.min.js') }}"></script>

<script>
    function urlHome() {
        return '{{ Request::root() }}';
    }
</script>

<script src="{{ asset('front/js/main.js') }}"></script>
<!-- Resource jQuery -->
