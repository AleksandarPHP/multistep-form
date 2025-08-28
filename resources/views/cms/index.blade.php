@extends('cms.layout.container')

@section('content')
      <div class="row">
        <div class="col-12">
          <h1 class="title">HOME</h1>
        </div>
      </div>
      <div class="row">
        @php
        $url = 'cms';
        $title = 'Bedienfeld';
        $icon = 'dashboard';
        @endphp
        <div class="col-md-4">
          <a href="{{ url($url) }}" class="link_box">
            <i class="fa-solid fa-{{ $icon }} fa-2xl" style="color: #0b3663;"></i>
            <h2>{{ $title }}</h2>
            <span><i class="fas fa-arrow-right"></i></span>
          </a>
        </div>
        @php
        $moduli = array(
          array('cms/products', 'Produkte', 'cubes'),
          array('cms/products-position', 'Produkte position', 'building'),
          array('cms/settings/1/edit', 'Settings', 'cog'),
          array('cms/users', 'Benutzer', 'users'),

        );
        @endphp
        @foreach ($moduli as $modul)
        @php
        $url = $modul[0];
        $title = $modul[1];
        $icon = $modul[2];
        $active = request()->is($url.'*') ? 'active' : '';
        @endphp
        <div class="col-md-4">
          <a href="{{ url($url) }}" class="link_box">
            <i class="fa-solid fa-{{ $icon }} fa-2xl" style="color: #0b3663;"></i>
            <h2>{{ $title }}</h2>
            <span><i class="fas fa-arrow-right"></i></span>
          </a>
        </div>
        @endforeach
    </div>
  </div>
</div>
@endsection
