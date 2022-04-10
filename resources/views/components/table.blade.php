<div class="table-responsive">
  <table {{ $attributes->merge(['class' => 'table table-sm table-striped']) }}>
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
</div>
