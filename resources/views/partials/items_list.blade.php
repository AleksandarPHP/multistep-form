<div data-step="2" id="options-list">
    @foreach ($options as $option)
        <div id="card-s2" >
            <div class="row">
                <div class="col-12">
                <p class="subtitle">
                    {{ $option->title }}
                </p>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($option->items as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="choice-card card-s2">
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
                            <input class="d-none"type="radio" data-price="1225.23" name="option{{ $option->id }}" id="" value="{{ $item->title }}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>