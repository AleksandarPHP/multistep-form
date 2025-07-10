@include('cms.partials.head')
<div class="container-fluid app_content">
    <div class="row">
        <div class="col app_content_left">
            @include('cms.partials.app_nav')
        </div>
        <div class="col app_content_right">
            @include('cms.partials.app_header')
@yield('content')
        </div>
    </div>
</div>
@include('cms.partials.footer')