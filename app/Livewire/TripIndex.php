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
        $this->trips = Trip::where('user_id', $this->user_id)
            ->orderBy('start_date', 'asc')
            ->get();
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
        $this->tripModal = false;
    }

    public function closeDeleteModal()
    {
        $this->deleteModal = false;
    }

    public function tripStore()
    {
        Trip::create([
            'user_id' => Auth::id(),
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'title' => $this->title,
            'destination' => $this->destination,
        ]);

        $this->trips = Trip::where('user_id', $this->user_id)
            ->orderBy('start_date', 'asc')
            ->get();

        $this->resetTrip();
        $this->closeModal();
    }

    public function tripUpdate()
    {
        $trip = Trip::find($this->editingTripId);

        if ($trip) {
            $trip->start_date = $this->start_date;
            $trip->end_date = $this->end_date;
            $trip->title = $this->title;
            $trip->destination = $this->destination;
            $trip->save();
        }

        $this->trips = Trip::where('user_id', $this->user_id)
            ->orderBy('start_date', 'asc')
            ->get();

        $this->resetTrip();
        $this->closeModal();
    }

    public function tripDestroy()
    {
        $trip = Trip::find($this->editingTripId);
        $trip->delete();

        $this->trips = Trip::where('user_id', $this->user_id)
            ->orderBy('start_date', 'asc')
            ->get();

        $this->resetTrip();
        $this->closeDeleteModal();
        $this->closeModal();
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
