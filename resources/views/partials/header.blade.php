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
        
  <title>Sonnenschutzmacher Konfigurator</title>
        <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}" />
  <script src = "{{ asset('assets/script/script.js') }}" defer> </script>
</head>