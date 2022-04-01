@props([
  'value' => '',
  'options' => [],
  'multiple' => false,
  'name',
])

@php
  $n = $multiple ? substr($name, 0, -2) : $name;
  $value = $multiple ? $value->pluck('id')->toArray() : $value;
@endphp

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
      @if($multiple)
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
