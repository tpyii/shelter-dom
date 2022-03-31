<x-layout>
  <x-slot name="title">
    Animals create
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

  <x-form method="POST" action="{{ route('admin.animals.store') }}" enctype="multipart/form-data">
    <div class="mb-3">
      <x-label for="type_id">Тип</x-label>
      <x-select name="type_id" :options="$animal_types" />
    </div>
    <div class="mb-3">
      <x-label for="breed_id">Порода</x-label>
      <x-select name="breed_id" :options="$breeds" />
    </div>
    <div class="mb-3">
      <x-label for="name">Имя</x-label>
      <x-input name="name" value="{{ old('name') }}" />
    </div>
    <div class="mb-3">
      <x-label for="description">Описание</x-label>
      <x-textarea name="description">{{old('description')}}</x-textarea>
    </div>
    <div class="mb-3">
      <x-label for="inp1">Паразиты</x-label>
      <x-input type="radio" name="treatment_of_parasites" id="inp1" value="YES" label="Да" />
      <x-input type="radio" name="treatment_of_parasites" id="inp2" value="NO" label="Нет" />
    </div>
    <div class="mb-3">
      <x-label for="diseases">Diseases</x-label>
      <x-select name="diseases[]" :options="$diseases" multiple />
    </div>
    <div class="mb-3">
      <x-label for="inoculations">Inoculations</x-label>
      <x-select name="inoculations[]" :options="$inoculations" multiple />
    </div>
    <div class="mb-3">
      <x-label>Birthday</x-label>
      <x-input type="date" name="birthday_at" value="{{old('birthday_at')}}" />
    </div>
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
