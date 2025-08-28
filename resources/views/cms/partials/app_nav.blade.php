<aside class="app_nav">
  <button class="app_nav_close"><i class="fas fa-times"></i></button>
  @include('cms.partials.logo')
  <nav>
    <ul>
      <li @if(request()->path() === 'cms') class="active" @endif>
        <a href="{{ url('cms') }}"><i class="fas fa-home"></i>Bedienfeld</a>
      </li>
      <li @if(request()->is('cms/products*'))class="active"@endif>
        <a href="{{ url('cms/products') }}"><i class="fas fa-cubes"></i>Produkte</a>
      </li>
      <li @if(request()->is('cms/product-position*'))class="active"@endif>
        <a href="{{ url('cms/product-position') }}"><i class="fas fa-building"></i>Produkte Position</a>
      </li>
      <li @if(request()->is('cms/settings/1/edit*'))class="active"@endif>
        <a href="{{ url('cms/settings/1/edit') }}"><i class="fas fa-cog"></i>Settings</a>
      </li>
      <li @if(request()->is('cms/users*'))class="active"@endif>
        <a href="{{ url('cms/users') }}"><i class="fas fa-users"></i>Benutzer</a>
      </li>
    </ul>
  </nav>
</aside>