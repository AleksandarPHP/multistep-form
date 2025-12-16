@extends('cms.layout.container')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('cms') }}">HOME</a>
    </li>
    <li class="breadcrumb-item active">Abmessungen</li>
</ol>
<h1>Abmessungen</h1>
<hr>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="@if(!$editing) {{ url('cms/dimensions') }} @else {{ url('cms/dimensions/'.$item->id) }} @endif" enctype="multipart/form-data">
            @csrf
            @if($editing) @method('PUT') @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="dimension1">Dimension 1</label>
                        <input name="dimension1" type="text" step="0.1" class="form-control" id="dimension1" placeholder="Dimension 1" value="{{ old('dimension1', $item->dimension1) }}" {!! $errors->has('dimension1') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="dimension2">Dimension 2</label>
                        <input name="dimension2" type="number" step="0.1" class="form-control" id="dimension2" placeholder="Dimension 2" value="{{ old('dimension2', $item->dimension2) }}" {!! $errors->has('dimension2') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="product_id">Produkte</label>
                        <select name="product_ids[]" multiple="multiple" class="form-control" id="product_ids" {!! $errors->has('product_ids') ? 'style="border-color:red;"' : '' !!}>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" @if($editing) @selected(in_array($product->id, $item->product_id)) @endif>{{$product->title}} (id:{{ $product->id }})</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="price">Preis</label>
                        <input name="price" type="number" step="0.1" class="form-control" id="price" placeholder="Preis" value="{{ old('price', $item->price) }}" {!! $errors->has('price') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>  
            </div>
            <button type="submit" class="btn btn-danger mb-3">Speichern</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary mb-3 ml-auto" style="margin-left: 10px">Aufgeben</a>
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
        $("#product_ids").select2({
            placeholder: 'Wählen',
        });
    });

    // tinymce.init({
    //     selector : "textarea",
    //     plugins : ["advlist autolink lists link charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table paste "],
    //     toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code",
    // });
</script>
@endsection