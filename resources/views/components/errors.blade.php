@if ($errors->any())
  <x-alert type="danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </x-alert>
@endif
