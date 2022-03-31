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
    <select id="type_id" name="type_id">
        @foreach($animal_types as $animal_typesItem)
            <option value="{{ $animal_typesItem->id }}"
                    @if(old('type_id') === $animal_typesItem->id) selected @endif>{{ $animal_typesItem->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
      <x-label for="breed_id">Порода</x-label>
    <select id="breed_id" name="breed_id">
        @foreach($breeds as $breedsItem)
            <option value="{{ $breedsItem->id }}"
                    @if(old('breed_id') === $breedsItem->id) selected @endif>{{ $breedsItem->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
      <x-label for="name">Имя</x-label>
      <x-input name="name" value="{{ old('name') }}" />
    </div>
    <div class="mb-3">
      <x-label for="description">Описание</x-label>
    <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
    </div>
    <div class="mb-3">
      <x-label>Паразиты</x-label>
      <div class="form-check">
    <input type="radio" name="treatment_of_parasites" id="inp1" value="YES" @if(old('treatment_of_parasites')==="YES") checked @endif>
      <x-label for="inp1" class="form-check-label">Да</x-label>
      </div>
      <div class="form-check">
    <input type="radio" name="treatment_of_parasites" id="inp2" value="NO" @if(old('treatment_of_parasites')==="NO") checked @endif>
      <x-label for="inp2" class="form-check-label">Нет</x-label>
      </div>
    </div>
    <div class="mb-3">
      <x-label for="diseases">Diseases</x-label>
    <select id="diseases" name="diseases[]" multiple>
        @foreach($diseases as $diseasesItem)
            <option value="{{$diseasesItem->id}}">{{ $diseasesItem->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
      <x-label for="inoculations">Inoculations</x-label>
    <select id="inoculations" name="inoculations[]" multiple>
        @foreach($inoculations as $inoculationsItem)
            <option value="{{$inoculationsItem->id}}">{{ $inoculationsItem->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
      <x-label>Birthday</x-label>
      <x-input type="date" name="birthday_at" value="{{old('birthday_at')}}" />
    </div>
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
