<!DOCTYPE html>
<html lang="sr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Administration">
  <meta name="author" content="soft4tech.com">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>CMS</title>
  <link rel="shortcut icon" href="{{ asset('cmsfiles/images/favicon.png') }}" type="image/x-icon" />
  <!-- Bootstrap core CSS-->
  <link href="{{ asset('cmsfiles/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('cmsfiles/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="{{ asset('cmsfiles/css/sb-admin.css') }}" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header login-logo"><b>Soft<span>4</span>tech<span>.cms</span></b> | Login</div>
      <div class="card-body">
        @include('cms.partials.messages')
        <form method="post" action="{{ route('login') }}">
          @csrf
          <div class="form-group">
            <label for="email">E-Mail adresa</label>
            <input class="form-control" id="email" type="email" name="email" placeholder="E-Mail adresa" value="{{ old('email') }}" {!! $errors->has('email') ? 'style="border-color:red;"' : '' !!}>
          </div>
          <div class="form-group">
            <label for="password">Lozinka</label>
            <input class="form-control" id="password" type="password" name="password" placeholder="Lozinka" {!! $errors->has('password') ? 'style="border-color:red;"' : '' !!}>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Zapamti me</label>
            </div>
          </div>
          <button class="btn btn-danger btn-block" type="submit">Uloguj se</button>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('cmsfiles/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('cmsfiles/vendor/popper/popper.min.js') }}"></script>
  <script src="{{ asset('cmsfiles/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('cmsfiles/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
</body>

</html>
