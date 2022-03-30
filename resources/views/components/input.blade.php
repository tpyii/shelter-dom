<input class="form-control form-control-sm @error($name) is-invalid @enderror" 
{{ $attributes->merge([
  'type' => 'text',
  'id' => $name,
  'value' => old($name)
]) }}>

@error($name)
  <div class="invalid-feedback">
    {{ $message }}
  </div>
@enderror
