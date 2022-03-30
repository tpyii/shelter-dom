<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">

    <ul class="nav flex-column">
      @if (Route::has('admin.dashboard'))
      <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.dashboard')) active @endif" href="{{ route('admin.dashboard') }}">Dashboard</a>
      </li>
      @endif

      @if (Route::has('admin.breeds.index'))
      <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.breeds.*')) active @endif" href="{{ route('admin.breeds.index') }}">Breeds</a>
      </li>
      @endif

      @if (Route::has('admin.animal_types.index'))
      <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.animal_types.*')) active @endif" href="{{ route('admin.animal_types.index') }}">Types</a>
      </li>
      @endif

      @if (Route::has('admin.diseases.index'))
      <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.diseases.*')) active @endif" href="{{ route('admin.diseases.index') }}">Diseases</a>
      </li>
      @endif

      @if (Route::has('admin.inoculations.index'))
      <li class="nav-item">
        <a class="nav-link @if (request()->routeIs('admin.inoculations.*')) active @endif" href="{{ route('admin.inoculations.index') }}">Inoculations</a>
      </li>
      @endif

      <li class="nav-item d-block d-md-none">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
    
  </div>
</nav>
