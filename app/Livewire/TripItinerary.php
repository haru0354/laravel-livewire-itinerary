<?php

namespace App\Livewire;

use App\Models\Itinerary;
use Livewire\Component;

class TripItinerary extends Component
{
    public $trip_id;
    public $itineraries;

    public function mount($trip_id)
    {
        $this->itineraries = Itinerary::where('trip_id', $trip_id)
            ->orderBy('date_and_time', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.trip-itinerary');
    }
}
