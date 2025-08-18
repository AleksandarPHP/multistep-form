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
                      <p class="subtitle">Welche Stofffarbe wünschen Sie sich?</p>
                        <div class="row g-4">
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_4019_a.jpg')}}"
                                  alt="Gelb"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Gelb</p>
                                <input class="d-none" type="radio" name="design_color" value="Gelb">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_4020_a.jpg')}}"
                                  alt="Grün"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Grün</p>
                                <input class="d-none" type="radio" name="design_color" value="Grün">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_4034_a.jpg')}}"
                                  alt="Dunkelrot"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Dunkelrot</p>
                                <input class="d-none" type="radio" name="design_color" value="Dunkelrot">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_6900_a.jpg')}}"
                                  alt="Dunkelblau"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Dunkelblau</p>
                                <input class="d-none" type="radio" name="design_color" value="Dunkelblau">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row g-4 mt-3">
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_6150_a.jpg')}}"
                                  alt="Hellgrau"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Hellgrau</p>
                                <input class="d-none" type="radio" name="design_color" value="Hellgrau">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_4025_a.jpg')}}"
                                  alt="Beige"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Beige</p>
                                <input class="d-none" type="radio" name="design_color" value="Beige">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_4003_a.jpg')}}"
                                  alt="Dunkelgrau"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Dunkelgrau</p>
                                <input class="d-none" type="radio" name="design_color" value="Dunkelgrau">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/9964741.jpg')}}"
                                  alt="Individuelle Beratung vor Ort"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Individuelle Beratung vor Ort</p>
                                <input class="d-none" type="radio" name="design_color" value="Individuelle Beratung vor Ort">
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
                      <p class="subtitle">Welches Muster wünschen Sie sich?</p>
                        <div class="row g-4">
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5a">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_1225_a.jpg')}}"
                                  alt="Verkehrsweiß"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Verkehrsweiß</p>
                                <input class="d-none" type="radio" name="fabric_color" value="Verkehrsweiß">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5a">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_4510_a.jpg')}}"
                                  alt="Weißaluminium"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Weißaluminium</p>
                                <input class="d-none" type="radio" name="fabric_color" value="Weißaluminium">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5a">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_2642_a.jpg')}}"
                                  alt="Graualuminium"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Graualuminium</p>
                                <input class="d-none" type="radio" name="fabric_color" value="Graualuminium">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5a">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_2623_a.jpg')}}"
                                  alt="Anthrazit Eisenglimmer"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Anthrazit Eisenglimmer</p>
                                <input class="d-none" type="radio" name="fabric_color" value="Anthrazit Eisenglimmer">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row g-4 mt-3">
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5a">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_2171_a.jpg')}}"
                                  alt="Hellelfenbein"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Hellelfenbein</p>
                                <input class="d-none" type="radio" name="fabric_color" value="Hellelfenbein">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5a">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_4104_a.jpg')}}"
                                  alt="Sepiabraun"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Sepiabraun</p>
                                <input class="d-none" type="radio" name="fabric_color" value="Sepiabraun">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5a">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/M_4107_a.jpg')}}"
                                  alt="Anthrazitgrau"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Anthrazitgrau</p>
                                <input class="d-none" type="radio" name="fabric_color" value="Anthrazitgrau">
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-3 col-md-6">
                            <div class="choice-card card-s5a">
                              <div class="choice-image">
                                <img
                                  src="{{ asset('assets/images/9964741.jpg')}}"
                                  alt="Individuelle Beratung vor Ort"
                                  class="img-fluid"
                                />
                              </div>
                              <div class="choice-text">
                                <p>Individuelle Beratung vor Ort</p>
                                <input class="d-none" type="radio" name="fabric_color" value="Individuelle Beratung vor Ort">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-4 mt-4">
                  <p class="subtitle">Welche Gestellfarbe wünschen Sie sich?</p>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s5-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/9952935.jpg')}}"
                          alt="Verkehrsweiß"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Verkehrsweiß</p>
                        <input class="d-none" type="radio" name="frame_color" value="Verkehrsweiß">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s5-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/9952931.jpg')}}"
                          alt="Weißaluminium"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Weißaluminium</p>
                        <input class="d-none" type="radio" name="frame_color" value="Weißaluminium">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s5-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/9952932.jpg')}}"
                          alt="Graualuminium"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Graualuminium</p>
                        <input class="d-none" type="radio" name="frame_color" value="Graualuminium">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s5-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/w_4916_ms.jpg')}}"
                          alt="Anthrazit Eisenglimmer"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Anthrazit Eisenglimmer</p>
                        <input class="d-none" type="radio" name="frame_color" value="Anthrazit Eisenglimmer">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-4 mt-4">
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s5-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/9952738.jpg')}}"
                          alt="Hellelfenbein"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Hellelfenbein</p>
                        <input class="d-none" type="radio" name="frame_color" value="Hellelfenbein">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s5-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/w_4918_ms.jpg')}}"
                          alt="Sepiabraun"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Sepiabraun</p>
                        <input class="d-none" type="radio" name="frame_color" value="Sepiabraun">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s5-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/9952882.jpg')}}"
                          alt="Anthrazitgrau"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Anthrazitgrau</p>
                        <input class="d-none" type="radio" name="frame_color" value="Anthrazitgrau">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card card-s5-1">
                      <div class="choice-image">
                        <img
                          src="{{ asset('assets/images/83001115v2.jpg')}}"
                          alt="Individuelle Beratung vor Ort"
                          class="img-fluid"
                        />
                      </div>
                      <div class="choice-text">
                        <p>Individuelle Beratung vor Ort</p>
                        <input class="d-none" type="radio" name="frame_color" value="Individuelle Beratung vor Ort">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row g-4 mt-4">
                  <p class="subtitle">Möchten Sie uns noch etwas mitteilen?</p>
                  <div class="col-lg-3 col-md-6">
                    <textarea name="message" id="" rows="10" cols="60"></textarea>
                  </div>
                </div>
              </div>