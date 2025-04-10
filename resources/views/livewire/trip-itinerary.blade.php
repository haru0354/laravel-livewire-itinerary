<div>
    <div class="mb-16">
        <div class="flex justify-between items-center">
            <h3 class="w-full text-2xl font-semibold">旅程の一覧</h3>
            <x-ui.button  color="blue">➕ 旅程の追加</x-ui.button>
        </div>
        @foreach ($itineraries as $itinerary)
        <div class="relative flex flex-col my-6 p-6 border border-gray-300 rounded-lg shadow-lg hover:shadow-2xl transition-shadow bg-gray-50">
            <p class="mb-3">⌚️ {{ $itinerary->date_and_time }}</p>
            <h3 class="mb-2 text-xl font-bold">🗺 {{ $itinerary->title }}</h3>
            <p class="mt-2">{{ $itinerary->content }}</p>
            <p>{{ $itinerary->hide_content }}</p>
        </div>
        @endforeach
    </div>
</div>