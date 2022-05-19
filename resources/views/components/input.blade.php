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

  @case('password')
    <div class="mb-3">
      <x-label :for="$n">
        {{ $label }}
        @if($required) * @endif
      </x-label>

      <div class="input-group">
        <span class="input-group-text p-0">
          <button class="btn-group border-0 bg-transparent show-password">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
            </svg>
          </button>
          <button class="btn-group border-0 bg-transparent d-none hide-password">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
              <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
              <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
            </svg>
          </button>
        </span>

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
