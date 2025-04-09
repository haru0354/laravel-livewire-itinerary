<?php

namespace App\Livewire;

use App\Models\Memo;
use App\Models\Trip;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TripShow extends Component
{
    public $user_id;
    public $trip_id;
    public $trip;
    public $memoModal = false;
    public $title, $content;

    public function mount($trip_id)
    {
        $this->user_id = Auth::id();
        $this->trip_id = $trip_id;
        $this->trip = Trip::where('id', $this->trip_id)
            ->with([
                'itineraries' => function ($query) {
                    $query->orderBy('date_and_time', 'asc');
                },
                'memos'
            ])
            ->first();
    }

    public function openCreateMemoModal()
    {
        $this->memoModal = true;
    }

    public function closeMemoModal()
    {
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

        $this->closeMemoModal();
    }

    public function render()
    {
        return view('livewire.trip-show');
    }
}
