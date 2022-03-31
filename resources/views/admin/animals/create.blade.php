<form method="post" action="{{ route('admin.animals.store')}}" enctype="multipart/form-data">
    @csrf
    <label for="type_id">Тип</label>
    <select id="type_id" name="type_id">
        @foreach($animal_types as $animal_typesItem)
            <option value="{{ $animal_typesItem->id }}"
                    @if(old('type_id') === $animal_typesItem->id) selected @endif>{{ $animal_typesItem->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="breed_id">Порода</label>
    <select id="breed_id" name="breed_id">
        @foreach($breeds as $breedsItem)
            <option value="{{ $breedsItem->id }}"
                    @if(old('breed_id') === $breedsItem->id) selected @endif>{{ $breedsItem->name }}</option>
        @endforeach
    </select>
    <br>
    <label for="name">Имя</label>
    <input type="text" id="name" name="name" value="{{ old('name') }}">
    <br>
    <label for="description">Описание</label>
    <br>
    <textarea name="description" id="description" cols="30" rows="10">{{old('description')}}</textarea>
    <br>
    <label for="treatment_of_parasites">Паразиты</label>
    <input type="radio" name="treatment_of_parasites" id="inp1" value="YES" @if(old('treatment_of_parasites')==="YES") checked @endif>
    <label for="inp1">Да</label>
    <input type="radio" name="treatment_of_parasites" id="inp2" value="NO" @if(old('treatment_of_parasites')==="NO") checked @endif>
    <label for="inp1">Нет</label>
    <br>
    <p>Болезни</p>
    <select id="diseases" name="diseases[]" multiple>
        @foreach($diseases as $diseasesItem)
            <option value="{{$diseasesItem->id}}">{{ $diseasesItem->name }}</option>
        @endforeach
    </select>
    <p>Прививки</p>
    <select id="inoculations" name="inoculations[]" multiple>
        @foreach($inoculations as $inoculationsItem)
            <option value="{{$inoculationsItem->id}}">{{ $inoculationsItem->name }}</option>
        @endforeach
    </select>
    <br>
    <input type="date" name="birthday_at" value="{{old('birthday_at')}}">
    <br>
    <button type="submit">Сохранить</button>
</form>
