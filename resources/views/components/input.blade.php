@props([
  'type' => 'text',
  'value' => '',
  'checked' => '',
  'name',
  'id',
  'label',
])

@switch($type)
  @case('radio')
  @case('checkbox')
    <div class="form-check">
      <input 
        {{ $attributes->merge([
          'class' => 'form-check-input',
          'type' => $type,
          'name' => $name,
          'id' => $id,
          'value' => old($name, $value),
        ])->class([
          'is-invalid' => $errors->has($name),
        ]) }}
        @if(old($name, $checked) === $value) checked @endif
      >
      
      <x-label for="{{ $id }}">
        {{ $label }}
      </x-label>

      @error($name)
        <div class="invalid-feedback mb-3">
          {{ $message }}
        </div>
      @enderror
    </div>
  @break

  @default
    <input 
      {{ $attributes->merge([
        'class' => 'form-control form-control-sm',
        'type' => $type,
        'name' => $name,
        'id' => $name,
        'value' => old($name, $value)
      ])->class([
        'is-invalid' => $errors->has($name),
      ]) }}
    >
    
    @error($name)
      <div class="invalid-feedback">
        {{ $message }}
      </div>
    @enderror
@endswitch
