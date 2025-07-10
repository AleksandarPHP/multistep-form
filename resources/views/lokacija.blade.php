@section('title',Helper::title(14))
@include('partials.header', ['isTransparent' => false])
@php
    $text = Helper::text(15);
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
                    {!!$text->description!!}
    
                </p>
            </div>
        </div>
    </div>
    @php
        $text = Helper::text(16);
    @endphp
    <div class="simple-column-section">
        <h1 class="title" data-aos="fade-left" data-aos-duration="1500">{{$text->title}}</h1>
        <h2 class="subtitle" data-aos="fade-left" data-aos-duration="2000">{{$text->subtitle}}</div>
        <div class="simple-column-container">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1300">{!!$text->description!!}</div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1300">{!!$text->description!!}</div>
        </div>
    </div>

    <div class="google-map" data-aos="fade-up" data-aos-duration="1500">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2882.8082803301954!2d18.56541387600685!3d43.73530947109838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4758bfcbd0b76b95%3A0xaeca4a33633713f8!2z0KLQtdGA0LzQsNCzINCl0L7RgtC10Ls!5e0!3m2!1ssr!2sus!4v1737678366655!5m2!1ssr!2sus" 
            width="600" height="450" style="border:0;" 
            allowfullscreen="" loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</main>

@include('partials/footer')