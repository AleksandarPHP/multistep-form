<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Configure Your Sun Protection</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
    <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}" />
    <link rel="stylesheet" href="{{asset('assets/style/jquery.toast.css')}}">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>
    <script src="{{asset('assets/script/jquery.toast.js')}}"></script>
  </head>
  <body>
    <form class="form-wizard py-5" action="{{url('konfigurator')}}" method="POST">
      @csrf
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-10">
            <h1 class="title">Konfigurieren Sie jetzt Ihren Sonnenschutz</h1>
            <p class="subtitle">Willkommen beim digitalen Kaufberater</p>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="form-progress-wrapper">
              <div class="form-progress">
                <div class="form-progress-bar"></div>
                <div class="form-progress-steps">
                  <span class="form-progress-step active" data-step="1">1</span>
                  <span class="form-progress-step" data-step="2">2</span>
                  <span class="form-progress-step" data-step="3">3</span>
                  <span class="form-progress-step" data-step="4">4</span>
                  <span class="form-progress-step" data-step="5">5</span>
                </div>
              </div>
            </div>

            <div class="form-step-container">
              <div class="form-step active" data-step="0">
                <div class="row g-4">
                  <div class="col-md-6">
                    <div class="choice-card card-s0">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/Ich-weiß-schon-was-ich-will.png')}}"
                          alt="I know what I want"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Ich weiß schon was ich will</p>
                        <input class="d-none" type="radio" name="advisor" value="Ich weiß schon was ich will">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="choice-card card-s0">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/Ikonwwhatiwill.png')}}"
                          alt="I need advice"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Ich suche Beratung</p>
                        <input class="d-none"type="radio" name="advisor" value="Ich suche Beratung">
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @include('partials.step-1')
              @include('partials.step-2')
              @include('partials.step-3')
              @include('partials.step-4')
              @include('partials.step-5')

              <div class="form-step" data-step="6">
                <div class="row">
                  <div class="col-12">
                    <div class="personal-info-form">
                      <h5 class="form-question">
                        Wer soll das unverbindliche und kostenlose Angebot
                        erhalten?
                      </h5>

                      <div class="row mb-3">
                        <div class="col-md-6">
                          <button class="form-selection-btn w-100 py-3">
                            Herr
                          </button>
                          <input class="d-none" type="radio" name="sex" value="Herr" id="herr">
                        </div>
                        <div class="col-md-6 mb-3 mb-md-0">
                          <button class="form-selection-btn w-100 py-3">
                            Frau
                          </button>
                          <input class="d-none" type="radio" name="sex" value="Frau" id="frau">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                          <div class="form-group">
                            <label for="firstname">Vorname*:</label>
                            <input
                              type="text"
                              name="firstname"
                              class="form-control"
                              id="firstname"
                              required
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="lastname">Nachname*:</label>
                            <input
                              type="text"
                              name="lastname"
                              class="form-control"
                              id="lastname"
                              required
                            />
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                          <div class="form-group">
                            <label for="phone">Telefon*:</label>
                            <input
                              type="tel"
                              name="phone"
                              class="form-control"
                              id="phone"
                              required
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="email">E-Mail*:</label>
                            <input
                              type="email"
                              name="email"
                              class="form-control"
                              id="email"
                              required
                            />
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                          <div class="form-group">
                            <label for="street">Straße*:</label>
                            <input
                              type="text"
                              name="street"
                              class="form-control"
                              id="street"
                              required
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="housenumber">Hausnummer*:</label>
                            <input
                              type="text"
                              name="housenumber"
                              class="form-control"
                              id="housenumber"
                              required
                            />
                          </div>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                          <div class="form-group">
                            <label for="plz">PLZ*:</label>
                            <input
                              type="text"
                              name="plz"
                              class="form-control"
                              id="plz"
                              required
                            />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="city">Stadt*:</label>
                            <input
                              type="text"
                              name="city"
                              class="form-control"
                              id="city"
                              required
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-navigation mt-4">
              <div class="row">
                <div class="col-6 text-start">
                  <button
                    type="button"
                    class="btn-prev btn btn-outline-secondary"
                    disabled
                  >
                    Zurück
                  </button>
                </div>
                <div class="col-6 text-end">
                  <button type="button" class="btn-next btn btn-primary">
                    Weiter
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/script/script.js')}}"></script>
    <script>
      $(document).ready(function(e) {
        @if(session('status'))
        $.toast({
          heading: 'Es ist mir gelungen..',
          text: {!! json_encode(session('status')) !!},
          hideAfter: 6000,
          position: 'top-right',
          icon: 'success',
          loader: true,
          loaderBg: '#2492D1'
        });
        @endif
        @if($errors->any())
        $.toast({
          heading: 'Error.',
          text: [
            @foreach($errors->all() as $error)
            {!! json_encode($error) !!},
            @endforeach
          ],
          hideAfter: 7000,
          position: 'top-right',
          icon: 'error',
          loader: true,
          loaderBg: '#2492D1'
        });
        @endif
      })
      function getDate(){
          var today = new Date();
          document.getElementById("date").value = today.getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2);
      }
  </script>
  </body>
</html>
