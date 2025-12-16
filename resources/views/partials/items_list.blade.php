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
                        <div @class(['choice-card card-item item-'.$option->id, 'selected'  => $loop->first]) data-item-id="{{ $option->id }}">
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
                            <input class="d-none"type="radio" data-price="{{ $item->price }}" name="option[{{ $option->id }}]" id="option-{{ $item->id }}" value="{{ $item->id }}"  @checked($loop->first)>
                            </div>
                        </div>
                    </div>
                @endforeach
                <script>
                    $(document).on('click', '.card-item', function() {
                        let id = $(this).data('item-id');
                        $('.item-' + id).removeClass('selected');
                        $('.item-' + id).parent().find('input').prop('checked', false)

                        $(this).addClass('selected')
                        $(this).parent().find('input').prop('checked', true)
                        });
                </script>
            </div>
        </div>
    @endforeach
</div>