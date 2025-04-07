@props(['color' => 'blue', 'size' => 'normal', 'route' => null])

@php
    $colors = [
        'blue' => 'bg-blue-500 hover:bg-blue-700',
        'red' => 'bg-red-500 hover:bg-red-700',
        'green' => 'bg-green-500 hover:bg-green-700',
        'gray' => 'bg-gray-500 hover:bg-gray-700',
        'indigo' => 'bg-indigo-500 hover:bg-indigo-700',
    ];

    $sizes = [
        'full' => 'w-full my-2 py-3 px-6',
        'normal' => 'min-w-[180px] my-2 py-3 px-8',
        'small' => 'min-w-[110px] my-2 py-3 px-4',
    ];

    $colorClass = $colors[$color] ?? $colors['blue'];
    $sizeClass = $sizes[$size] ?? $sizes['normal'];
@endphp

<a href="{{ $route }}"
    {{ $attributes->merge(['class' => "$colorClass $sizeClass text-white  font-bold shadow-md rounded transition duration-200"]) }}>
    {{ $slot }}
</a>
