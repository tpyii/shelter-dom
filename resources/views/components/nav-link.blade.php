@props([
  'href',
  'route',
])

@if (Route::has($href))
  <li class="nav-item">
    <a 
      {{ $attributes->merge([
        'class' => 'nav-link',
        'href' => route($href)
      ])->class([
        'active' => request()->routeIs($route)
      ]) }}
    >
      {{ $slot }}
    </a>
  </li>
@endif
