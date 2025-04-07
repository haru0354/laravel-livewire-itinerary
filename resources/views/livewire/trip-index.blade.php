<div>
    @if ($trips->isEmpty())
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
            <button
                wire:click="openEditModal({{ $trip->id }})"
                class="absolute top-0 right-0 text-white px-1 py-0 rounded shadow-md opacity-80 hover:opacity-100 bg-gray-500 transition-opacity">
                📝編集
            </button>
        </div>
        @endforeach
        <button wire:click="openCreateModal" class="min-h-[210px] p-6 rounded-lg shadow-md hover:shadow-lg border border-blue-300 bg-white transition">
            ➕
        </button>
    </div>
    @endif

    @if ($tripModal)
    <x-ui.modal maxWidth="max-w-[560px]" wire="closeModal">
        <h3 class="text-2xl text-center font-semibold mb-8">
            {{ $editingTripId ? '旅のしおりの編集' : '旅のしおりの追加' }}
        </h3>
        <form wire:submit.prevent="{{ $editingTripId ? 'tripUpdate' : 'tripStore' }}" class="flex flex-col w-full">
            @csrf
            <div class="flex justify-between w-full">
                <x-form.input type="date" name="start_date" wire="start_date">出発日 </x-form.input>
                <x-form.input type="date" name="end_date" wire="end_date">帰宅日 </x-form.input>
            </div>
            <x-form.input name="title" wire="title">タイトル </x-form.input>
            <x-form.input name="destination" wire="destination">行先 </x-form.input>
            <x-ui.button class="block mx-auto mt-4">
                {{ $editingTripId ? '旅のしおりを編集' : '旅のしおりを追加' }}
            </x-ui.button>
        </form>
        <x-ui.button wire="closeModal" color="gray" class="block mx-auto">閉じる </x-ui.button>
        @if ($editingTripId)
        <div class="flex items-center justify-center mt-4 pt-4 border-t border-gray-400 border-dashed">
            <x-ui.button wire="tripDestroy" color="red">削除 </x-ui.button>
        </div>
        @endif
    </x-ui.modal>
    @endif

    <!-- UIテスト -->
    <x-form.input name="a">テスト </x-form.input>
    <x-form.textarea name="aa">テスト </x-form.textarea>
    <x-ui.button-link :route="route('top')">テスト </x-ui.button-link>
    <x-ui.button size="normal">テスト </x-ui.button>


</div>