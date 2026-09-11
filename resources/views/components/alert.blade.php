@props(['success', 'error'])

@if ($success)
    <div class="alert alert-success">
        {{ $slot }}
    </div>
@else
    <div class="alert alert-danger">
        {{ $error }}
    </div>
@endif