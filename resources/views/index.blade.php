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
    <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}" />
  </head>
  <body>
    <form class="form-wizard py-5" action="form.html">
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
                    <div class="choice-card">
                      <div class="choice-image">
                        <img
                          src="assets/images/intro.jpg"
                          alt="I know what I want"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Ich weiß schon was ich will</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="choice-card">
                      <div class="choice-image">
                        <img
                          src="assets/images/intro.jpg"
                          alt="I need advice"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Ich suche Beratung</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-step" data-step="1">
                <div class="row">
                  <div class="col-12">
                    <h2 class="title">Produktauswahl</h2>
                    <p class="subtitle">
                      Folgende Produkte stehen Ihnen zur Auswahl:
                    </p>
                  </div>
                </div>

                <div class="row g-4">
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card">
                      <div class="choice-image">
                        <img
                          src="assets/images/intro.jpg"
                          alt="Kassetten-Markise"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Kassetten-Markise</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mt-5">
                  <div class="col-12">
                    <div class="floor-selection">
                      <h3 class="form-section-title">
                        Bitte geben Sie die Etage an:
                      </h3>
                      <div class="row align-items-center mt-4">
                        <div class="col-md-3 col-sm-4">
                          <div class="form-group">
                            <input
                              type="number"
                              class="form-control text-center"
                              value="3"
                              min="1"
                              max="5"
                            />
                          </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                          <div class="range-slider d-flex align-items-center">
                            <span class="range-value me-2">1</span>
                            <input
                              type="range"
                              class="form-range"
                              min="1"
                              max="5"
                              value="3"
                              id="floorRange"
                            />
                            <span class="range-value ms-2">5</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-step" data-step="2">
                <div class="row">
                  <div class="col-12">
                    <h2 class="title">Spezifikation</h2>
                    <p class="subtitle">
                      Welche Kassetten-Markisen Ausführung wünschen Sie sich?
                    </p>
                  </div>
                </div>
                <div class="row g-4">
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card">
                      <div class="choice-image">
                        <img
                          src="assets/images/intro.jpg"
                          alt="Kassetten-Markise"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Kassetten-Markise</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="price-info-box">
                      <h3 class="price-info-title">
                        Unverbindliche Preisinformation inkl. Produkt, Planung,
                        Montage und MwSt.
                      </h3>
                      <div class="price-range">
                        <span>3.700 €</span>
                        <span class="separator">-</span>
                        <span>4.500 €</span>
                      </div>
                      <p class="price-info-note">
                        Ein exakter Preis kann erst nach Aufmaß und Bemusterung
                        ermittelt werden.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-step" data-step="3">
                <div class="row">
                  <div class="col-12">
                    <h2 class="title">Spezifikation</h2>
                    <p class="subtitle">
                      Welche Kassetten-Markisen Ausführung wünschen Sie sich?
                    </p>
                  </div>
                </div>
                <div class="row g-4">
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card">
                      <div class="choice-image">
                        <img
                          src="assets/images/intro.jpg"
                          alt="Kassetten-Markise"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Kassetten-Markise</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-5">
                  <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="price-info-box">
                      <h3 class="price-info-title">
                        Unverbindliche Preisinformation inkl. Produkt, Planung,
                        Montage und MwSt.
                      </h3>
                      <div class="price-range">
                        <span>3.700 €</span>
                        <span class="separator">-</span>
                        <span>4.500 €</span>
                      </div>
                      <p class="price-info-note">
                        Ein exakter Preis kann erst nach Aufmaß und Bemusterung
                        ermittelt werden.
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-step" data-step="4">
                <div class="row mt-5">
                  <div class="col-12">
                    <div class="floor-selection">
                      <h3 class="form-section-title">
                        Bitte geben Sie die Etage an:
                      </h3>
                      <div class="row align-items-center mt-4">
                        <div class="col-md-3 col-sm-4">
                          <div class="form-group">
                            <input
                              type="number"
                              class="form-control text-center"
                              value="3"
                              min="1"
                              max="5"
                            />
                          </div>
                        </div>
                        <div class="col-md-9 col-sm-8">
                          <div class="range-slider d-flex align-items-center">
                            <span class="range-value me-2">1</span>
                            <input
                              type="range"
                              class="form-range"
                              min="1"
                              max="5"
                              value="3"
                              id="floorRange"
                            />
                            <span class="range-value ms-2">5</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-step" data-step="5">
                <div class="row">
                  <div class="col-12">
                    <h2 class="title">Farbe und Stoffe</h2>
                    <p class="subtitle">
                      Welche Farbgestaltung wünschen sie sich?
                    </p>
                    <nav class="mt-5 mb-3">
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button
                          class="nav-link active"
                          id="nav-gestell-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#nav-gestell"
                          type="button"
                          role="tab"
                          aria-controls="nav-gestell"
                          aria-selected="true"
                        >
                          Einfarbig
                        </button>
                        <button
                          class="nav-link"
                          id="nav-stoff-tab"
                          data-bs-toggle="tab"
                          data-bs-target="#nav-stoff"
                          type="button"
                          role="tab"
                          aria-controls="nav-stoff"
                          aria-selected="false"
                        >
                          Gemustert
                        </button>
                      </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div
                        class="tab-pane fade show active"
                        id="nav-gestell"
                        role="tabpanel"
                        aria-labelledby="nav-gestell-tab"
                      >
                        <div class="row g-4">
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card">
                              <div class="choice-image">
                                <img
                                  src="assets/images/intro.jpg"
                                  alt="Weiß"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Weiß</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card">
                              <div class="choice-image">
                                <img
                                  src="assets/images/intro.jpg"
                                  alt="Anthrazit"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Anthrazit</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card">
                              <div class="choice-image">
                                <img
                                  src="assets/images/intro.jpg"
                                  alt="Silber"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Silber</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div
                        class="tab-pane fade"
                        id="nav-stoff"
                        role="tabpanel"
                        aria-labelledby="nav-stoff-tab"
                      >
                        <div class="row g-4">
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card">
                              <div class="choice-image">
                                <img
                                  src="assets/images/intro.jpg"
                                  alt="Rot"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Rot</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card">
                              <div class="choice-image">
                                <img
                                  src="assets/images/intro.jpg"
                                  alt="Blau"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Blau</p>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card">
                              <div class="choice-image">
                                <img
                                  src="assets/images/intro.jpg"
                                  alt="Gestreift"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Gestreift</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-step" data-step="6">
                <div class="row">
                  <div class="col-12">
                    <h2 class="title">
                      Konfigurieren Sie jetzt Ihren Sonnenschutz
                    </h2>
                    <div class="personal-info-form">
                      <h5 class="form-question">
                        Wer soll das unverbindliche und kostenlose Angebot
                        erhalten?
                      </h5>

                      <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                          <button class="form-selection-btn w-100 py-3">
                            Frau
                          </button>
                        </div>
                        <div class="col-md-6">
                          <button class="form-selection-btn w-100 py-3">
                            Herr
                          </button>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <div class="col-md-6 mb-3 mb-md-0">
                          <div class="form-group">
                            <label for="firstname">Vorname*:</label>
                            <input
                              type="text"
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
    <script src="assets/script/script.js"></script>
  </body>
</html>
