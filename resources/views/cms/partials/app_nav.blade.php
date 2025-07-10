<aside class="app_nav">
  <button class="app_nav_close"><i class="fas fa-times"></i></button>
  @include('cms.partials.logo')
  <nav>
    <ul>
      <li @if(request()->path() === 'cms') class="active" @endif>
        <a href="{{ url('cms') }}"><i class="fas fa-home"></i>Kontrolna tabla</a>
      </li>
      <li @if(request()->is('cms/floors*'))class="active"@endif>
        <a href="{{ url('cms/floors') }}"><i class="fas fa-cubes"></i>Spratovi</a>
      </li>
      <li @if(request()->is('cms/apartments*'))class="active"@endif>
        <a href="{{ url('cms/apartments') }}"><i class="fas fa-building"></i>Apartmani</a>
      </li>
      <li @if(request()->is('cms/galleries*'))class="active"@endif>
        <a href="{{ url('cms/galleries') }}"><i class="fas fa-image"></i>Albumi</a>
      </li>
      <li @if(request()->is('cms/settings/1/edit*'))class="active"@endif>
        <a href="{{ url('cms/settings/1/edit') }}"><i class="fas fa-cog"></i>Podesavanja</a>
      </li>
      <li @if(request()->is('cms/sliders*'))class="active"@endif>
        <a href="{{ url('cms/sliders') }}"><i class="fas fa-desktop"></i>Slajderi</a>
      </li>
      <li @if(request()->is('cms/texts*'))class="active"@endif>
        <a href="{{ url('cms/texts') }}"><i class="fas fa-text-width"></i>Tekstovi</a>
      </li>
      <li @if(request()->is('cms/users*'))class="active"@endif>
        <a href="{{ url('cms/users') }}"><i class="fas fa-users"></i>Korisnici</a>
      </li>
    </ul>
  </nav>
</aside>