@props(['maxWidth' => 'max-w-[380px]', 'id' => 'modal', 'wire' => null])

<div id="{{ $id }}"
    @if($wire) wire:click="{{ $wire }}" @endif
    class="flex fixed inset-0 items-center justify-center w-full h-full bg-gray-900 bg-opacity-50 ">
    <div
        @click.stop
        {{ $attributes->merge(['class' => "$maxWidth flex-col w-full mx-2 p-6 rounded-lg shadow-lg text-center bg-white"]) }}>
        {{ $slot }}
    </div>
</div>