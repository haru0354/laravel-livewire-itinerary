@props(['name' => null, 'type' => 'text', 'wire' => null])

<div class="w-full p-2">
    <label for="{{ $name }}" class="w-full text-left leading-7 text-sm">
        {{ $slot }}
    </label>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}"
        @if ($wire) wire:model="{{ $wire }}" @endif
        class="w-full py-1 leading-7 rounded transition-colors duration-200
        {{ $errors->has($wire) ? 'border-red-500 bg-red-50' : 'border-gray-300 bg-gray-50' }}"
        {{ $attributes }}>
    @error ($wire)
    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>