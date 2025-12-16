<div class="form-step" data-step="1" id="step-1">
                <div class="row">
                  <div class="col-12">
                    <h2 class="title">Produktauswahl</h2>
                    <p class="subtitle">
                      Folgende Produkte stehen Ihnen zur Auswahl:
                    </p>
                  </div>
                </div>
                @php
                    $products = Helper::produkte();
                @endphp
                <div class="row g-4 mb-3">
                  @foreach ($products as $product)
                  <div class="col-lg-3 col-md-6">
                    <div @class(['choice-card card-option', 'selected'  => $loop->first]) data-id="{{ $product->id }}">
                      <div class="choice-image"> 
                        @if ($product->image)
                        <img
                          src="{{ asset('storage/'.$product->image)}}"
                          alt="{{$product->title}}"
                          class="img-fluid"
                        />
                        @else
                        <img
                          src="{{ asset('cmsfiles/images/placeholder-images.jpg')}}"
                          alt="{{$product->title}}"
                          class="img-fluid"
                        />    
                        @endif

                      </div>
                      <div class="choice-text">
                        <p>{{$product->title}}</p>
                        <input class="d-none" type="radio" data-price="{{$product->price}}" data-price-range="{{$product->price_range}}" name="product" id="{{$product->id}}" value="{{$product->id}}" @if($loop->first) checked data-first="{{$product->id}}" @endif>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="row">
                  <div class="col-12">
                    <p class="subtitle">
                      Wo soll das Produkt stehen?
                    </p>
                  </div>
                </div>
                @php
                    $items = Helper::produktePosition();
                @endphp
                <div class="row g-4">
                  @foreach ($items as $item)
                  <div class="col-lg-3 col-md-6">
                    <div class="choice-card produktePosition">
                      <div class="choice-image">
                        @if($item->image)
                        <img
                          src="{{ asset('storage/'.$item->image)}}"
                          alt="{{$item->title}}"
                          class="img-fluid"
                        />
                        @else
                        <img
                          src="{{ asset('cmsfiles/images/placeholder-images.jpg')}}"
                          alt="{{$item->title}}"
                          class="img-fluid"
                        />    
                        @endif
                      </div>
                      <div class="choice-text">
                        <p>{{ $item->title }}</p>
                        <input class="d-none"type="radio" data-price="{{ $item->price }}" name="product_position" id="product_position_{{ $item->id }}" value="{{$item->id}}">
                      </div>
                    </div>
                  </div>
                  @endforeach
                </div>

                <div id="floorSelection" class="row mt-5 d-none">
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


<script>
  $(document).ready(function () {
    let firstItem = $('input[data-first]');

    let firstItemid = firstItem.data('first');
    let firstItemPrice = firstItem.data('price');
    let firstItemPriceRange = firstItem.data('price-range');
    if (firstItemid) {
        showOptionItems(firstItemid);
        calculatePrice(firstItemPrice, firstItemPriceRange);
    }
});
</script>