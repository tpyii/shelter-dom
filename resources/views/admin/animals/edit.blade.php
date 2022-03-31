<x-layout>
  <x-slot name="title">
    Animals edit
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

  <x-form method="POST" action="{{ route('admin.animals.update', $animal) }}" enctype="multipart/form-data">
    @method('PUT')
    <div class="mb-3">
      <x-label for="type_id">Тип</x-label>
    <select id="type_id" name="type_id">
        @foreach($animal_types as $animal_typesItem)
            <option value="{{ $animal_typesItem->id }}"
                    @if($animal->type->id === $animal_typesItem->id) selected @endif>{{ $animal_typesItem->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
      <x-label for="breed_id">Порода</x-label>
    <select id="breed_id" name="breed_id">
        @foreach($breeds as $breedsItem)
            <option value="{{ $breedsItem->id }}"
                    @if($animal->breed->id === $breedsItem->id) selected @endif>{{ $breedsItem->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
      <x-label for="name">Имя</x-label>
      <x-input name="name" value="{{ $animal->name }}" />
    </div>
    <div class="mb-3">
      <x-label for="description">Описание</x-label>
      <x-textarea name="description">{{$animal->description}}</x-textarea>
    </div>
    <div class="mb-3">
      <x-label>Паразиты</x-label>
      <div class="form-check">
    <input type="radio" name="treatment_of_parasites" id="inp1" value="YES" @if($animal->treatment_of_parasites==="YES") checked @endif>
        <x-label for="inp1" class="form-check-label">YES</x-label>
      </div>
      <div class="form-check">
    <input type="radio" name="treatment_of_parasites" id="inp2" value="NO" @if($animal->treatment_of_parasites==="NO") checked @endif>
        <x-label for="inp2" class="form-check-label">NO</x-label>
      </div>
    </div>
    <div class="mb-3">
      <x-label for="diseases">Болезни</x-label>
    <select id="diseases" name="diseases[]" multiple>
        @foreach($diseases as $diseasesItem)
            <option value="{{$diseasesItem->id}}" @if(in_array($diseasesItem->id, $diseases_array)) selected @endif>{{ $diseasesItem->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
      <x-label for="inoculations">Прививки</x-label>
    <select id="inoculations" name="inoculations[]" multiple>
        @foreach($inoculations as $inoculationsItem)
            <option value="{{$inoculationsItem->id}}"  @if(in_array($inoculationsItem->id, $inoculations_array)) selected @endif>{{ $inoculationsItem->name }}</option>
        @endforeach
    </select>
    </div>
    <div class="mb-3">
      <x-label for="birthday_at">День рождения</x-label>
      <x-input type="date" name="birthday_at" value="{{$animal->birthday_at}}" />
    </div>
    <x-button type="submit" color="outline-success" class="btn-sm">Сохранить</x-button>
  </x-form>
</x-layout>
