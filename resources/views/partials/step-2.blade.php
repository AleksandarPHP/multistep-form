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
                    <div class="choice-card card-s2">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/kassetten_markise_art___rund.png')}}"
                          alt="Rund"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Rund</p>
                        <input class="d-none" type="radio" name="design" id="" value="Rund">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s2">
                      <div class="choice-image">
                        <img 
                          src="{{ asset('assets/images/kassetten_markise_art___eckig.png')}}"
                          alt="Eckig"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Eckig</p>
                        <input class="d-none" type="radio" name="design" id="" value="Eckig">
                      </div>
                    </div>
                  </div>  
                </div>

                <div class="row">
                  <div class="col-12">
                    <p class="subtitle">
                      Welche Montageart wünschen Sie sich?
                    </p>
                  </div>
                </div>
                <div class="row g-4">
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s2-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/montageart___wandmontage.png')}}"
                          alt="Wandmontage"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Wandmontage</p>
                        <input class="d-none" type="radio" name="kind_instalation" id="" value="Wandmontage">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s2-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/montageart___deckenmontage.png')}}"
                          alt="Deckenmontage"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Deckenmontage</p>
                        <input class="d-none" type="radio" name="kind_instalation" id="" value="Deckenmontage">
                      </div>
                    </div>
                  </div>  
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s2-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/montageart___dachsparrenmontage.png')}}"
                          alt="Dachsparrenmontage"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Dachsparrenmontage</p>
                        <input class="d-none" type="radio" name="kind_instalation" id="" value="Dachsparrenmontage">
                      </div>
                    </div>
                  </div>  
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s2-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/montageart___sonstiges.png')}}"
                          alt="Keine Präferenz"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Keine Präferenz</p>
                        <input class="d-none" type="radio" name="kind_instalation" id="" value="Keine Präferenz">
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