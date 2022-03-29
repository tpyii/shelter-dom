<form method="post" action="{{ route('admin.inoculations.update', ['inoculation' => $inoculation->id])}}">
    @csrf
    @method('put')
    <input type="text" id="name" name="name" value="{{ $inoculation->name }}">
    <button type="submit">Сохранить</button>
</form>
