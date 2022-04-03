<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">

    <ul class="nav flex-column">
      <x-nav-link href="admin.dashboard" route="admin.dashboard">Dashboard</x-nav-link>
      <x-nav-link href="admin.animals.index" route="admin.animals.*">Animals</x-nav-link>
      <x-nav-link href="admin.breeds.index" route="admin.breeds.*">Breeds</x-nav-link>
      <x-nav-link href="admin.animal_types.index" route="admin.animal_types.*">Types</x-nav-link>
      <x-nav-link href="admin.diseases.index" route="admin.diseases.*">Diseases</x-nav-link>
      <x-nav-link href="admin.inoculations.index" route="admin.inoculations.*">Inoculations</x-nav-link>

      <li class="nav-item d-block d-md-none">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
    
  </div>
</nav>
