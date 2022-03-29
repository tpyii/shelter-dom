<form method="post" action="{{ route('admin.types.update', ['type' => $type->id])}}">
    @csrf
    @method('put')
    <input type="text" id="name" name="name" value="{{ $type->name }}">
    <button type="submit">Сохранить</button>
</form>
