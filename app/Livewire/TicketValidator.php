<?php

namespace App\Livewire;

use App\Models\Passenger;
use Livewire\Component;

class TicketValidator extends Component
{
    public $token = '';
    public $passenger;

    public function updatedToken($value)
    {
        $value = trim($value);
        dd('this');

        if (strlen($value) === 36) {
            $this->token = $value;
            $this->loadPassenger();
        } else {
            $this->passenger = null;
        }
    }

    public function loadPassenger()
    {
        $this->passenger = Passenger::where('passenger_token', $this->token)->first();
        dd($this->passenger);

        if (!$this->passenger) {
            session()->flash('error', 'Passenger not found!');
        }
    }

    public function render()
    {
        return view('livewire.ticket-validator');
    }
}

