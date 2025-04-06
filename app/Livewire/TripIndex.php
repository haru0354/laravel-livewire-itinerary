<?php

namespace App\Livewire;

use App\Models\Trip;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class TripIndex extends Component
{
    public $userId;
    public $trips;
    public $tripModal = false;

    public function mount()
    {
        $this->userId = Auth::id();
        $this->trips = Trip::where('user_id', $this->userId)
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

    public function render()
    {
        return view('livewire.trip-index');
    }
}
