<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Start SEO -->
    @yield('meta')
    <!-- End SEO -->

    <!--Title-->
    @yield('title')

    <link rel="icon" href="{{ asset('front/img/icont-title.png') }}" type="image/x-icon">
    <link rel="shortcut" href="{{ asset('front/img/icont-title.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('front/img/icont-title.png') }}" type="image/x-icon">

    <!-- CSS Style -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/send_message.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/about-us.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/digrams.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/customMenu.css') }}">

    {{-- jpreview --}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/jpreview.css') }}">

    @yield('styles')

    <!-- Font Awesome Iconc Library -->
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- font Arabic -->
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/droid-arabic-kufi" type="text/css" />
</head>

<body class="bod">

    <!-- Start Upper Bar -->
    <div class="upper-bar color-white">
        <div class="container">
            <div class="row">
                <div class="col-sm dir-right">
                    <span>مرحبا بكم</span>
                </div>
                <div class="col-sm">
                    <div class="info">
                        <i class="fa fa-map-marker color-red"><span>شارع 64 , العمارات , الخرطوم</span></i>
                        <i class="fa fa-clock color-red"><span>السبت-الخميس 7:00-5:00</span></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- End Upper Bar -->

    @yield('navbar')

    <!-- Start content -->
    @yield('content')
    <!-- End content   -->

    <!-- Start scroll up -->
    <a href="#" class="scrollTop color-red"><i class="fa fa-arrow-circle-up" aria-hidden="true"></i></a>
    <!-- End scroll up -->

    <!-- Start footer -->
    <div class="footer color-white">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4">
                    <div class="contact">
                        <h2>إتصل بنا عبر</h2>
                        <ul>
                            <li><i class="fa fa-map-marker color-red"></i><span class="p-color">شارع
                                    64,العمارات,الخرطوم</span></li>
                            <li><i class="fa fa-phone-square color-red"></i><span class="p-color">0920016568</span></li>
                            <li><i class="fa fa-envelope color-red"></i><span class="p-color">alhir1996@gmail.com</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="info">
                        <h2>معلومات عنا</h2>
                        <p class="p-color">ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم ليظهر للعميل الشكل
                            كاملاً،دور مولد النص العربى أن يوفر على المصمم
                            عناء البحث عن نص بديل لا علاقة له بالموضوع الذى يتحدث عنه التصميم فيظهر بشكل لا يليق.</p>
                        <a target="_blank" rel="nofollow" href="{{ getSetting('facebook') }}"><i
                           target="_blank"      class="fa fa-facebook fa-lg fa-fw"></i></a>
                        <a target="_blank" rel="nofollow" href="{{ getSetting('twitter') }}"><i
                           target="_blank"      class="fa fa-twitter fa-lg fa-fw"></i></a>
                        <a target="_blank" rel="nofollow" href="{{ getSetting('linkedin') }}"><i
                                class="fa fa-linkedin fa-lg fa-fw"></i></a>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <!-- <div class="image">
                    <img src="img/Coumpny.jpg" alt="">
                </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- End footer -->



    <!-- Start copyright -->
    <div class="copyright text-center">
        <div class="container">
            <p>كل الحقوق محفوظه شموس العقارية &copy; <a class="mysite" href="http://facebook.com" target="_blank"
                    rel="noopener noreferrer nofollow">برمجة الخير عبدالمنعم</a></p>
        </div>
    </div>
    <!-- End copyright -->
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <!-- Start Select 2-->
    <script src="{{ asset('front/js/select2.min.js') }}"></script>
    <!-- End Select 2-->

    <script src="{{ asset('front/js/jQuery v3.6.0.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>
    <script src="{{ asset('front/js/customMenu.js') }}"></script>

    {{-- jpreview --}}
    {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>  --}}
    <script src="{{ asset('dashboard_files/js/bootstrap-prettyfile.js') }}"></script>
    <script src="{{ asset('dashboard_files/js/jpreview.js') }}"></script>

    <script>
        // // image preview
        $(".image").change(function() {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        });


        $('input[type="file"]').prettyFile();
        $('.demo').jPreview();
    </script>

    @yield('scripts')

</body>

</html>
