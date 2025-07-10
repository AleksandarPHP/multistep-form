@section('title', Helper::title(19))
@include('partials.header', ['isTransparent' => true])
@php
    $text = Helper::text(20);
@endphp
<main>
    <section class="hero" style="min-height: 100dvh">
        <img src="{{ asset('storage/'.$text->image) }}" alt="Ski Resort">
    </section>

    <div class="location-frame-container">
        <div data-aos-duration="1500" data-aos="fade-left">{{$text->title}}</div>
        <div data-aos="zoom-in" data-aos-duration="1500" class="image-frame location-frame" style="background-image: url('{{ asset('assets/images/okvir-2.png') }}'); ">
            <div class="image-text">
                <p class="image-text-small">
                    {{$text->subtitle}}</p>
            </div>
        </div>
    </div>
    @php
        $text = Helper::text(21);
    @endphp
    <div class="simple-column-section">
        <h1 class="title" data-aos="fade-left" data-aos-duration="1500">{{$text->title}}</h1>
        <h2 class="subtitle" data-aos="fade-left" data-aos-duration="2000">{{$text->subtitle}}</div>
        <div class="simple-column-container">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1300">{!!$text->description!!}</div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1300">{!!$text->description2!!}</div>
        </div>
    </div>

    @php
    $slider = Helper::slider(14);
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
    $slider = Helper::slider(15);
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
    $slider = Helper::slider(16);
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

    <div class="contact-container">
        <div class="contact-info">
            <h2 class="title" data-aos="fade-left" data-aos-duration="1500">Get in touch</h2>
            <p data-aos="fade-left" data-aos-duration="2000">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        
            <div class="contact-info-data" data-aos="fade-left" data-aos-duration="2000">
                <h3>Kontakt informacije</h3>
                <ul>
                    @if ($settings->phone)<li><i class="fas fa-phone-alt"></i>  {{$settings->phone}}</li>@endif
                    @if ($settings->phone)<li><i class="fas fa-envelope"></i>  {{$settings->email}}</li>@endif
                    @if ($settings->phone)<li><i class="fas fa-map-marker-alt"></i> {{$settings->address}}</li>@endif
                </ul>
            </div>
        </div>

        <div class="contact-form" data-aos="fade-right" data-aos-duration="2000">
            <form method="post" name="contact-form">
                <input type="hidden" name="post_id" value="101">
                <input type="hidden" name="form_id" value="ccca9af">
                
                <label for="name">Ime</label>
                <input type="text" id="name" name="name" placeholder="Name" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
                
                <label for="message">Poruka</label>
                <textarea id="message" name="message" rows="4" placeholder="Message" required></textarea>
                
                <button type="submit">Pošalji</button>
            </form>
        </div>
    </div>
</main>

@include('partials/footer')