<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Enums\GroupPrivacyEnum;
use App\Livewire\Forms\GroupForm;
use Livewire\Attributes\On;
use App\Models\Group;

class MyGroupDirectory extends Component
{
    public GroupForm $form;

    public $editing = false;
    public $modalTitle;
    public $user;
    public $userGroups;
    public $groupPrivacyOptions;

    /**
     * Runs when the component is first mounted.
     */
    public function mount()
    {
        $this->groupPrivacyOptions = GroupPrivacyEnum::cases();
        $this->user = Auth::user();
        $this->userGroups = $this->user->groups;
    }

    /**
    * Store the users input from the create group form.
    */
    public function save()
    {
        $this->form->validate();
        
        Group::create(
            $this->form->all()
        );

        $this->dispatch('close-modal');

        session()->flash('success', 'Group created successfully.');
    }

    #[On('editing')]
    public function edit($id)
    {
        $this->editing = true;
    }


    /**
     * Render the component.
     */
    public function render()
    {
        return view('livewire.my-group-directory');
    }
}
