<div>
    <div class="mb-16">
        <div class="flex justify-between items-center">
            <h3 class="w-full text-2xl font-semibold">旅程の一覧</h3>
            <x-ui.button wire="openCreateItineraryModal" color="blue">➕ 旅程の追加</x-ui.button>
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

    @if ($itineraryModal)
    <x-ui.modal maxWidth="max-w-[560px]" wire="closeItineraryModal">
        <form wire:submit.prevent="itineraryStore" class="flex flex-col w-full">
            @csrf
            <h3 class="text-2xl text-center font-semibold mb-8">
                旅程の追加
            </h3>
            <x-form.input type="datetime-local" name="date_and_time" wire="date_and_time">日時</x-form.input>
            <x-form.input name="title" wire="title">旅程の目的</x-form.input>
            <x-form.textarea name="content" wire="content">
                旅程の詳細
            </x-form.textarea>
            <x-form.textarea name="hide_content" wire="hide_content">
                追加情報
            </x-form.textarea>
            <x-ui.button class="block mx-auto my-4">
                旅程を追加する
            </x-ui.button>
        </form>
        <x-ui.button wire="closeItineraryModal" color="gray" class="block mx-auto">
            閉じる
        </x-ui.button>
    </x-ui.modal>
    @endif
</div>