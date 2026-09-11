@props(['success', 'error', 'type' => 'success'])
@if ($success)
    <div class="alert alert-{{ $type }}">
        {{ $slot }}
    </div>
@else
    <div class="alert alert-{{ $type }}">
        {{ $error }}
    </div>
@endif