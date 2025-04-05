<div>
    @if($trips->isEmpty())
    <p>旅行データがありません。</p>
    @else

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($trips as $trip)
        <div class="relative p-6 rounded-lg shadow-md hover:shadow-lg border border-gray-300 bg-white transition">
            <div class="flex">
                <span class="mr-1 text-xl">🗺</span>
                <h3 class="text-xl font-semibold">{{ $trip->title }}</h3>
            </div>
            <p class="my-4">{{ $trip->destination }}</p>
            <div class="flex items-center text-sm">
                <span class="inline-flex items-center mr-4">
                    ✈️
                    <span class="ml-1">{{ $trip->start_date }}</span>
                </span>
                <span class="inline-flex items-center">
                    🏠
                    <span class="ml-1">{{ $trip->end_date }}</span>
                </span>
            </div>
            <p class="my-4"> 詳細を見る → </p>
        </div>
        @endforeach
        <button class="min-h-[210px] p-6 rounded-lg shadow-md hover:shadow-lg border border-blue-300 bg-white transition">
            ➕
        </button>
    </div>
    @endif
</div>