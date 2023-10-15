<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Group;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class MyGroupDirectory extends Component
{
    public $name;
    public $description;
    public $privacy;
    public $thumbnail;
    public $user;
    public $text;

    public $groupId;
    public $isEditing = false;

    /**
     * Validation rules for when creating or updating.
     *
     * @return array
     */
    protected function rules(): array 
    {
        $rules = [
            'name' => ['required', Rule::unique('groups', 'name')->ignore($this->groupId)],
            'description' => ['required', 'max:500'],
            'privacy' => ['required', 'in:groups,public,private,hidden'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpeg,png,jpg|max:2048']
        ];

        return $rules;
    }

    /**
     * Runs when the component is first mounted.
     *
     * @return void
     */
    public function mount()
    {
        $this->user = Auth::user();
    }

    /**
     * Handle the create group modal.
     *
     * @return void
     */
    public function createGroup()
    {
        $this->isEditing = false;
        $this->dispatch('open-modal');
        $this->reset();
    }

    /**
     * Create the group.
     *
     * @return void
     */
    public function save()
    {
        dd($this->user);
        $validatedData = $this->validate();

        $group = Group::create($validatedData);
        
        auth()->user()->groups()->attach($group->id);

        $this->dispatch('close-modal');

        session()->flash('groupSuccess', 'Group created successfully.');

        $this->reset();
    }

    /**
     * Handle the edit group modal.
     *
     * @param  int  $id
     * @return void
     */
    public function editGroup($id)
    {
        $this->isEditing = true;   
        $this->dispatch('open-modal');
        
        $this->groupId = $id;

        $group = Group::find($id);

        $this->name = $group->name;
        $this->description = $group->description;
        $this->privacy = strtolower($group->privacy);
        $this->thumbnail = $group->thumbnail;
    }

    /**
     * Update the group.
     *
     * @return void
     */
    public function update()
    {
        $validatedData = $this->validate();

        $group = Group::find($this->groupId);

        $group->update($validatedData);

        $this->dispatch('close-modal');
        
        session()->flash('groupSuccess', 'Group updated successfully.');
    }

    /**
     * Delete the group.
     *
     * @param  int  $id
     * @return void
     */
    public function deleteGroup($id)
    {
        $group = Group::findOrFail($id);

        $relatedUser = User::find(Auth::id());
        $relatedUser->groups()->detach($id);

        $group->delete();

        session()->flash('groupSuccess', 'Group deleted successfully.');
    }

    /**
     * Reset validation on close of the modal.
     *
     * @return void
     */
    #[On('closeGroupModal')] 
    public function resetValidationOnClose()
    {
        $this->resetValidation();
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        $userGroups = auth()->user()->groups;
        return view('livewire.my-group-directory', compact('userGroups'));
    }
}
