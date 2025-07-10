@extends('cms.layout.container')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('cms') }}">POČETNA</a>
    </li>
    <li class="breadcrumb-item active">Stanovi</li>
</ol>
<h1>Stanovi</h1>
<hr>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="@if(!$editing) {{ url('cms/apartments') }} @else {{ url('cms/apartments/'.$item->id) }} @endif" enctype="multipart/form-data">
            @csrf
            @if($editing) @method('PUT') @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Naziv</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Naziv" value="{{ old('title', $item->title) }}" {!! $errors->has('title') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="apt_number">Broj stana</label>
                        <input name="apt_number" type="number" class="form-control" id="apt_number" placeholder="Podnaslov" value="{{ old('apt_number', $item->apt_number) }}" {!! $errors->has('apt_number') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="floor">Sprat </label>
                        <select name="floor" class="form-control" id="floor" {!! $errors->has('floor') ? 'style="border-color:red;"' : '' !!}>
                            <option value="">Izaberi</option>  
                            @foreach ($floors as $floor)
                            <option value="{{$floor->id}}" @selected(old('floor', $item->floor_id) == $floor->id )>{{$floor->title}}</option>  
                            @endforeach
                        </select>
                    </div>
                </div>   
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="surface">Povrsina</label>
                        <input name="surface" type="number" class="form-control" id="surface" placeholder="URL naslov" value="{{ old('surface', $item->surface) }}" {!! $errors->has('surface') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div> 
                <div class="col-md-6">
                    <div class="mt-5">
                        <label for="status">Status </label>
                        <select name="status" class="form-control" id="status" {!! $errors->has('status') ? 'style="border-color:red;"' : '' !!}>
                            <option value="">Izaberi</option>   
                            <option value="1" @selected(old('status', $item->status) == 1 )> Izdavanje</option>   
                            <option value="2" @selected(old('status', $item->status) == 2 )> Prodaja</option> 
                            <option value="3" @selected(old('status', $item->status) == 3 )> Narucen</option>   
                        </select>
                    </div>
                </div>   
                <div class="col-md-6">
                    <div class="mt-5">
                        <label for="pdf">Odaberi PDF </label>
                        <input class="form-control" type="file" id="pdf" name="pdf" accept="application/pdf">
                        @if ($item->pdf)
                        <p class="mt-4"><a href="{{asset('storage/'.$item->pdf)}}" target="_blank">Pogledaj postojeci pdf</a></p>                            
                        @endif
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

    tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table paste "],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code",
    });
</script>
@endsection