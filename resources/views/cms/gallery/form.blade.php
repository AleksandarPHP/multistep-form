@extends('cms.layout.container')

@section('content')
<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('cms') }}">POČETNA</a>
    </li>
    <li class="breadcrumb-item active">{{$album->title}}</li>
</ol>
<h1>{{$album->title}}</h1>
<hr>
<div class="row">
    <div class="col-md-12" id="mainDiv">
        <form method="post" action="{ url('cms/'.$route) }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                            <label>
                                Dozvoljeno je otpremanje jpg,jpeg,png,webp slika 
                            </label>
                        </div>
                    <div class="row">
                        <div class="col-md-12">
                            <link rel="stylesheet" type="text/css" href="{{ asset('cmsfiles/css/dropzone.css') }}" />
                            <script type="text/javascript" src="{{ asset('cmsfiles/js/dropzone.js') }}"></script>
                            <div class="dropzone" id="dropzoneUploader"></div>
                            <script type="text/javascript">
                                Dropzone.options.dropzoneUploader = {
                                paramName: "files",
                                url: '{{ url('cms/galleries/'.$album->id.'/upload') }}',
                                maxFilesize: 2,
                                parallelUploads: 1,
                                acceptedFiles: "image/png, image/jpeg, image/webp",
                                sending: function (file, xhr, formData) {
                                    formData.append('_token', "{{ csrf_token() }}");
                                },
                                accept: function(file, done) {
                                    done();
                                },
                                      
                                dictDefaultMessage: '<?= preg_replace("/\r?\n/", "\\n", addslashes("Kliknite ovde ili prevucite slike")) ?>',
                                dictFileTooBig: '<?= preg_replace("/\r?\n/", "\\n", addslashes("Dodavanje slike nije uspelo")) ?>',
                                dictInvalidFileType: '<?= preg_replace("/\r?\n/", "\\n", addslashes("Dodavanje slike nije uspelo")) ?>',
                                dictResponseError: '<?= preg_replace("/\r?\n/", "\\n", addslashes("Dodavanje slike nije uspelo")) ?>',
                                dictMaxFilesExceeded: '<?= preg_replace("/\r?\n/", "\\n", addslashes("Dodavanje slike nije uspelo")) ?>'
                                };
                                </script>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row uploaded-images" id="imagelist">
                            @foreach ($images as $image)
                            <div class="col-xl-2 col-lg-4 col-md-6 uploaded-image">
                                <figure>
                                    <a href="{{ asset('storage/'.$image->image) }}" onclick="event.preventDefault();document.getElementById('delete-image{{ $image->id }}').submit();">
                                        <span><i class="fa fa-close"></i></span>
                                    </a>
                                    <div>
                                        <img src="{{ asset('storage/'.$image->image) }}" class="img-responsive" width="200px">
                                    </div>
                                </figure>
                            </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        </form>
    </div>
</div>
    @foreach ($images as $image)
        <form id="delete-image{{ $image->id }}" action="{{ url('cms/galleries/'.$image->id.'/delete') }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
@endsection
