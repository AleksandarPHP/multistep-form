@extends('cms.layout.container')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('cms') }}">HOME</a>
    </li>
    <li class="breadcrumb-item active">Items</li>
</ol>
<h1>Items</h1>
<hr>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="@if(!$editing) {{ url('cms/color-items') }} @else {{ url('cms/color-items/'.$item->id) }} @endif" enctype="multipart/form-data">
            @csrf
            @if($editing) @method('PUT') @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Name" value="{{ old('title', $item->title) }}" {!! $errors->has('title') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="order">Order</label>
                        <input name="order" type="number" class="form-control" id="order" placeholder="Order" value="{{ old('order', $item->order) }}" {!! $errors->has('order') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input name="price" type="number" class="form-control" id="price" placeholder="Price" value="{{ old('price', $item->price) }}" {!! $errors->has('price') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="option_id">Optionen</label>
                        <select name="option_ids[]" multiple="multiple" class="form-control" id="option_ids" {!! $errors->has('option_ids') ? 'style="border-color:red;"' : '' !!}>
                            @foreach ($options as $option)
                                <option value="{{ $option->id }}" @selected($item->option->contains($option->id))>{{$option->title}} (id:{{ $option->id }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Aktiv?</label>
                    <div class="form-check form-switch">
                        <input name="is_active" value="1" class="form-check-input" style="padding-left: 35px; padding-top:20px;" type="checkbox" role="switch" id="flexSwitchCheckChecked" @checked(old('is_active', $item->is_active))>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>

                    <div class="col-md-3">
                        <div class="form-group">
                            {{-- <label>Min: {{ $width }}x{{ $height }}px</label> --}}
                        </div>
                        <div class="input-file-container" {!! $errors->has('image') ? 'style="border-color:red;"' : '' !!}>
                            @if(!is_null($item->image))
                                <a href="{{ url('cms/texts/imagedelete/'.$item->id.'?image=image') }}"><span><i class="fa fa-close"></i></span></a>
                            @endif
                            <span class="img-placeholder">
                                @if(is_null($item->image))
                                <a href="{{ asset('cmsfiles/images/placeholder-images.jpg') }}" data-fancybox="gallery">
                                    <img src="{{ asset('cmsfiles/images/placeholder-images.jpg') }}" alt="img">
                                </a>
                                @else
                                <a href="{{ asset('storage/'.$item->image) }}" data-fancybox="gallery">
                                    <img src="{{ asset('storage/'.$item->image) }}" alt="img">
                                </a>
                                @endif
                        </span>
                        <input name="image" class="input-file input-file1" id="my-file1" type="file">
                        <label tabindex="0" for="my-file1" class="input-file-trigger input-file-trigger1">Odaberite sliku...</label>
                        </div>
                        <script>
                            var fileInput = document.querySelector(".input-file1"),
                                button = document.querySelector(".input-file-trigger1");

                            button.addEventListener("keydown", function (event) {
                                if (event.keyCode == 13 || event.keyCode == 32) {
                                    fileInput.focus();
                                }
                            });
                            button.addEventListener("click", function () {
                                fileInput.focus();
                                return false;
                            });
                        </script>
                    </div>
                <div class="col-md-12"><hr></div>  
            </div>
            <button type="submit" class="btn btn-danger mb-3">Sačuvaj</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3 ml-auto" style="margin-left: 10px">Odustani</a>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('input[type="file"]').change(function() {        
        readURL(this, $(this).parent().find('img'));
    });
    $(document).ready(function() {
        $("#option_ids").select2({
            placeholder: 'Izaberi',
        });
    });
    // tinymce.init({
    //     selector : "textarea",
    //     plugins : ["advlist autolink lists link charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table paste "],
    //     toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code",
    // });
</script>
@endsection