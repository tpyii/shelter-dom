<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">

    <ul class="nav flex-column">
      @guest
        <x-nav-link href="login" route="login">{{ __('Login') }}</x-nav-link>
        <x-nav-link href="register" route="register">{{ __('Register') }}</x-nav-link>
      @else
        <x-nav-link href="admin.dashboard" route="admin.dashboard">Dashboard</x-nav-link>
        <x-nav-link href="admin.animals.index" route="admin.animals.*">Animals</x-nav-link>
        <x-nav-link href="admin.breeds.index" route="admin.breeds.*">Breeds</x-nav-link>
        <x-nav-link href="admin.animal_types.index" route="admin.animal_types.*">Types</x-nav-link>
        <x-nav-link href="admin.diseases.index" route="admin.diseases.*">Diseases</x-nav-link>
        <x-nav-link href="admin.inoculations.index" route="admin.inoculations.*">Inoculations</x-nav-link>

        @auth
        <li class="nav-item d-block d-md-none">
          <x-form method="POST" action="{{ route('logout') }}">
            <x-button type="submit" class="nav-link px-3" color="link">Sign out</x-button>
          </x-form>
        </li>
        @endauth
      @endguest
    </ul>
    
  </div>
</nav>
