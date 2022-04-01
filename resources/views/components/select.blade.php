@props([
  'value' => '',
  'options' => [],
  'multiple' => false,
  'name',
  'label'
])

@php
  $n = $multiple ? substr($name, 0, -2) : $name;
  $value = $multiple && $value ? $value->pluck('id')->toArray() : $value;
@endphp

<div class="mb-3">
  <x-label :for="$n">
    {{ $label }}
  </x-label>

  <select
    {{ $attributes->merge([
      'class' => 'form-select form-select-sm',
      'name' => $name,
      'id' => $n,
    ])->class([
      'is-invalid' => $errors->has($n),
    ]) }}
    @if($multiple) multiple @endif
  >
    @if(!$multiple) 
      <option value=""></option>
    @endif

    @foreach($options as $option)
      <option 
        value="{{ $option->id }}"
        @if($multiple && $value)
          @if(in_array($option->id, old($n, $value))) selected @endif
        @else
          @if($option->id == old($name, $value)) selected @endif
        @endif
      >
        {{ $option->name }}
      </option>
    @endforeach
  </select>

  @error($n)
    <span class="invalid-feedback">
      {{ $message }}
    </span>
  @enderror
</div>
