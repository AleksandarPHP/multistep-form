@extends('cms.layout.container')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('cms') }}">HOME</a>
    </li>
    <li class="breadcrumb-item active">Option</li>
</ol>
<h1>Option</h1>
<hr>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="@if(!$editing) {{ url('cms/options') }} @else {{ url('cms/options/'.$item->id) }} @endif" enctype="multipart/form-data">
            @csrf
            @if($editing) @method('PUT') @endif
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="text-start ms-3 fs-6">
                    {!! $item->content !!}
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-danger mb-3 mt-4">Sačuvaj</button>
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