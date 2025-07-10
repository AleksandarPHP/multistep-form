<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="robots" content="index, follow" />
    
        <meta name="keywords" content="{{ $settings->keywords }}" />
        <meta name="author" content="soft4tech.com" />
        <meta property="og:locale" content="{{ str_replace('_', '-', app()->getLocale()) }}"/>
    
        @if (trim($__env->yieldContent('description')))
        <meta name="description" content="@yield('description')" />
        <meta property="og:description" content="@yield('description')" />
        <meta name="twitter:description" content="@yield('description')" />
        @else
        <meta name="description" content="{{ $settings->description }}" />
        <meta property="og:description" content="{{ $settings->description }}" />
        <meta name="twitter:description" content="{{ $settings->description }}" />
        @endif
    
        @if (trim($__env->yieldContent('shareimage')))
        <meta property="og:image" content="@yield('shareimage')" />
        <meta name="twitter:image" content="@yield('shareimage')" />
        @else
        <meta property="og:image" content="{{ asset('assets/images/share-image.jpg') }}"/>
        <meta name="twitter:image" content="{{ asset('assets/images/share-image.jpg') }}" />
        @endif
    
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url()->full() }}" />
        <meta property="og:site_name" content="{{ $settings->title }}" />
    
        <meta name="twitter:card" content="summary_large_image"/>
        <meta name="twitter:site" content="{{ $settings->title }}" />
        <meta name="twitter:creator" content="@soft4tech.com" />
        <meta name="twitter:url" content="{{ url()->full() }}" />
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        @if (trim($__env->yieldContent('title')))
        <meta property="og:title" content="@yield('title') | {{ $settings->title }}" />
        <meta name="twitter:title" content="@yield('title') | {{ $settings->title }}" />
        <title>@yield('title') | {{ $settings->title }}</title>
        @else
        <meta property="og:title" content="{{ $settings->title }}" />
        <meta name="twitter:title" content="{{ $settings->title }}" />
        @endif
        <meta name="facebook-domain-verification" content="n7pz8phgrje8zoizrywj588mm2ft4k" />
        
        <title>{{ $settings->title }}</title>
        <link
            rel="stylesheet"
            href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css"
        />
        <link rel="shortcut icon" href="{{asset('favicon.png')}}">
        <link rel="stylesheet" href="{{asset('assets/style/jquery.toast.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/slick-1.8.1/slick/slick.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{asset('assets/slick-1.8.1/slick/slick-theme.css')}}"/>
        <script src="https://cdn.jsdelivr.net/npm/@svgdotjs/svg.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        />
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
        />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="{{asset('assets/script/jquery.toast.js')}}"></script>
        <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
        <script src="{{ asset('assets/script/header.js') }}"></script>
        <title>Montera</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    </head>
    <body>
        <header>
            <nav class="navbar fixed-top navbar-expand-xxl {{ $isTransparent ?? false ? 'transparent' : '' }}">
                <div class="container-fluid">
                    <a class="navbar-brand d-lg-none" href="{{ url('/') }}">
                        @if ($settings->logoH)
                        <img
                            id="media-logo"
                            src="{{ asset('assets/images/black-logo.webp') }}"
                            alt="logo"
                            class="img-fluid"
                        />
                        @else
                        <img
                            id="media-logo"
                            src="{{ asset('assets/images/black-logo.webp') }}"
                            alt="logo"
                            class="img-fluid"
                        />
                        @endif
                    </a>
                    <ul class="navbar-nav languages d-none d-lg-flex">
                        @if(app()->getLocale() == 'sr')
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                BIH
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ url(Str::start(request()->path(), 'en/')) }}">ENG</a>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                ENG
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="{{ url(Str::replaceFirst('en', '', request()->path())) }}">SRB</a>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                    <button
                        class="navbar-toggler"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar"
                        aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation"
                    >
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div
                        class="offcanvas offcanvas-end"
                        tabindex="-1"
                        id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel"
                    >
                        <div class="offcanvas-header">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="offcanvas"
                                aria-label="Close"
                            ></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav">
                                <li class="nav-logo d-xxl-none">
                                    <a class="nav-link" href="{{ Helper::url('/') }}" role="button">
                                        <img
                                            id="regular-logo"
                                            src="{{ asset('assets/images/black-logo.webp') }}"
                                            alt="logo"
                                            class="img-fluid-regular"
                                        />
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ Helper::url('o-nama') }}" role="button">
                                        {{__('About us')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ Helper::url('lokacija') }}" role="button">
                                        {{ __('Location') }}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ Helper::url('sadrzaj') }}" role="button">
                                        {{__('Content')}}
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ Helper::url('apartmani') }}" role="button">
                                        {{__('Apartments')}}
                                    </a>
                                </li>
                                <li class="nav-logo d-none d-xxl-flex">
                                    <a class="nav-link" href="{{ Helper::url('/') }}" role="button">
                                        <img
                                            id="regular-logo2"
                                            src="{{ asset('assets/images/black-logo.webp') }}"
                                            alt="logo"
                                            class="img-fluid-regular"
                                        />
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ Helper::url('kupovina') }}" role="button">
                                        {{__('Shopping')}}
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ Helper::url('najam-apartmana') }}" role="button"> 
                                        {{__('Apartment rent')}}
                                    </a>
                                </li>
                                <li class="header-contact">
                                    <i class="fa-solid fa-mobile-screen"></i>
                                    <div>
                                        <a href="tel:+381 66 686 89 85"
                                            >+381 66 686 89 85</a
                                        >
                                        <a href="tel: +381 65 927 97 00">
                                            +381 65 927 97 00</a
                                        >
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
