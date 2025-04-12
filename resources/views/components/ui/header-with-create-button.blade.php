@props(['title' => "", 'wire' => null])

<div class="flex justify-between items-center">
    <h3 class="w-full text-2xl font-semibold">{{ $slot }}</h3>
    <x-ui.button wire="{{ $wire }}" color="blue">➕ {{ $title }}の追加</x-ui.button>
</div>