<x-layout>
    <x-slot name="title">
        Animals edit
    </x-slot>

    <x-errors/>

    <x-form method="POST" action="{{ route('admin.animals.update', $animal) }}" enctype="multipart/form-data">
        @method('PUT')
        <x-select name="type_id" label="Тип" :options="$animal_types" :value="$animal->type_id"/>
        <x-select name="breed_id" label="Порода" :options="$breeds" :value="$animal->breed_id"/>
        <x-input name="name" label="Имя" value="{{ $animal->name }}"/>
        <x-textarea name="description" label="Описание">{{ $animal->description }}</x-textarea>
        <div class="mb-3">
            <x-label for="inp1">Паразиты</x-label>
            <x-input type="radio" name="treatment_of_parasites" id="inp1" value="YES" label="Да"
                     :checked="$animal->treatment_of_parasites"/>
            <x-input type="radio" name="treatment_of_parasites" id="inp2" value="NO" label="Нет"
                     :checked="$animal->treatment_of_parasites"/>
        </div>
        <x-select name="diseases[]" label="Болезни" id="diseases" :options="$diseases" :value="$animal->disease"
                  multiple/>
        <x-select name="inoculations[]" label="Прививки" :options="$inoculations" :value="$animal->inoculation"
                  multiple/>
        <x-input type="date" name="birthday_at" label="День рождения" value="{{ $animal->birthday_at }}"/>
        <div class="mb-3" id="imgIds">
            @foreach($imgIds AS $imagesItem)
                <div class="d-inline-block" id="img_{{$imagesItem->id}}">
                    <img src="{{Storage::disk('public')->url($imagesItem->path)}}" alt="#"
                         style="max-width: 100px; height: auto">
                    <x-button color="outline-danger" data-id="{{$imagesItem->id}}">Delete</x-button>
                </div>
            @endforeach
                <input class="form-control" name="oldImgs" id="oldImg" value="" hidden>
            <div class="form-group">
                <label for="img">Новые изображения
                </label>
                <input class="form-control" name="files[]" id="img" type="file" multiple>
            </div>
        </div>
        <x-button type="submit" color="outline-success">Сохранить</x-button>
    </x-form>
</x-layout>

<script>
    let buttons = document.querySelectorAll('.btn.btn-sm.btn-outline-danger');
    let arr = [];
    let oldImg = document.querySelector('#oldImg')
    buttons.forEach((elem) => {
        let id = elem.getAttribute('data-id');
        arr.push(id)
    });

    oldImg.setAttribute('value', arr);

    buttons.forEach((elem) => {
        let idToRemove = elem.getAttribute('data-id');
        elem.addEventListener('click', () => {
            arr = arr.filter((id)=>id!==idToRemove);
            document.querySelector(`#img_${idToRemove}`).remove()
            oldImg.setAttribute('value', arr )
        })
    })

</script>
