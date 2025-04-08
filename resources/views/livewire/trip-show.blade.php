<div>

    <div>
        <div class="flex justify-between items-center">
            <h3 class="w-full text-2xl font-semibold">{{$trip->title}}のメモ</h3>
            <x-ui.button wire="openCreateMemoModal" color="blue">➕ メモの作成</x-ui.button>
        </div>
        <div class="flex flex-wrap justify-center">
            @foreach ($trip->memos as $memo)
            <div class="flex-wrap w-full max-w-[480px] my-6 mx-4 p-6 shadow-lg hover:shadow-2xl transition-shadow rounded-lg border border-gray-300 bg-gray-50">
                <h3 class="pb-1 mt-2 mb-4 text-xl text-center font-bold border-b border-gray-700 border-dashed">{{ $memo->title }}</h3>
                <p>{{ $memo->content }}</p>
            </div>
            @endforeach
        </div>
    </div>

    @if ($memoModal)
    <x-ui.modal maxWidth="max-w-[560px]" wire="closeModal">
        <x-ui.button wire="closeMemoModal" color="gray" class="block mx-auto">閉じる </x-ui.button>
    </x-ui.modal>
    @endif

</div>