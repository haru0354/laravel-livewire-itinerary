@props(['name' => null, 'value' => null, 'wire' => null])

<div class="w-full p-2">
    <label for="{{ $name }}" class="w-full text-left leading-7 text-sm">
        {{ $slot }}
    </label>
    <textarea name="{{ $name }}" id="{{ $name }}"
        @if ($wire) wire:model="{{ $wire }}" @endif
        class="w-full h-32 py-1 leading-7 border rounded border-gray-300 bg-gray-50 focus:bg-white transition-colors duration-200">
    {{ $value }}
    </textarea>
</div>