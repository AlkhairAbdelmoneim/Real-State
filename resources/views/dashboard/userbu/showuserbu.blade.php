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
    <div class="digram">
        <div class="container">
            <div class="row">

                @include('front.bu._siteMenu')

                @include('partials._errors')

                <div class="col-md-8 fl-left">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (!session('success'))

                        <div class="container">
                            <div class="row all-card">
                                @if (isset($buAll) && $buAll->count() > 0)
                                    @foreach ($buAll as $bu)
                                        <div class="col-sm-6 col-lg-4">
                                            <div class="card">
                                                <a href="{{ route('singleBuilding', $bu->id) }}" title="{{$bu->bu_name}}">
                                                <img class="card-img-top" src="{{ $bu->image_path }}" title="{{$bu->bu_name}}">
                                                </a>
                                                <div class="card-body">
                                                    <h5 class="card-title">
                                                        {{ $bu->bu_name }}
                                                    </h5>

                                                    <h6 class="card-subtitle mb-2 text-muted fl-right">
                                                        <span>{{ 'المساحة ' }}{{ $bu->bu_square }}</span>
                                                    </h6>
                                                    <h6 class="card-subtitle mb-2 text-muted fl-left">
                                                        <span>{{ $bu->getBuRent() }}</span>
                                                    </h6>

                                                    <p class="card-text p-color card-style-p  clearfix">
                                                        {{ $bu->bu_smail_dis }}
                                                    </p>
                                                    @if ($bu->bu_status == 0)
                                                        <span class="not-active"><span>في إنتظار الموافقه...</span></span>
                                                        <br>
                                                        <a href="{{ route('userbuedit', $bu->id) }}"
                                                            class="button-effect from-top details"><span class="color-white">
                                                                تعديل</span></a>
                                                    @else
                                                        <a href="{{ route('singleBuilding', $bu->id) }}"
                                                            class="button-effect from-top"><span class="color-white">
                                                                التفاصيل</span></a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h2> @lang('site.no_building_found')</h2>
                                @endif
                            </div>

                            <div class="content-center">
                                {{ $buAll->appends(request()->query())->links() }}
                            </div>
                        </div>
                    @endif
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
                    <button class="color-white"><a href="{{ route('contact') }}">إتصل بنا</a></button>
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
