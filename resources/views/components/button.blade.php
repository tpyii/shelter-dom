<button {{ $attributes->merge([
  'class' => 'btn btn-'.$color,
  'type' => 'button'
]) }}>
  {{ $slot }}
</button>
