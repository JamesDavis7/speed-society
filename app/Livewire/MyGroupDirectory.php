<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MyGroupDirectory extends Component
{
    public $user;
    public $userGroups;

    public function mount()
    {
        $this->user = Auth::user();
        $this->userGroups = $this->user->groups;
    }

    /**
     * Render the component.
     */
    public function render()
    {
        return view('livewire.my-group-directory');
    }
}
