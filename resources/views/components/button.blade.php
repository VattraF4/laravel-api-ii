<!-- @props(['type', 'text']) -->
<button class="btn btn-{{ $type ?? 'primary' }}">
    {{ $text ?? 'Button' }}
</button>