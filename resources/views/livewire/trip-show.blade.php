<div>

    <div>
        <h3 class="w-full text-2xl font-semibold ">{{$trip->title}}のメモ一覧</h3>
        <div class="flex flex-wrap justify-center">
            @foreach ($trip->memos as $memo)
            <div class="flex-wrap w-full max-w-[480px] my-6 mx-4 p-6 shadow-lg hover:shadow-2xl transition-shadow rounded-lg border border-gray-300 bg-gray-50">
                <h3 class="pb-1 mt-2 mb-4 text-xl text-center font-bold border-b border-gray-700 border-dashed">{{ $memo->title }}</h3>
                <p>{{ $memo->content }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>