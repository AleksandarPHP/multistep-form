<div data-step="2" id="colors-list">
    @foreach ($colors as $color)
        <div id="card-s2" >
            <div class="row">
                <div class="col-12">
                <p class="subtitle">
                    {{ $color->title }}
                </p>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($color->items as $item)
                    <div class="col-lg-3 col-md-6">
                        <div @class(['choice-card card-color color-'.$color->id, 'selected'  => $loop->first]) data-color-id="{{ $color->id }}">
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
                            <input class="d-none"type="radio" data-price="1225.23" name="color[{{ $color->id }}]" id="" value="{{ $item->title }}" @checked($loop->first)>
                            </div>
                        </div>
                    </div>
                @endforeach
                <script>
                    $(document).on('click', '.card-color', function() {
                        let id = $(this).data('color-id');
                        $('.color-' + id).removeClass('selected');
                        $('.color-' + id).parent().find('input').prop('checked', false)
                                                
                        $(this).addClass('selected')
                        $(this).parent().find('input').prop('checked', true)
                        });
                </script>
            </div>
        </div>
    @endforeach
</div>