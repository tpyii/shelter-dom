@props([
  'value' => '',
  'options' => [],
  'multiple' => false,
  'name',
  'label',
  'required' => false,
])

@php
  $n = $multiple ? substr($name, 0, -2) : $name;
  $value = $multiple
    ? (empty($value)
      ? []
      : is_object($value))
        ? $value->pluck('id')->toArray()
        : $value
    : $value;
  $value = old($n, $multiple && empty($value) ? [] : $value);
@endphp

<div class="mb-3">
  <x-label :for="$n">
    {{ $label }}
    @if($required) * @endif
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
    @if($required) required @endif
  >
    @if(!$multiple)
      <option value=""></option>
    @endif

    @foreach($options as $option)
      <option
        value="{{ $option->id }}"
        @if($multiple)
          @if(in_array($option->id, $value)) selected @endif
        @else
          @if($option->id == $value) selected @endif
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
