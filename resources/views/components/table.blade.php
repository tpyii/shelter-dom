<table {{ $attributes->merge(['class' => 'table table-sm table-bordered table-hover']) }}>
  <thead>
    <tr>
      {{ $header }}
    </tr>
  </thead>
  <tbody>
    {{ $slot }}
  </tbody>
  @isset ($footer)
    <tfoot>
      <tr>
        {{ $footer }}
      </tr>
    </tfoot>
  @endisset
</table>
