@props([
  'name',
  'label'
])

<div class="mb-3">
  <x-label :for="$name">
    {{ $label }}
  </x-label>

  <textarea
    {{ $attributes->merge([
      'class' => 'form-control form-control-sm',
      'name' => $name,
      'rows' => 3,
    ])->class([
      'is-invalid' => $errors->has($name)
    ])  }}
  >
    {{ $slot }}
  </textarea>

  @error($name)
    <div class="invalid-feedback">
      {{ $message }}
    </div>
  @enderror
</div>
