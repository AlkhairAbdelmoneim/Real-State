@extends('layouts/master')

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('front/css/digrams_info.css') }}">
@endsection

@section('title')
    <title>
        @lang('site.Allbuilding')
    </title>
@endsection

@section('navbar')
    <!-- Start navbar -->

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}">
                <h2 class="color-white">شموس <span class="color-red">العقارية</span></h2>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('welcome') }}">@lang('site.home')</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page"
                            href="{{ route('showAllBuilding') }}">@lang('site.Allbuilding')</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">@lang('site.bu_tmlek')</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @foreach (getBuType() as $key => $value)
                                <li><a class="dropdown-item color-white"
                                        href="{{ route('search', ['bu_rent' => 1, 'bu_type' => $key], $key) }}">{{ $value }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">@lang('site.bu_aejar')</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @foreach (getBuType() as $key => $value)
                                <li><a class="dropdown-item color-white"
                                        href="{{ route('search', ['bu_rent' => 0, 'bu_type' => $key]) }}">{{ $value }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">@lang('site.contact-us')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about-us.html">من نحن</a>
                    </li>

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('site.login') }}</a>
                            </li>
                        @endif

                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu scriptdropdown dropdown-menu-right" aria-labelledby="navbarDropdown">
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
@endsection

@section('content')
    <div class="digram">
        <div class="container">
            <div class="row">

                @include('front.bu._siteMenu')

                <div class="col-md-8 fl-left text-content">
                    <div class="container">
                        <div class="row">
                            <div class="alert alert-danger">
                                <span>تحذير :</span>
                                <p>{{ $messageBody }}</p>
                                <small>المشرف</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End digram -->
@endsection
