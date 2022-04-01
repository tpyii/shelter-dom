<x-layout>
  <x-slot name="title">
    Diseases create
  </x-slot>

  @if ($errors->any())
    <x-alert type="danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </x-alert>
  @endif

  <x-form method="POST" action="{{ route('admin.diseases.store') }}">
    <x-input name="name" label="Name" />
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
