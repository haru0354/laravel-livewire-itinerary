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
    public $title, $content;

    public function mount($trip_id)
    {
        $this->user_id = Auth::id();
        $this->trip_id = $trip_id;

        $this->memos = Memo::where('trip_id', $trip_id)
            ->get();
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

    public function closeMemoModal()
    {
        $this->resetMemo();
        $this->memoModal = false;
    }

    public function memoStore()
    {
        Memo::create([
            'user_id' => $this->user_id,
            'trip_id' => $this->trip_id,
            'title' => $this->title,
            'content' => $this->content,
        ]);

        $this->resetMemo();
        $this->closeMemoModal();
    }

    public function memoUpdate()
    {
        $memo = Memo::find($this->editingMemoId);

        if ($memo) {
            $memo->title = $this->title;
            $memo->content = $this->content;
            $memo->save();
        }

        $this->resetMemo();
        $this->closeMemoModal();
    }

    public function memoDestroy()
    {
        $memo = Memo::find($this->editingMemoId);
        $memo->delete();

        $this->resetMemo();
        $this->closeMemoModal();
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
