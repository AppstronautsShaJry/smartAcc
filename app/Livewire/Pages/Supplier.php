<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Supplier extends Component
{

    public $showEditModal = false;
    public bool $showDeleteModal = false;

    public function save()
    {
        $this->showEditModal = true;
    }
    public function render()
    {
        return view('livewire.pages.supplier');
    }
}
