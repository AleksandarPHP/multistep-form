<div data-step="2" id="accessories-list">
    @foreach ($accessories as $accessory)
        <div id="card-s2" >
            <div class="row">
                <div class="col-12">
                <p class="subtitle">
                    {{ $accessory->title }}
                </p>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($accessory->items as $item)
                    <div class="col-lg-3 col-md-6">
                        <div @class(['choice-card card-accessory accessory-'.$accessory->id, 'selected'  => $loop->first]) data-accessory-id="{{ $accessory->id }}">
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
                            <input class="d-none"type="radio" data-price="{{$item->price}}" name="accessory[{{ $accessory->id }}]" id="" value="{{ $item->id }}" @checked($loop->first)>
                            </div>
                        </div>
                    </div>
                @endforeach
                <script>
                    // $(document).ready(function() {
                    //     $('.card-accessory.selected').each(function () {
                    //         $(this).find('input[type="radio"]').prop('checked', true);
                    //     });
                    // });

                    $(document).on('click', '.card-accessory', function() {
                        let id = $(this).data('accessory-id');
                        $('.accessory-' + id).removeClass('selected');
                        $('.accessory-' + id).parent().find('input').prop('checked', false)
                                                
                        $(this).addClass('selected')
                        $(this).parent().find('input').prop('checked', true)
                        recalculateTotalPrice();

                    });
                </script>
            </div>
        </div>
    @endforeach
</div>