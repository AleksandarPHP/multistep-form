@section('title',Helper::title(1))
@extends('layouts.app')
@section('content')
<main class="main-margin">
<div id="svg-container"></div>

<section class="gallery-navigator">
    <div class="container">
        <div class="row">
            @php $text =  Helper::text(1) @endphp
            <div class="col-lg-6">
                <p class="txt">
                    @isset($text->description)
                        {{$text->description}}
                    @endisset
                </p>
            </div>
            <div class="col-lg-6">
                <p class="txt">
                    @isset($text->description2)
                        {{$text->description2}}
                    @endisset
                </p>
            </div>
        </div>

        <div class="button-wrapper">
            <a href="{{ Helper::url('sprat/1') }}" class="button button_primary">
                {{__('Complete offer')}}
            </a>
        </div>
    </div>
</section>
@php
$slider = Helper::slider(1);
@endphp
<section class="apartments">
<h2 class="title" data-aos="zoom-in" data-aos-duration="1500">{{$slider->title}}</h2>
<div class="wrapper">
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="slider">
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
        <button class="prev-arrow" aria-label="Previous" type="button">
            <i class="fa-solid fa-arrow-left"></i>
        </button>
        <button class="next-arrow"  aria-label="Next" type="button">
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
</div>
</div>
<div class="button-wrapper">
<a href="{{ Helper::url('galerija') }}" class="button button_secondary">{{__('Gallery')}}</a>
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
    $slider = Helper::slider(3);
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
@php
    $slider = Helper::slider(9);
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
    $slider = Helper::slider(10);
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
@php
    $slider = Helper::slider(11);
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
    $slider = Helper::slider(12);
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
@php
    $slider = Helper::slider(13);
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

<script src="https://cdn.jsdelivr.net/npm/@svgdotjs/svg.js"></script>
<script>
    const draw = SVG().addTo("#svg-container").size("100%", "100%");

    const baseWidth = 1920;
    const baseHeight = 1080;

    const mainTitle = '{{ __('FLOOR AND\nPOSITION\nAPARTMENT\nOFFERED') }}';
    draw.viewbox(0, 0, baseWidth, baseHeight);

    const floors = [
        {
            name: "PRIZEMLJE",
            id: "1",
            points: "535,940 1410,930 1610,950 1610,1045 1410,1045 535,1040",
            width: 1075,
            height: 125,
            hoverColor: "#ff6600",
            stroke: "#33333300",
        },
        {
            name: "I SPRAT",
            id: "2",
            points: "535,840 1410,800 1645,850 1645,935 1410,915 535,935",
            width: 1075,
            height: 105,
            hoverColor: "#ff6600",
            stroke: "#33333300",
        },
        {
            name: "II SPRAT",
            id: "3",
            points: "500,750 1440,700 1645,770 1645,840 1440,795 500,835",
            width: 1075,
            height: 105,
            hoverColor: "#ff6600",
            stroke: "#33333300",
        },
        {
            name: "III SPRAT",
            id: "4",
            points: "500,660 1440,590 1645,680 1645,760 1440,685 500,745",
            width: 1075,
            height: 105,
            hoverColor: "#ff6600",
            stroke: "#33333300",
        },
        {
            name: "IV SPRAT",
            id: "5",
            points: "500,570 1440,480 1645,600 1645,675 1440,585 500,650",
            width: 1075,
            height: 105,
            hoverColor: "#ff6600",
            stroke: "#33333300",
        },
        {
            name: "V SPRAT",
            id: "6",
            points: "500,475 1425,350 1645,515 1645,580 1425,470 500,560",
            width: 1075,
            height: 105,
            hoverColor: "#ff6600",
            stroke: "#33333300",
        },
        {
            name: "VI SPRAT",
            id: "7",
            points: "502,375 1435,260 1595,355 1595,430 1435,350 500,450",
            width: 1075,
            height: 105,
            hoverColor: "#ff6600",
            stroke: "#33333300",
        },
    ];

    const texts = [
        {
            title: "PRIZEMLJE",
            x: 1450,
            y: 1000,
            fill: "#fff",
            opacity: 1,
            "font-size": 24,
            "font-family": "Arial, sans-serif",
            "font-weight": "500",
        },
        {
            title: "I SPRAT",
            x: 1485,
            y: 855,
            fill: "#fff",
            opacity: 1,
            "font-size": 24,
            "font-family": "Arial, sans-serif",
            "font-weight": "500",
        },
        {
            title: "II SPRAT",
            x: 1485,
            y: 750,
            fill: "#fff",
            opacity: 1,
            "font-size": 24,
            "font-family": "Arial, sans-serif",
            "font-weight": "500",
        },
        {
            title: "III SPRAT",
            x: 1485,
            y: 650,
            fill: "#fff",
            opacity: 1,
            "font-size": 24,
            "font-family": "Arial, sans-serif",
            "font-weight": "500",
        },
        {
            title: "IV SPRAT",
            x: 1485,
            y: 545,
            fill: "#fff",
            opacity: 1,
            "font-size": 24,
            "font-family": "Arial, sans-serif",
            "font-weight": "500",
        },
        {
            title: "V SPRAT",
            x: 1485,
            y: 430,
            fill: "#fff",
            opacity: 1,
            "font-size": 24,
            "font-family": "Arial, sans-serif",
            "font-weight": "500",
        },
        {
            title: "VI SPRAT",
            x: 1485,
            y: 335,
            fill: "#fff",
            opacity: 1,
            "font-size": 24,
            "font-family": "Arial, sans-serif",
            "font-weight": "500",
        },
        {
            title: mainTitle,
            x: 225,
            y: 435,
            fill: "#000",
            opacity: 0.8,
            "font-size": 24,
            "font-family": "Arial, sans-serif",
            "font-weight": "500",
        },
    ];

    floors.forEach((floor) => {
        const polygon = draw
            .polygon(floor.points)
            .attr({
                fill: "none",
                stroke: floor.stroke,
                "stroke-width": 10,
                cursor: "pointer",
            })
            .on("mouseover", () => {
                polygon.attr({ fill: floor.hoverColor, opacity: 0.7 });
            })
            .on("mouseout", () => {
                polygon.attr({ fill: "none" });
            })
            .on("click", () => {
            window.location.href = `sprat/${floor.id}`;
        });    });

    texts.forEach((text) => {
        draw.text(text.title).attr(text);
    });
</script>
</main>
@endsection