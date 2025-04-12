<div>
    <div>
        <x-ui.header-with-create-button wire="openCreateMemoModal" title="メモ">
            メモの一覧
        </x-ui.header-with-create-button>
        <div class="flex flex-wrap justify-center">
            @foreach ($memos as $memo)
            <div class="relative flex-wrap w-full max-w-[480px] my-3 mx-3 p-6 shadow-lg hover:shadow-2xl transition-shadow rounded-lg border border-gray-300 bg-gray-50">
                <h3 class="pb-1 mt-2 mb-4 text-xl text-center font-bold border-b border-gray-400 border-dashed">{{ $memo->title }}</h3>
                <p>{!! nl2br(e($memo->content)) !!}</p>
                <x-ui.edit-button wire="openEditMemoModal({{ $memo->id }})" />
            </div>
            @endforeach
        </div>
    </div>

    @if ($memoModal)
    <x-ui.modal maxWidth="max-w-[560px]" wire="closeMemoModal">
        <form wire:submit.prevent="{{ $editingMemoId ? 'memoUpdate' : 'memoStore' }}" class="flex flex-col w-full">
            @csrf
            <h3 class="text-2xl text-center font-semibold mb-8">
                {{ $editingMemoId ? 'メモの編集' : 'メモの追加' }}
            </h3>
            <x-form.input name="title" wire="title">タイトル</x-form.input>
            <x-form.textarea name="content" wire="content">
                メモの内容
            </x-form.textarea>
            <x-ui.button class="block mx-auto my-4">
                {{ $editingMemoId ? 'メモを編集する' : 'メモを追加する' }}
            </x-ui.button>
        </form>
        <x-ui.button wire="closeMemoModal" color="gray" class="block mx-auto">
            閉じる
        </x-ui.button>
        @if ($editingMemoId)
        <div class="flex items-center justify-center mt-4 pt-4 border-t border-gray-400 border-dashed">
            <x-ui.button wire="memoDestroy" color="red">削除 </x-ui.button>
        </div>
        @endif
    </x-ui.modal>
    @endif
</div>