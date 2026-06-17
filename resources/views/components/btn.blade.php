@props([
    'type' => 'button',
])
<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn border-none !p-1']) }}>{{ $slot }}</button>