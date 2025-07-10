<header class="row app_header">
  <div class="col-md-5">
    <a href="{{url('/')}}" target="_blank">
      <h3 style="font-size: 32px; color: #0b3663;">Montera Termag</h3>
    </a>
  </div>
  <div class="col-md-5 text-right">
    <a href="{{ url('/') }}" class="app_header_home">
      <i class="fas fa-home"></i>
    </a>
    <a href="{{ url('cms/users') }}" class="app_header_user">
      @if(Auth::user()->image)
      <img src="{{ asset('storage/users/res_'.Auth::user()->image) }}" alt="photo">
      @else
      <img src="{{ asset('cmsfiles/images/no_image.png') }}" alt="photo">
      @endif
      <span>{{ Auth::user()->name }}</span>
    </a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="app_header_logout">
      <img src="{{ asset('cmsfiles/images/logout.svg') }}" alt="logout">
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>
    <button class="app_header_menu">
      <i class="fas fa-bars"></i>
    </button>
  </div>
</header>
@include('cms.partials.messages')
