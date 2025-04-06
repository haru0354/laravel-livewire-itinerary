<?php

namespace App\Livewire;

use App\Models\Trip;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TripIndex extends Component
{
    public $user_id;
    public $trips;
    public $tripModal = false;
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
        $this->tripModal = true;
    }

    public function closeModal()
    {
        $this->tripModal = false;
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

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.trip-index');
    }
}
