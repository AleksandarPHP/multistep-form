@extends('cms.layout.container')

@section('content') 
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('cms') }}">POČETNA</a>
    </li>
    <li class="breadcrumb-item active">Podesavanja</li>
</ol>
<h1>Podesavanja</h1>
<hr>
<div class="row change-language">
    <div class="col-md-12">
        <a href="{{ url()->current() }}?lang=sr"><button class="btn btn{{ $lang=='sr' ? '-danger' : '' }} mb-3">SR</button></a>
        <a href="{{ url()->current() }}?lang=en"><button class="btn btn{{ $lang=='en' ? '-danger' : '' }} mb-3">EN</button></a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form method="post" action="{{ url('cms/settings/'.$item->id) }}"enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" value="{{ $lang }}" name="language">
            <div class="row">
                @if($lang=='sr')
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="title">Naslov</label>
                        <input name="title" type="text" class="form-control" id="title" placeholder="Naslov" value="{{ old('title', $item->title) }}" {!! $errors->has('title') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input name="phone" type="text" class="form-control" id="phone" placeholder="Telefon" value="{{ old('phone', $item->phone) }}" {!! $errors->has('phone') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" type="text" class="form-control" id="email" placeholder="email" value="{{ old('email', $item->email) }}" {!! $errors->has('email') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="worktime">Radno vrijeme</label>
                        <input name="worktime" type="text" class="form-control" id="worktime" placeholder="Radno vrijeme" value="{{ old('worktime', $item->worktime) }}" {!! $errors->has('worktime') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="address">Adresa</label>
                        <input name="address" type="text" class="form-control" id="address" placeholder="Adresa" value="{{ old('address', $item->address) }}" {!! $errors->has('address') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input name="instagram" type="text" class="form-control" id="instagram" placeholder="Instagram" value="{{ old('instagram', $item->instagram) }}" {!! $errors->has('instagram') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input name="facebook" type="text" class="form-control" id="facebook" placeholder="Facebook" value="{{ old('facebook', $item->facebook) }}" {!! $errors->has('facebook') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="twitter">twitter</label>
                        <input name="twitter" type="text" class="form-control" id="twitter" placeholder="twitter" value="{{ old('twitter', $item->twitter) }}" {!! $errors->has('twitter') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="linkedin">linkedin</label>
                        <input name="linkedin" type="text" class="form-control" id="linkedin" placeholder="linkedin" value="{{ old('linkedin', $item->linkedin) }}" {!! $errors->has('linkedin') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="google">Google</label>
                        <input name="google" type="text" class="form-control" id="google" placeholder="google" value="{{ old('google', $item->google) }}" {!! $errors->has('google') ? 'style="border-color:red;"' : '' !!}>
                    </div>
                </div>
                @endif
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="keywords">Ključne riječi</label>
                        <textarea name="keywords" id="keywords" placeholder="Ključne riječi" rows="5" class="form-control" {!! $errors->has('keywords') ? 'style="border-color:red;"' : '' !!}>{{ old('keywords', $item->getTranslation('keywords', $lang, false)) }}</textarea>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="description">Opis</label>
                        <textarea name="description" id="description" placeholder="Opis" rows="5" class="form-control" {!! $errors->has('description') ? 'style="border-color:red;"' : '' !!}>{{ old('description', $item->getTranslation('description', $lang, false)) }}</textarea>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                @if($lang=='sr')
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="analytics">Google Analytics</label>
                        <textarea name="analytics" id="analytics" placeholder="Google Analytics" rows="5" class="form-control" {!! $errors->has('analytics') ? 'style="border-color:red;"' : '' !!}>{{ old('analytics', $item->analytics) }}</textarea>
                    </div>
                </div>
                <div class="col-md-12"><hr></div>
                @php $slike = array('logoH' => 'logoH', 'logoF' => 'logoF', 'favicon' => 'favicon'); @endphp
                @foreach($slike as $key => $i)
                @php
                    if($i == 'logoH') $size =  '';
                    else if($i == 'logoF') $size = '';
                    else if($i == 'favicon') $size = 'Min. dimenzije: 50x50px';
                @endphp
                <div class="col-md-3">
                    <div class="form-group">
                        <label>{{ $i.' '.$size }}</label>
                    </div>
                    <div class="input-file-container" {!! $errors->has($i) ? 'style="border-color:red;"' : '' !!}>
                      <span class="img-placeholder">
                              @if(is_null($item[$i]))
                              <a href="{{ asset('systemfiles/images/placeholder-images.jpg') }}" data-fancybox="gallery">
                                <img src="{{ asset('systemfiles/images/placeholder-images.jpg') }}" alt="img">
                              </a>
                              @else
                              <a href="{{ asset('storage/'.$item[$i]) }}" data-fancybox="gallery">
                                <img src="{{ asset('storage/'.$item[$i]) }}" alt="img">
                              </a>
                              @endif
                      </span>
                    <input name="{{ $i }}" class="input-file input-file{{ $i }}" id="my-file{{ $i }}" type="file">
                    <label tabindex="0" for="my-file{{ $i }}" class="input-file-trigger input-file-trigger{{ $i }}">Odaberite {{ $key }}...</label>
                    </div>
                    <script>
                        var fileInput = document.querySelector(".input-file{{ $i }}"),
                            button = document.querySelector(".input-file-trigger{{ $i }}");

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
                @endforeach
                @endif
            </div>
            <button type="submit" class="btn btn-danger mb-3">Sačuvaj</button>
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
        selector : ".textarea",
        plugins : ["advlist autolink lists link charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table paste "],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link code",
    });
</script> 
@endsection