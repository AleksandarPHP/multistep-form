@extends('cms.layout.container')

@section('content')
      <div class="row">
        <div class="col-12">
          <h1 class="title">Početna</h1>
        </div>
      </div>
      <div class="row">
        @php
        $url = 'cms';
        $title = 'Kontrolna tabla';
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
          array('cms/floors', 'Spratovi', 'cubes'),
          array('cms/apartments', 'Apartmani', 'building'),
          array('cms/galleries', 'Albumi', 'image'),
          array('cms/settings/1/edit', 'Podesavanja', 'cog'),
          array('cms/sliders', 'Slajderi', 'desktop'),
          array('cms/texts', 'Tekstovi', 'text-width'),
          array('cms/users', 'Korisnici', 'users'),

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
