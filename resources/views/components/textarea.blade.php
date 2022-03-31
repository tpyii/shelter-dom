<textarea 
  class="form-control form-control-sm @error($name) is-invalid @enderror"
  rows="3"
  {{ $attributes->merge(['id' => $name]) }}
>
  {{ $slot }}
</textarea>

@error($name)
  <div class="invalid-feedback">
    {{ $message }}
  </div>
@enderror
