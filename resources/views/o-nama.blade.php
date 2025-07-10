@section('title',Helper::title(7))
@include('partials.header', ['isTransparent' => true])
<main>
    @php
        $text = Helper::text(8);
    @endphp
    <section class="content-page-banner" style="min-height: 80dvh;">
        <div class="bg" style="background-image: url('{{ asset('storage/'.$text->image2) }}');"></div>
    
        <div class="left-content" data-aos="fade-right" data-aos-duration="2000">
        <h2 data-aos="fade-right" data-aos-duration="1000">{{$text->subtitle}}</h2>
        <h1 class="title" data-aos="fade-right" data-aos-duration="1500">{{$text->title}}</h1>
        {!!$text->description!!}
        </div>
    </section>

    <img class="about-us-small-img" data-aos="zoom-in" data-aos-duration="1500" src="{{ asset('storage/'.$text->image) }}" />

    <div class="location-frame-container" data-aos="zoom-in" data-aos-duration="1500">
        <div class="image-frame location-frame about-us-frame" style="background-image: url('{{ asset('assets/images/okvir-2.png') }}'); ">
            <div class="image-text">
                {!!$text->description2!!}
            </div>
        </div>
    </div>
@php
    $text = Helper::text(9);
@endphp
    <div class="simple-column-section" style="margin-top: 40px;">
        <h1 class="title" data-aos="fade-left" data-aos-duration="1500">{{$text->title}}</h1>
        <h2 class="subtitle" data-aos="fade-left" data-aos-duration="2000">{{$text->subtitle}}</div>
        <div class="simple-column-container">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1300">{!!$text->description!!}</div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1300">{!!$text->description2!!}</div>
        </div>
    </div>
@php
    $text = Helper::text(10);
@endphp
    <section class="rent-apartment">
        <div class="container">
            <div class="section-header">
                <h2 class="title" data-aos="zoom-in" data-aos-duration="1500">{{$text->title}}</h2>
            </div>
            @php
                $text = Helper::text(11);
            @endphp
            <div class="apartment-section">
                <div class="row">
                    <div class="col-lg-6 apartment-column ac-bord" data-aos="fade-down-right" data-aos-duration="1300">
                        <h3>{{$text->title}}</h3>
                        {!!$text->description!!}
                        <div>
                            @if (!is_null($text->image2))
                            <img src="{{Helper::image($text->image2, 1200, 800, false)}}" alt="{{$text->title}}" class="img-fluid">
                            @else
                                <img src="{{asset('assets/images/placeholder.png')}}" alt="" class="img-fluid">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 apartment-column" data-aos="fade-down" data-aos-duration="1300">
                        {!!$text->description2!!}
                        @if (!is_null($text->image))
                        <img src="{{Helper::image($text->image, 1200, 800, false)}}" alt="{{$text->title}}" class="img-fluid">
                        @else
                            <img src="{{asset('assets/images/placeholder.png')}}" alt="" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
            @php
                $text = Helper::text(12);
            @endphp
            <div class="apartment-section">
                <div class="row">
                    <div class="col-lg-6 apartment-column ac-padd ac-bord" data-aos="fade-down-right" data-aos-duration="1100">
                        {!!$text->description!!}
                        @if (!is_null($text->image))
                            <img src="{{Helper::image($text->image, 1200, 800, false)}}" alt="{{$text->title}}" class="img-fluid">
                        @else
                            <img src="{{asset('assets/images/placeholder.png')}}" alt="" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-lg-6 apartment-column ac-padd" data-aos="fade-down" data-aos-duration="1100">
                        <h3>{{$text->title}}</h3>
                        {!!$text->description2!!}
                        <div>
                            @if (!is_null($text->image2))
                                <img src="{{Helper::image($text->image2, 1200, 800, false)}}" alt="{{$text->title}}" class="img-fluid">
                            @else
                                <img src="{{asset('assets/images/placeholder.png')}}" alt="" class="img-fluid">
                            @endif 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@php
     $text = Helper::text(13);
@endphp
    <div class="simple-column-section">
        <h1 class="title" data-aos="fade-left" data-aos-duration="1500">{{$text->title}}</h1>
        <h2 class="subtitle" data-aos="fade-left" data-aos-duration="2000">{{$text->subtitle}}</div>
        <div class="simple-column-container">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1300">{!!$text->description!!}</div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1300">{!!$text->description2!!}</div>
        </div>
    </div>

</main>

@include('partials/footer')