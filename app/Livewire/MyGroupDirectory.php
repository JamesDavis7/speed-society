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
    public $groupPrivacyOptions;

    /**
     * Runs when the component is first mounted.
     */
    public function mount()
    {
        $this->groupPrivacyOptions = GroupPrivacyEnum::cases();
        $this->user = Auth::user();
    }

    /**
     * Handle the create group modal.
     */
    public function createGroup()
    {
        $this->isEditing = false;
        $this->dispatch('open-modal');
    }

    /**
    * Create the group.
    */
    public function save()
    {        
        $this->form->validate();
        
        $group = Group::create(
            $this->form->all()
        );

        $this->user->groups()->attach($group);

        $this->dispatch('close-modal');

        session()->flash('success', 'Group created successfully.');
    }

    /**
     * Handle the edit group modal.
     */
    public function editGroup($id)
    {
        $this->isEditing = true;

        $group = Group::find($id);
        $groupData = $group->toArray();
        $groupData['privacy'] = strtolower($group->privacy);

        $this->form->fill($groupData);
        
        $this->dispatch('open-modal');

        $this->groupId = $id;
    }

    /**
     * Update the group.
     */
    public function update()
    {
        $this->form->validate();

        $group = Group::find($this->groupId);

        $group->update(
            $this->form->all()
        );

        $this->dispatch('close-modal');

        session()->flash('success', 'Group updated successfully.');
    }

    /**
     * Render the component.
     */
    public function render()
    {
        $userGroups = $this->user->groups;

        return view('livewire.my-group-directory', compact('userGroups'));
    }
}
