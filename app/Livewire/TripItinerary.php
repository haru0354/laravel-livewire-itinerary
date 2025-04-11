<?php

namespace App\Livewire;

use App\Models\Itinerary;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TripItinerary extends Component
{
    public $user_id;
    public $trip_id;
    public $itineraries;
    public $editingItineraryId = null;
    public $itineraryModal = false;
    public $date_and_time, $title, $content, $hide_content;

    public function mount($trip_id)
    {
        $this->user_id = Auth::id();
        $this->trip_id = $trip_id;

        $this->itineraries = Itinerary::where('trip_id', $trip_id)
            ->orderBy('date_and_time', 'asc')
            ->get();
    }

    public function openCreateItineraryModal()
    {
        $this->resetItinerary();
        $this->itineraryModal = true;
    }

    public function openEditItineraryModal($editingItineraryId)
    {
        $this->resetItinerary();
        $itinerary = Itinerary::find($editingItineraryId);

        $this->editingItineraryId = $itinerary->id;
        $this->date_and_time = $itinerary->date_and_time;
        $this->title = $itinerary->title;
        $this->content = $itinerary->content;
        $this->hide_content = $itinerary->hide_content;
        $this->itineraryModal = true;
    }

    public function closeItineraryModal()
    {
        $this->resetItinerary();
        $this->itineraryModal = false;
    }

    public function itineraryStore()
    {
        Itinerary::create([
            'user_id' => $this->user_id,
            'trip_id' => $this->trip_id,
            'date_and_time' => $this->date_and_time,
            'title' => $this->title,
            'content' => $this->content,
            'hide_content' => $this->hide_content,
        ]);

        $this->resetItinerary();
        $this->closeItineraryModal();
    }

    public function itineraryUpdate()
    {
        $itinerary = Itinerary::find($this->editingItineraryId);

        if ($itinerary) {
            $itinerary->date_and_time = $this->date_and_time;
            $itinerary->title = $this->title;
            $itinerary->content = $this->content;
            $itinerary->hide_content = $this->hide_content;
            $itinerary->save();
        }

        $this->resetItinerary();
        $this->closeItineraryModal();
    }

    public function itineraryDestroy()
    {
        $itinerary = Itinerary::find($this->editingItineraryId);
        $itinerary->delete();

        $this->resetItinerary();
        $this->closeItineraryModal();
    }

    public function resetItinerary()
    {
        $this->reset(['editingItineraryId', 'date_and_time', 'title', 'content', 'hide_content']);
    }

    public function render()
    {
        return view('livewire.trip-itinerary');
    }
}
