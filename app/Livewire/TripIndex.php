<?php

namespace App\Livewire;

use App\Models\Trip;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TripIndex extends Component
{
    public $user_id;
    public $trips;
    public $editingTripId = null;
    public $tripModal = false;
    public $deleteModal = false;
    public $start_date, $end_date, $title, $destination;

    public function mount()
    {
        $this->user_id = Auth::id();
        $this->getTrips();
    }

    public function openCreateModal()
    {
        $this->resetTrip();
        $this->tripModal = true;
    }

    public function openEditModal($editingTripId)
    {
        $this->resetTrip();
        $trip = Trip::find($editingTripId);

        $this->editingTripId = $trip->id;
        $this->start_date = $trip->start_date;
        $this->end_date = $trip->end_date;
        $this->title = $trip->title;
        $this->destination = $trip->destination;
        $this->tripModal = true;
    }

    public function openDeleteModal()
    {
        $this->deleteModal = true;
    }

    public function closeModal()
    {
        $this->resetErrorBag();
        $this->tripModal = false;
    }

    public function closeDeleteModal()
    {
        $this->deleteModal = false;
    }

    public function tripStore()
    {
        $validated = $this->validate();

        Trip::create($validated);

        $this->getTrips();

        $this->resetTrip();
        $this->closeModal();
    }

    public function tripUpdate()
    {
        $validated = $this->validate();
        
        $trip = Trip::find($this->editingTripId);

        if ($trip) {
            $trip->update($validated);
        }

        $this->getTrips();

        $this->resetTrip();
        $this->closeModal();
    }

    public function tripDestroy()
    {
        $trip = Trip::find($this->editingTripId);
        $trip->delete();

        $this->getTrips();

        $this->resetTrip();
        $this->closeDeleteModal();
        $this->closeModal();
    }

    public function getTrips()
    {
        $this->trips = Trip::where('user_id', $this->user_id)
            ->orderBy('start_date', 'asc')
            ->get();
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'title' => 'required|string|max:30',
            'destination' => 'nullable|string|max:20',
        ];
    }

    public function resetTrip()
    {
        $this->reset(['editingTripId', 'start_date', 'end_date', 'title', 'destination']);
    }

    public function render()
    {
        return view('livewire.trip-index');
    }
}
