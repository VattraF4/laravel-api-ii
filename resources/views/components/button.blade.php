@props([
    'type' => 'primary',
    'text' => 'Button',
    'show' => false,
])

@if ($show)

    <button class="btn btn-{{ $type ?? 'primary' }}">
        {{ $text ?? 'Button' }}
    </button>
@endif