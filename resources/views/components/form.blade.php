<form {{ $attributes->merge(['method' => 'GET']) }}>
  @csrf
  {{ $slot }}
</form>
