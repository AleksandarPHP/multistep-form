@section('title', Helper::title(22))
@include('partials.header', ['isTransparent' => true])
@php
    $text = Helper::text(23);
@endphp
<main>
    <section class="hero" style="max-height: 85dvh">
        <img src="{{ asset('storage/'.$text->image) }}" alt="Ski Resort">
        <div class="booking-container">
            <form method="GET" target="_blank" class="">
                <div>
                    <div>
                        <i class="fa-solid fa-calendar"></i>
                        <h4>Check in</h4>
                    </div>
                    <input type="date" id="checkIn" name="checkin_date"/>
                </div>
                <div>
                    <div>
                        <i class="fa-solid fa-calendar"></i>
                        <h4>Check out</h4>
                    </div>
                    <input type="date" id="checkOut" name="checkout_date"/>
                </div>
                <div>
                    <div>
                        <i class="fa-solid fa-user"></i>
                        <h4>Guests</h4>
                    </div>
                    <div class="gests-wrapper">
                        <div>
                            <button type="button" class="btn-decrease" onclick="updateGuestCount(-1)">-</button>
                            <input
                                name="adults" type="text" id="guest-count" value="2" min="1" max="4" readonly
                            />
                            <button type="button" class="btn-increase" onclick="updateGuestCount(1)">+</button>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <i class="fa-solid fa-user"></i>
                            <h4>Children</h4>
                        </div>
                    </div>
                    <div>
                        <div class="children-wrapper"> 
                            <button type="button" class="btn-decrease" onclick="updateChildCount(-1)">-</button>
                            <input name="children" type="text" id="child-count" value="0" min="0" max="3" readonly
                            />
                            <button type="button" class="btn-increase" onclick="updateChildCount(1)">+</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="1" name="nights" id="ReserveNights">
                <div>
                    <button type="submit" class="btnn btn_secondary">
                        Book now
                    </button>
                </div>
            </form>
        </div>
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
        $text = Helper::text(24);
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
    $slider = Helper::slider(17);
@endphp
<section class="apartments">
    <div class="container">
        <script type="text/javascript">
            window.wbpSettings = window.wbpSettings || {};
            window.wbpSettings = {
                'hotelId': '33636',
                'language': 'en',
                'currency': 'EUR',
                'showLogo': '0',
                'showProperty': 0,
                'showFooter': '0',
                'darktheme': '0'
            }
            </script>
            <script>
            fetch('https://booking.webbookingpro.com/asset-manifest.json')
                .then((response) => response.json())
                .then(({entrypoints}) => {
                    entrypoints.forEach(file => {
                        if (file.endsWith('.css')) {
                            var css = document.createElement('link');
                            css.rel = 'stylesheet';
                            css.href = 'https://booking.webbookingpro.com/' + file;
                            document.head.appendChild(css);
                        }
                        else if (file.endsWith('js')) {
                            var script = document.createElement('script');
                            script.src = 'https://booking.webbookingpro.com/' + file;
                            document.head.appendChild(script);
                        }
                    });
                });
            </script>
            <div id="wbproot"></div>
    </div>
</section>
<section class="apartments">
    <h2 class="title" data-aos="zoom-in" data-aos-duration="1500">{{$slider->title ?? ''}}</h2>
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
</section>
@php
    $slider = Helper::slider(18);
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
    $slider = Helper::slider(19);
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
    $slider = Helper::slider(20);
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

    <div class="contact-container mt-5">
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

                <label for="name">{{__('Name')}}</label>
                <input type="text" id="name" name="Name goes here" placeholder="Name" required>
                
                <label for="email">Email</label>
                <input type="email" id="email" name="Email goes here" placeholder="Email" required>
                
                <label for="message">{{__('Message')}}</label>
                <textarea id="message" name="message" rows="4" placeholder="Message text goes here" required></textarea>
                
                <button type="submit">{{__('Send')}}</button>
            </form>
        </div>
    </div>
    <script>
    function formatDate(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0'); // Dodaje 0 ispred jednocifrenih meseci
        const day = String(date.getDate()).padStart(2, '0');       // Dodaje 0 ispred jednocifrenih dana
        return `${year}-${month}-${day}`;
    }

    function addDays(date, days) {
        const result = new Date(date);
        result.setDate(result.getDate() + days);
        return result;
    }

    const checkInInput = document.getElementById('checkIn');
    const checkOutInput = document.getElementById('checkOut');

    const today = new Date();
    checkInInput.value = formatDate(today);
    checkOutInput.value = formatDate(addDays(today, 1));

    function syncCheckOut() {
        const checkInDate = new Date(checkInInput.value);
        if (!isNaN(checkInDate.getTime())) { 
            console.log('ispravno');
            
            checkOutInput.value = formatDate(addDays(checkInDate, 1));
        }
    }

    checkInInput.addEventListener('input', syncCheckOut);

    function updateGuestCount(change) {
        const input = document.getElementById("guest-count");
        let currentValue = parseInt(input.value);

        const newValue = currentValue + change;
        if (newValue >= 1 && newValue <= 4) {
            input.value = newValue;
        }
    }

    function updateChildCount(change) {
        const inputCh = document.getElementById("child-count");
        let currentChValue = parseInt(inputCh.value);

        const newChValue = currentChValue + change;
        if (newChValue >= 0 && newChValue <= 3) {
            inputCh.value = newChValue;
        }
    }
    </script>
</main>

@include('partials/footer')