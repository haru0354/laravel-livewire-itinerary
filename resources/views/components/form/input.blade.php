@props(['name' => null, 'type' => 'text', 'wire' => null])

<div class="w-full p-2">
    <label for="{{ $name }}" class="w-full text-left leading-7 text-sm">
        {{ $slot }}
    </label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        @if ($wire) wire:model="{{ $wire }}" @endif
        {{ $attributes->merge(['class' => "w-full py-1 leading-7 border rounded border-gray-300 bg-gray-50 focus:bg-white transition-colors duration-200"]) }}>
</div>