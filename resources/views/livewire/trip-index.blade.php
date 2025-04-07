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

    @if($tripModal)
    <x-ui.modal maxWidth="max-w-[560px]" wire="closeModal">
        <h3 class="text-2xl font-semibold mb-8">
            {{ $editingTripId ? '旅のしおりの編集' : '旅のしおりの追加' }}
        </h3>
        <form wire:submit.prevent="{{ $editingTripId ? 'tripUpdate' : 'tripStore' }}" class="flex flex-col items-start w-full text-left">
            @csrf
            <div class="flex justify-between w-full">
                <div class="flex flex-col w-1/2 mr-6">
                    <label for="start_date" class="my-2">出発日</label>
                    <input type="date" wire:model="start_date" id="start_date">

                </div>
                <div class="flex flex-col w-1/2">
                    <label for="end_date" class="my-2">帰宅日</label>
                    <input type="date" wire:model="end_date" id="end_date">
                </div>
            </div>
            <label for="title" class="my-2">タイトル</label>
            <input type="text" wire:model="title" id="title" class="w-full">
            <label for="destination" class="my-2">行先</label>
            <input type="text" wire:model="destination" id="destination" class="w-full">
            <button class="mx-auto my-8">
                {{ $editingTripId ? '旅のしおりを編集' : '旅のしおりを追加' }}
            </button>
        </form>
        <button wire:click="closeModal">
            閉じる
        </button>
        @if ($editingTripId)
        <div class="flex flex-col items-center justify-center mt-4 border-t border-gray-400 border-dashed">
            <button class="mt-4" wire:click="tripDestroy">
                削除
            </button>
        </div>
        @endif
    </x-ui.modal>
    @endif

    <!-- UIテスト -->
    <x-form.input name="a">テスト </x-form.input>


</div>