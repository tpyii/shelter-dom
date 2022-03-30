<div>
    <form method="post" action="{{ route('admin.img.store') }}" enctype="multipart/form-data">
        @csrf
{{--        <div class="form-group">--}}
{{--            <label for="categories">Выбрать категории--}}
{{--                @error('category_id') <strong style="color:red;">{{ $message }}</strong> @enderror--}}
{{--            </label>--}}
{{--            <select class="form-control" name="categories[]" id="categories"  multiple>--}}
{{--                @foreach($categories as $category)--}}
{{--                    <option value="{{ $category->id }}">{{ $category->title }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="categories">Выбрать автора--}}
{{--                @error('author_id') <strong style="color:red;">{{ $message }}</strong> @enderror--}}
{{--            </label>--}}
{{--            <select class="form-control" name="author_id" id="author_id"  >--}}
{{--                @foreach($authors as $author)--}}
{{--                    <option value="{{ $author->id }}">{{ $author->name }} {{ $author->lastname }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="categories">Выбрать источник--}}
{{--                @error('source_id') <strong style="color:red;">{{ $message }}</strong> @enderror--}}
{{--            </label>--}}
{{--            <select class="form-control" name="source_id" id="source_id" >--}}
{{--                @foreach($sources as $source)--}}
{{--                    <option value="{{ $source->id }}">{{ $source->title }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="title">Наименование--}}
{{--                @error('title') <strong style="color:red;">{{ $message }}</strong> @enderror--}}
{{--            </label>--}}
{{--            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="status">Статус</label>--}}
{{--            <select class="form-control" name="status" id="status">--}}
{{--                <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>--}}
{{--                <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>--}}
{{--                <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <div class="form-group">--}}
{{--            <label for="description">Описание--}}
{{--                @error('description') <strong style="color:red;">{{ $message }}</strong> @enderror--}}
{{--            </label>--}}
{{--            <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>--}}
{{--        </div>--}}
        <div class="form-group">
            <label for="img">Изображение
{{--                @error('img') <strong style="color:red;">{{ $message }}</strong> @enderror--}}
            </label>
            <input class="form-control" name="files[]" id="img" type="file" multiple>
{{--            {!! old('img') !!}--}}
        </div>
        <br>
        <button type="submit" class="btn btn-success" style="float: right;">Сохранить</button>
    </form>
</div>
