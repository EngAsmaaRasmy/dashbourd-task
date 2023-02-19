<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
    <div class="container-fluid">
        <div class="main-header-left ">
            <div class="responsive-logo">
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/logo2.jfif') }}"
                        class="logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img
                        src="{{ URL::asset('assets/img/logo2.jfif') }}" class="dark-logo-1" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/logo2.jfif') }}"
                        class="logo-2" alt="logo"></a>
                <a href="{{ url('/' . ($page = 'index')) }}"><img src="{{ URL::asset('assets/img/logo2.jfif') }}"
                        class="dark-logo-2" alt="logo"></a>
            </div>
            <div class="app-sidebar__toggle" data-toggle="sidebar">
                <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
                <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
            </div>
        </div>
        <div class="main-header-right">
            <div class="nav nav-item  navbar-nav-right ml-auto">
                <ul class="nav">
                    <li class="">
                        <div class="dropdown  nav-itemd-none d-md-flex">
                            <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1"
                                data-toggle="dropdown" aria-expanded="false">
                                @if (App::getLocale() == 'ar')
                                    <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
                                            src="{{ URL::asset('assets/img/flags/egypt_flag.jpg') }}"
                                            alt="img"></span>
                                    <strong
                                        class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                                @else
                                    <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
                                            src="{{ URL::asset('assets/img/flags/us_flag.jpg') }}"
                                            alt="img"></span>
                                    <strong
                                        class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
                                @endif
                                <div class="my-auto">
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                        @if ($properties['native'] == 'English')
                                            <i class="flag-icon flag-icon-us"></i>
                                        @elseif($properties['native'] == 'العربية')
                                            <i class="flag-icon flag-icon-eg"></i>
                                        @endif
                                        {{ $properties['native'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="nav-item full-screen fullscreen-button">
                    <a class="new nav-link full-screen-link" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" class="header-icon-svgs" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-maximize">
                            <path
                                d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="dropdown main-profile-menu nav nav-item nav-link">
                    <a class="profile-user d-flex" href=""><img alt=""
                            src="{{ URL::asset('assets/img/faces/6.jpg') }}"></a>
                    <div class="dropdown-menu">
                        <div class="main-header-profile bg-primary p-3">
                            <div class="d-flex wd-100p">
                                <div class="main-img-user"><img alt=""
                                        src="{{ URL::asset('assets/img/faces/6.jpg') }}">
                                </div>
                                <div class="mr-3 my-auto">
                                    <div class="user-info">
                                        <h6 class="font-weight-semibold mt-3 mb-0 text-white ">
                                            {{ Auth::user()->name }}
                                        </h6>
                                        <span class="mb-0 text-muted">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="dropdown-item" href="{{ route('admin.edit', Auth::user()->id) }}"><i
                                class="bx bx-cog"></i>
                            {{ trans('admin/sidebar.edit_profile') }}</a>
                        <a class="dropdown-item" href="{{ url('logout') }}"><i class="bx bx-log-out"></i>
                            {{ trans('admin/sidebar.log_out') }}
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /main-header -->
