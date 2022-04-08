@props([
  'type' => 'text',
  'value' => '',
  'checked' => '',
  'name',
  'id',
  'label',
  'multiple' => false,
  'required' => false,
])

@php
$n = $multiple ? substr($name, 0, -2) : $name;
@endphp

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

  @case('file')
    <div class="mb-3">
      <x-label :for="$n">
        {{ $label }}
        @if($required) * @endif
      </x-label>

      <input 
        {{ $attributes->merge([
          'class' => 'form-control form-control-sm',
          'type' => $type,
          'name' => $name,
          'id' => $n
        ])->class([
          'is-invalid' => $errors->has($n),
        ]) }}
        @if($multiple) multiple @endif
        @if($required) required @endif
      >
    
      @error($n)
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
  @break

  @default
    <div class="mb-3">
      <x-label :for="$name">
        {{ $label }}
        @if($required) * @endif
      </x-label>

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
        @if($required) required @endif
      >
    
      @error($name)
        <div class="invalid-feedback">
          {{ $message }}
        </div>
      @enderror
    </div>
@endswitch
