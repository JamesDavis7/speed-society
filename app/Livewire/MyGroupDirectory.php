<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Enums\GroupPrivacyEnum;
use App\Livewire\Forms\GroupForm;
use App\Models\Group;

class MyGroupDirectory extends Component
{
    public GroupForm $form;

    public $groupId;
    public $isEditing = false;
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
     * 
     */
    public function createGroup()
    {
        $this->isEditing = false;
        $this->dispatch('open-modal');
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

        $this->form->reset();

        $this->dispatch('close-modal');

        session()->flash('success', 'Group created successfully.');
    }

    /**
     * Handle the edit group modal.
     */
    public function editGroup($id)
    {
        $this->dispatch('open-modal');
        $this->isEditing = true;

        $this->groupId = $id;
    }

    /**
     * Update thhe 
     */
    public function update()
    {
        $this->form->validate();

        $group = Group::find($this->groupId);

        $group->update(
            $this->form->all()
        );

        $this->form->reset();

        $this->dispatch('close-modal');

        session()->flash('success', 'Group updated successfully.');
    }

    /**
     * Render the component.
     */
    public function render()
    {
        return view('livewire.my-group-directory');
    }
}
