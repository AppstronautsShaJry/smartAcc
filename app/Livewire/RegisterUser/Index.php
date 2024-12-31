<?php

namespace App\Livewire\RegisterUser;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Index extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|same:password_confirmation',
    ];

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'User created successfully!');

        // Clear the form fields
        $this->reset(['name', 'email', 'password', 'password_confirmation']);
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.register-user.index')->layout('layouts.guest');
    }
}
