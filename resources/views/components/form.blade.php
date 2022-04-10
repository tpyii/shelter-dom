@props([
  'method' => 'GET',
])

<form 
  {{ $attributes->merge([
    'method' => $method,
  ]) }}>

  @if($method === 'POST')
    @csrf
  @endif

  {{ $slot }}
</form>
