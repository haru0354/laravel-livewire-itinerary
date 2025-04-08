<?php

namespace App\Livewire;

use App\Models\Trip;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TripShow extends Component
{
    public $user_id;
    public $trip_id;
    public $trip;

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

    public function render()
    {
        return view('livewire.trip-show');
    }
}
