@props(['name' => null, 'value' => null, 'wire' => null])

<div class="w-full p-2">
    <label for="{{ $name }}" class="w-full text-left leading-7 text-sm">
        {{ $slot }}
    </label>
    <textarea
        name="{{ $name }}"
        id="{{ $name }}"
        @if ($wire) wire:model="{{ $wire }}" @endif
        class="w-full h-32 py-1 leading-7 rounded transition-colors duration-200
            {{ $errors->has($wire) ? 'border-red-500 bg-red-50' : 'border-gray-300 bg-gray-50' }}">{{ old($name, $value) }}</textarea>
    @error ($wire)
    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
    @enderror
</div>