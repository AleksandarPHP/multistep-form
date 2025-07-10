<section class="invest">
    <div class="container">
        <div class="content-wrapper">
            <h4 data-aos="fade-down"
            data-aos-easing="linear"
            data-aos-duration="1000">{{__('INVEST IN PURCHASES')}}</h4>
            <h3 data-aos="fade-up"
            data-aos-easing="linear"
            data-aos-duration="1300">
           {{__('Monterra Concept Termag APARTMENT in the MOST MODERN SKI AREA IN THE REGION')}}
            </h3>
            <a href="#" class="button button_secondary" data-aos="zoom-out" data-aos-duration="1500" data-bs-toggle="modal" data-bs-target="#contactModal">{{__('request for quotation')}}</a>
        </div>
    </div>
</section>
<section class="termag">
    <div class="container">
        <div class="wrapper">
            <div class="row">
                <div class="col-md-6 offset-lg-1">
                    <a href="#">
                        <img style="max-width:50%;"
                            src="{{asset('assets/images/black-logo.webp')}}"
                            alt="logo"
                            class="img-fluid"
                        />
                    </a>
                    <h2>TERMAG</h2>
                </div>
            </div>
        </div>
    </div>
</section>

<footer>
    <div class="container footer-container">
        <div class="row">
            <div class="col-lg-2">
                <ul class="social">
                    @if ($settings->facebook) 
                    <li>
                        <a href="{{$settings->facebook}}">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    @endif
                    @if ($settings->facebook) 
                    <li>
                        <a href="{{$settings->instagram}}">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    @endif
                    @if ($settings->linkedin) 
                    <li>
                        <a href="{{$settings->linkedin}}">
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </li>
                    @endif
                    @if ($settings->twitter) 
                    <li>
                        <a href="{{$settings->twitter}}">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>
                    @endif
                </ul>
                <h5>{{__('Follow us')}}</h5>
                <p class="txt">
                    {{__('If you want just your piece of mountain paradise at the most popular ski resort in Southeastern Europe, Monterra concept Termag is the only logical choice!')}}
                </p>
            </div>
            <div class="col-lg-1 offset-lg-1">
                <ul>
                    <li>
                        <a href="{{ Helper::url('o-nama') }}" role="button">
                            {{__('About us')}}
                        </a> 
                   </li>
                    <li>
                        <a href="{{ Helper::url('sadrzaj') }}" role="button">
                            {{__('Content')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ Helper::url('apartmani') }}" role="button">
                            {{__('Apartments')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ Helper::url('kupovina') }}" role="button">
                            {{__('Shopping')}}
                        </a>
                    </li>
                    <li>
                        <a href="{{ Helper::url('najam-apartmana') }}" role="button"> 
                            {{__('Apartment rent')}}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <i class="fa-solid fa-location-dot"></i>
                <h3>{{__('Location')}}</h3>
                <p>
                   {{$settings->title}}, {{$settings->address}} , Bosna i Hercegovina
                    <br />
                    Telefoni: +387 57 270 422, +387 57 272 100 <br />
                    Faks: +387 57 270 423, +387 57 272 072
                </p>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <i class="fa-solid fa-envelope"></i>
                <h3>{{__('Contact')}}</h3>
                <a class="mail-address" href="mailto:{{$settings->email}}">
                    {{$settings->email}}</a
                >
                <form action="#">
                    <input class="newsletter" type="text" placeholder="Email Adresa" />
                    <button type="submit" class="button button_secondary">
                        {{__('Send')}}
                    </button>
                </form>
            </div>
        </div>

        <div class="lastline">
            <p>Copyright 2024 © Hotel Termag. Sva prava zadržana. Created by 
                <a href="https://soft4tech.com/">SoftTech</a>
            </p>
            <ul>
                <li>
                    <a href="#">DIsclaimer</a>
                </li>
                <li><a href="#">Privacy Policy</a>\\\</li>
                <li>
                    <a href="#">Term Of Use</a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<style>
    .modal-content {
        border-radius: 0;
    }
    .modal-body label {
        font-size: 2.23rem;
    }
    .modal-body h2 {
        font-size: 3.23rem;
    }

    .my-form-control {
    display: block;
    width: 100%;
    padding: 1.375rem .75rem;
    font-size: 1.5rem;
    font-weight: 400;
    line-height: 1.5;
    color: var(--bs-body-color);
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-color: var(--bs-body-bg);
    background-clip: padding-box;
    border: var(--bs-border-width) solid var(--bs-border-color);
    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
</style>
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title fs-4" id="contactModalLabel">Za sva pitanja i nedoumice</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/kontakt') }}" method="POST">
                    @csrf
                    <h2 class="text-center">{{__('Contact us')}}</h2>
                    <br>
                    <br>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">{{__('Name')}} <span class="text-danger">*</span></label>
                            <input type="text" class="my-form-control" name="firstName" id="firstName" placeholder="{{__('Name')}} " required>
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">{{__('Last name')}} <span class="text-danger">*</span></label>
                            <input type="text" class="my-form-control" name="lastName" id="lastName" placeholder="{{__('Last name')}}" required>
                        </div>
                    </div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="phone" class="form-label">{{__( 'Mobile number')}} <span class="text-danger">*</span></label>
                            <input type="tel" class="my-form-control" name="phone" id="phone" placeholder="{{__( 'Mobile number')}}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">{{__('E-mail')}} <span class="text-danger">*</span></label>
                            <input type="email" class="my-form-control" name="email" id="email" placeholder="Unesite email" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="question" class="form-label">{{__('Ask a question')}} <span class="text-danger">*</span></label>
                        <textarea class="my-form-control" id="question" name="question" rows="4" placeholder="{{__('Ask a question')}}" required></textarea>
                    </div>
                    <br>
                    <br>
                    <div class="text-center">
                        <button type="submit" class="button button_primary">{{__('Send')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
/>
<script
    type="text/javascript"
    src="//code.jquery.com/jquery-migrate-1.2.1.min.js"
></script>
<script
    type="text/javascript"
    src="{{ asset('assets/slick-1.8.1/slick/slick.min.js') }}"
></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    $(document).ready(function(e) {
      @if(session('status'))
      $.toast({
        heading: 'Uspijeh.',
        text: {!! json_encode(session('status')) !!},
        hideAfter: 6000,
        position: 'top-right',
        icon: 'success',
        loader: true,
        loaderBg: '#2492D1'
      });
      @endif
    })
</script>
<script src="{{ asset('assets/script/script.js') }}"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
  </script>
</body>
</html>