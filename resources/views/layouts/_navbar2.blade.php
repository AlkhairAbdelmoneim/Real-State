    <!-- Start navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('welcome') }}" title="@lang('site.home')">
                <h1 class="color-white">شموس <span class="color-red">العقارية</span></h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                            data-bs-toggle="dropdown" aria-expanded="false"
                            title="@lang('site.bu_tmlek')">@lang('site.bu_tmlek')</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                            @foreach (getBuType() as $key => $value)
                                <li><a class="dropdown-item color-white"
                                        href="{{ route('search', ['bu_rent' => 1, 'bu_type' => $key], $key) }}"
                                        title="{{ $value }}" title="{{ $value }}">{{ $value }}</a>
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
                                        title="{{ $value }}">{{ $value }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}"
                            title="@lang('site.contact-us')">@lang('site.contact-us')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about-us')}}" title="@lang('site.about-us')">من نحن</a>
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

                            <div class="dropdown-menu scriptdropdown dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item color-white" href="{{ route('showuserbu') }}"
                                    title="@lang('site.bu_active')">العقارات المفعلة</a>
                                <a class="dropdown-item color-white" href="{{ route('ShowbuNotActive') }}"
                                    title="@lang('site.bu_notactive')">العقارات الغير</a>
                                <a class="dropdown-item color-white" href="{{ route('UserEditInfo') }}"
                                    title="@lang('site.updateInfo')"
                                    title="@lang('site.updateInfo')">@lang('site.updateInfo')</a>
                                <a class="dropdown-item color-white" href="{{ route('userbucreate') }}"
                                    title="@lang('site.addBu')">title="@lang('site.addBu')</a>
                                <a class="dropdown-item color-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
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
