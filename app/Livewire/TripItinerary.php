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
    public $deleteItineraryModal = false;
    public $date_and_time, $title, $content, $hide_content;

    public function mount($trip_id)
    {
        $this->user_id = Auth::id();
        $this->trip_id = $trip_id;

        $this->getItineraries();
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

    public function openDeleteItineraryModal()
    {
        $this->deleteItineraryModal = true;
    }

    public function closeItineraryModal()
    {
        $this->resetErrorBag();
        $this->resetItinerary();
        $this->itineraryModal = false;
    }

    public function closeDeleteItineraryModal()
    {
        $this->deleteItineraryModal = false;
    }

    public function itineraryStore()
    {

        $validated = $this->validate(); 
        
        Itinerary::create($validated);

        $this->getItineraries();

        $this->resetItinerary();
        $this->closeItineraryModal();
    }

    public function itineraryUpdate()
    {
        $validated = $this->validate();

        $itinerary = Itinerary::find($this->editingItineraryId);

        if ($itinerary) {
            $itinerary->update($validated);
        }

        $this->getItineraries();

        $this->resetItinerary();
        $this->closeItineraryModal();
    }

    public function itineraryDestroy()
    {
        $itinerary = Itinerary::find($this->editingItineraryId);
        $itinerary->delete();

        $this->getItineraries();

        $this->resetItinerary();
        $this->closeDeleteItineraryModal();
        $this->closeItineraryModal();
    }

    public function getItineraries()
    {
        $this->itineraries = Itinerary::where('trip_id', $this->trip_id)
            ->orderBy('date_and_time', 'asc')
            ->get();
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'trip_id' => 'required|exists:trips,id',
            'date_and_time' => 'required|date',
            'title' => 'required|string|max:30',
            'content' => 'nullable|string|max:200',
            'hide_content' => 'nullable|string|max:200',
        ];
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
