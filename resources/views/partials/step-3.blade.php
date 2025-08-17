<div class="form-step" data-step="3">
                <div class="row">
                  <div class="col-12">
                    <h2 class="title">Zubehör</h2>
                    <p class="subtitle">
                      Wünschen Sie sich ein Volant-Rollo?
                    </p>
                  </div>
                </div>
                <div class="row g-4">
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s3">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/volant_auswahl___true.png')}}"
                          alt="Mit Volant-Rollo"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Mit Volant-Rollo</p>
                        <input class="d-none" type="radio" name="valance_blind" id="" value="Mit Volant-Rollo">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s3">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/volant_auswahl___false.png')}}"
                          alt="Ohne Volant-Rollo"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Ohne Volant-Rollo</p>
                        <input class="d-none" type="radio" name="valance_blind" id="" value="Ohne Volant-Rollo">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <p class="subtitle">
                      Welches Zubehör benötigen Sie? (Mehrfachauswahl)
                    </p>
                  </div>
                </div>
                <div class="row g-4">
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s3-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/zubehoer___led_beleuchtung.png')}}"
                          alt="LED-Beleuchtung"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>LED-Beleuchtung</p>
                        <input class="d-none" type="radio" name="equipment" id="" value="LED-Beleuchtung">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s3-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/zubehoer___heizstrahler.png')}}"
                          alt="Heizstrahler"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Heizstrahler</p>
                        <input class="d-none" type="radio" name="equipment" id="" value="Heizstrahler">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s3-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/zubehoer___windsensor_kassette_gelenkarm.png')}}"
                          alt="Windsensor"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Windsensor</p>
                        <input class="d-none" type="radio" name="equipment" id="" value="Windsensor">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-12">
                    <p class="subtitle">
                      Wünschen Sie sich eine Steuerung? (Mehrfachauswahl)
                    </p>
                  </div>
                </div>
                <div class="row g-4">
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s3-2">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/steuerungs_auswahl___handsender.png')}}"
                          alt="Handsender"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Handsender</p>
                        <input class="d-none" type="radio" name="control" id="" value="Windsensor">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s3-2">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/steuerungs_auswahl___smartphone.png')}}"
                          alt="Smartphone"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Smartphone</p>
                        <input class="d-none" type="radio" name="control" id="" value="Windsensor">
                      </div>
                    </div>
                  </div>
                </div>

                {{-- <div class="row mt-5">
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
                </div> --}}
              </div>