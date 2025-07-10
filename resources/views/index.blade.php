@section('title', Helper::title(1))
@section('title', Helper::description(1))
@include('partials.header', ['isTransparent' => true])

<main>
    <section class="hero" style="min-height: 100dvh">
        <video autoplay loop muted playsinline class="hero-video" poster="{{ asset('assets/images/hero-image.webp') }}">
            <source src="{{ asset('assets/videos/hero-video.mp4') }}" type="video/mp4">
        </video>
        <div class="container">
            <div class="image-frame" style="background-image: url('{{ asset('assets/images/okvir-2.png') }}');">
                <div class="image-text">
                    <p class="image-text-soft" data-aos="flip-right" data-aos-duration="1500">parče raja</p>
                    <p data-aos="flip-right"data-aos-duration="900">na Jahorini</p>
                </div>
            </div>
        </div>
    </section>
    <section class="concept-termag">
        <div class="container">
            <div class="row">
                @php $text =  Helper::text(2) @endphp
                <div class="col-lg-6 concept-termag-images">
                    <div class="image-wrapper">
                        @isset($text->image)<img src="{{ asset('storage/'.$text->image) }}" alt="Ski Resort" class="large-image" data-aos="fade-right" data-aos-duration="2000">@endisset
                        @isset($text->image2)<img src="{{ asset('storage/'.$text->image2) }}" alt="Building View" class="small-image" >@endisset
                    </div>
                </div>
                <div class="col-lg-6" >
                    @isset($text->subtitle)<h2 class="subtitle" data-aos="fade-left" data-aos-duration="1500">{{$text->subtitle}}</h2>@endisset
                    @isset($text->title)<h1 class="title" data-aos="fade-left" data-aos-duration="2000">{{$text->title}}</h1>@endisset
                    @isset($text->description){!!$text->description!!}@endisset
                </div>
            </div>
        </div>
    </section>
    <br>
    <br>
    <section class="rent-apartment">
        <div class="container">
            @php $text =  Helper::text(3) @endphp
            <div class="section-header">
                <h2 class="title" data-aos="zoom-in" data-aos-duration="1500">{{$text->title}}</h2>
            </div>

            <div class="apartment-section">
                <div class="row">
            @php $text =  Helper::text(4) @endphp
                    <div class="col-lg-6 apartment-column ac-bord" data-aos="fade-down-right" data-aos-duration="1300">
                        <h3>{{$text->title}}</h3>
                        {!!$text->description !!}
                        <div>
                            @if ($text->image)
                                <img src="{{Helper::image($text->image, 1200, 800, false)}}" alt="" class="img-fluid">
                            @else
                                <img src="{{asset('assets/images/placeholder.png')}}" alt="Basic Apartment" class="img-fluid">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-6 apartment-column" data-aos="fade-down" data-aos-duration="1300">
                        {!!$text->description2 !!}
                        @if ($text->image2)
                            <img src="{{Helper::image($text->image2, 1200, 800, false)}}" alt="" class="img-fluid">
                        @else
                            <img src="{{asset('assets/images/placeholder.png')}}" alt="Basic Apartment" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
            @php $text =  Helper::text(5) @endphp
            <div class="apartment-section">
                <div class="row">
                    <div class="col-lg-6 apartment-column ac-padd ac-bord" data-aos="fade-down-right" data-aos-duration="1100">
                        {!!$text->description2!!}
                        @if ($text->image)
                            <img src="{{Helper::image($text->image, 1200, 800, false)}}" alt="" class="img-fluid">
                        @else
                            <img src="{{asset('assets/images/placeholder.png')}}" alt="Basic Apartment" class="img-fluid">
                        @endif
                    </div>
                    <div class="col-lg-6 apartment-column ac-padd" data-aos="fade-down" data-aos-duration="1100">
                        <h3>{{$text->title}}</h3>
                        {!!$text->description!!}
                        @if ($text->image2)
                            <img src="{{Helper::image($text->image2, 1200, 800, false)}}" alt="" class="img-fluid">
                        @else
                            <img src="{{asset('assets/images/placeholder.png')}}" alt="Basic Apartment" class="img-fluid">
                        @endif
                    </div>
                </div>
            </div>
    </section>

    @php
        $slider = Helper::slider(2);
    @endphp
    <section class="apartments apartments-2">
        <h2 class="title" data-aos="zoom-in" data-aos-duration="1500">{{$slider->title}}</h2>
        <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content-wrapper" data-aos="fade-down" data-aos-duration="1500">
                        <h5>{{$slider->subtitle}}</h5>
                        <p>
                            {{$slider->text}}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="slider-2">
                        @for ($i = 1; $i <= 4; $i++)
                        @php
                            $img = 'image'.$i;   
                        @endphp
                            <div>
                                @if (!is_null($slider->$img))
                                    <img src="{{Helper::image($slider->$img, 1200, 800, false)}}" alt="" class="img-fluid">
                                @else
                                <div>
                                    <img src="{{asset('assets/images/placeholder.png')}}" alt="" class="img-fluid">
                                </div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
        <div class="slider-control">
            <button class="prev-arrow prev-arrow-2" aria-label="Previous" type="button">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
            <button class="next-arrow next-arrow-2"  aria-label="Next" type="button">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
        </div>
    </div>
    </section>

    @php
        $slider = Helper::slider(4);
    @endphp
    <section class="apartments apartments-3">
        <h2 class="title" data-aos="zoom-in" data-aos-duration="1500">{{$slider->title}}</h2>
        <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="slider-3">
                        @for ($i = 1; $i <= 4; $i++)
                        @php
                            $img = 'image'.$i;   
                        @endphp
                            <div>
                                @if (!is_null($slider->$img))
                                    <img src="{{Helper::image($slider->$img, 1200, 800, false)}}" alt="" class="img-fluid">
                                @else
                                <div>
                                    <img src="{{asset('assets/images/placeholder.png')}}" alt="" class="img-fluid">
                                </div>
                                @endif
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="content-wrapper" data-aos="fade-down" data-aos-duration="1500">
                        <h5>{{$slider->subtitle}}</h5>
                        <p>
                            {{$slider->text}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="slider-control">
                <button class="prev-arrow prev-arrow-3" aria-label="Previous" type="button">
                    <i class="fa-solid fa-arrow-left"></i>
                </button>
                <button class="next-arrow next-arrow-3"  aria-label="Next" type="button">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>
    </section>
    @php $text =  Helper::text(6) @endphp

    <section class="eco-friendly-section" style="background-image: url('{{ asset('assets/images/logs.png') }}'); ">
        <div class="image-frame" style="background-image: url('{{ asset('assets/images/okvir-2.png') }}'); ">
            <div class="image-text" >
                <p data-aos="flip-left" data-aos-duration="1500">{{$text->title}}</p>
            </div>
        </div>
        <div class="ec-container">
            <div class="content">
                <div class="col-lg-6 column-left">
                    {!!$text->description!!}
                </div>
                <div class="col-lg-6 column-contrast">
                    {!!$text->description2!!}
                </div>
            </div>
        </div>
    </section>
</main>

@include('partials/footer')