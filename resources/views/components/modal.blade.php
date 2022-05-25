@props([
    'title',
])

<div 
    {{ $attributes->merge([
        'class' => 'modal fade',
        'tabindex' => '-1',
    ]) }}>
    
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <x-button color="close" data-bs-dismiss="modal" aria-label="Close"></x-button>
            </div>

            <div class="modal-body">
                {{ $slot }}
            </div>

            <div class="modal-footer">
                {{ $footer }}
            </div>

        </div>
    </div>
</div>
