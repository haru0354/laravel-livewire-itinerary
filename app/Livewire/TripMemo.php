<?php

namespace App\Livewire;

use App\Models\Memo;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TripMemo extends Component
{
    public $user_id;
    public $trip_id;
    public $memos;
    public $editingMemoId = null;
    public $memoModal = false;
    public $deleteMemoModal = false;
    public $title, $content;

    public function mount($trip_id)
    {
        $this->user_id = Auth::id();
        $this->trip_id = $trip_id;

        $this->getMemos();
    }

    public function openCreateMemoModal()
    {
        $this->resetMemo();
        $this->memoModal = true;
    }

    public function openEditMemoModal($editingMemoId)
    {
        $this->resetMemo();
        $memo = Memo::find($editingMemoId);

        $this->editingMemoId = $memo->id;
        $this->title = $memo->title;
        $this->content = $memo->content;
        $this->memoModal = true;
    }

    public function openDeleteMemoModal()
    {
        $this->deleteMemoModal = true;
    }

    public function closeMemoModal()
    {
        $this->resetErrorBag();
        $this->resetMemo();
        $this->memoModal = false;
    }

    public function closeDeleteMemoModal()
    {
        $this->deleteMemoModal = false;
    }

    public function memoStore()
    {
        $validated = $this->validate();

        Memo::create($validated);

        $this->getMemos();

        $this->resetMemo();
        $this->closeMemoModal();
    }

    public function memoUpdate()
    {
        $validated = $this->validate();
        $memo = Memo::find($this->editingMemoId);

        if ($memo) {
            $memo->update($validated);
        }

        $this->getMemos();

        $this->resetMemo();
        $this->closeMemoModal();
    }

    public function memoDestroy()
    {
        $memo = Memo::find($this->editingMemoId);
        $memo->delete();

        $this->getMemos();

        $this->resetMemo();
        $this->closeDeleteMemoModal();
        $this->closeMemoModal();
    }

    public function getMemos()
    {
        $this->memos = Memo::where('trip_id', $this->trip_id)
            ->get();
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'trip_id' => 'required|exists:trips,id',
            'title' => 'required|string|max:30',
            'content' => 'nullable|string|max:200',
        ];
    }

    public function resetMemo()
    {
        $this->reset(['editingMemoId', 'title', 'content']);
    }

    public function render()
    {
        return view('livewire.trip-memo');
    }
}
