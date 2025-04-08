@props(['wire' => null])

<button
    @if ($wire) wire:click="{{ $wire }}" @endif
    class="absolute top-0 right-0 text-white px-1 py-0 rounded shadow-md opacity-80 hover:opacity-100 bg-gray-500 transition-opacity">
    📝編集
</button>