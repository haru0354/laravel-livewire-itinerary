<div>
    <div class="mb-16">
        <x-ui.header-with-create-button wire="openCreateItineraryModal" title="旅程">
            旅程の一覧
        </x-ui.header-with-create-button>
        @php
            $previousDate = null;
        @endphp

        @foreach ($itineraries as $itinerary)
            @php
                $parsedDateTime = \Carbon\Carbon::parse($itinerary->date_and_time);
                $currentDate = $parsedDateTime->format('Y-m-d');
                $timeOnly = $parsedDateTime->format('H:i');
            @endphp

            @if ($currentDate !== $previousDate)
                <h3 class="text-lg font-semibold mt-10 mb-2">
                    📅 {{ \Carbon\Carbon::parse($itinerary->date_and_time)->format('Y年m月d日') }}
                </h3>
                @php $previousDate = $currentDate; @endphp
            @endif

        <div class="relative flex flex-col my-6 p-6 border border-gray-300 rounded-lg shadow-lg hover:shadow-2xl transition-shadow bg-gray-50">
            <p class="mb-3">⌚️ {{ $timeOnly }}</p>
            <h3 class="mb-2 text-xl font-bold">🗺 {{ $itinerary->title }}</h3>
            <p class="mt-2">{!! nl2br(e($itinerary->content)) !!}</p>
            <p>{!! nl2br(e($itinerary->hide_content)) !!}</p>
            <x-ui.edit-button wire="openEditItineraryModal({{ $itinerary->id }})" />
        </div>
        @endforeach
    </div>

    @if ($itineraryModal)
    <x-ui.modal maxWidth="max-w-[560px]" wire="closeItineraryModal">
        <form wire:submit.prevent="{{ $editingItineraryId ? 'itineraryUpdate' : 'itineraryStore' }}" class="flex flex-col w-full">
            @csrf
            <h3 class="text-2xl text-center font-semibold mb-8">
                {{ $editingItineraryId ? '旅程の編集' : '旅程の追加' }}
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
                {{ $editingItineraryId ? '旅程を編集する' : '旅程を追加する' }}
            </x-ui.button>
        </form>
        <x-ui.button wire="closeItineraryModal" color="gray" class="block mx-auto">
            閉じる
        </x-ui.button>
        @if ($editingItineraryId)
        <div class="flex items-center justify-center mt-4 pt-4 border-t border-gray-400 border-dashed">
            <x-ui.button wire="openDeleteItineraryModal" color="red">削除 </x-ui.button>
        </div>
        @endif
    </x-ui.modal>
    @endif
    
    @if ($deleteItineraryModal)
    <x-ui.modal maxWidth="max-w-[560px]" wire="closeDeleteItineraryModal">
        <h3 class="text-2xl text-center font-semibold mb-8">
            旅程の削除
        </h3>
        <p class="mb-6 text-center text-red-500">削除した旅程は完全に失われ、復元をすることはできません。</p>
        <p class="text-center">問題なければ削除を行ってください。</p>
        <x-ui.button wire="closeDeleteItineraryModal" color="gray" class="block mx-auto my-6">キャンセル </x-ui.button>
        <x-ui.button wire="itineraryDestroy" color="red" class="block mx-auto">削除する</x-ui.button>
    </x-ui.modal>
    @endif
</div>