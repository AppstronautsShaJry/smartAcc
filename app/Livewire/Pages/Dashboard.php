<?php

namespace App\Livewire\Pages;

use App\Models\Party;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $customers = Party::where('party_type', 1)->where('user_id', auth()->id())->where('is_active', true)->get();
        $suppliers = Party::where('party_type', 2)->where('user_id', auth()->id())->where('is_active', true)->get();
        return view('livewire.pages.dashboard')->layout('layouts.web')->with(
            [
                'customers' => $customers,
                'suppliers' => $suppliers,
            ]
        );
    }
}
