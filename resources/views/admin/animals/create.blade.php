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
    <x-select name="type_id" label="Тип" :options="$animal_types" />
    <x-select name="breed_id" label="Порода" :options="$breeds" />
    <div class="mb-3">
      <x-label for="name">Имя</x-label>
      <x-input name="name" value="{{ old('name') }}" />
    </div>
    <x-textarea name="description" label="Описание">{{ old('description') }}</x-textarea>
    <div class="mb-3">
      <x-label for="inp1">Паразиты</x-label>
      <x-input type="radio" name="treatment_of_parasites" id="inp1" value="YES" label="Да" />
      <x-input type="radio" name="treatment_of_parasites" id="inp2" value="NO" label="Нет" />
    </div>
    <x-select name="diseases[]" label="Diseases" :options="$diseases" multiple />
    <x-select name="inoculations[]" label="Inoculations" :options="$inoculations" multiple />
    <div class="mb-3">
      <x-label>Birthday</x-label>
      <x-input type="date" name="birthday_at" value="{{old('birthday_at')}}" />
    </div>
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
