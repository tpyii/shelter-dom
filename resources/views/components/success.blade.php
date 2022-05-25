@if (session('success'))
  <x-alert type="success">
    {{ session('success') }}
  </x-alert>
@endif
