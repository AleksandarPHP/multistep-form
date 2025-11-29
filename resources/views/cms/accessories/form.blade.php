@extends('cms.layout.container')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('cms') }}">HOME</a>
    </li>
    <li class="breadcrumb-item active">Accessories</li>
</ol>
<h1>Option</h1>
<hr>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="@if(!$editing) {{ url('cms/accessories') }} @else {{ url('cms/accessories/'.$item->id) }} @endif" enctype="multipart/form-data">
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
                        <label for="priority">Order</label>
                        <input name="priority" type="number" class="form-control" id="priority" placeholder="Order" value="{{ old('priority', $item->priority) }}" {!! $errors->has('priority') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="product_id">Produkte</label>
                        <select name="product_ids[]" multiple="multiple" class="form-control" id="product_ids" {!! $errors->has('product_ids') ? 'style="border-color:red;"' : '' !!}>
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}" @selected(in_array($product->id, $item->product_id))>{{$product->title}} (id:{{ $product->id }})</option>
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
        $("#product_ids").select2({
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