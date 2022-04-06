@props([
  'color'
])

<button {{ $attributes->merge([
  'class' => 'btn btn-sm btn-'.$color,
  'type' => 'button'
]) }}>
  {{ $slot }}
</button>
