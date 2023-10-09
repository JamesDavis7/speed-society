<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Enums\GroupPrivacyEnum;
use App\Livewire\Forms\GroupForm;
use App\Models\Group;

class MyGroupDirectory extends Component
{
    public $user;
    public $userGroups;
    public $groupPrivacyOptions;
    public GroupForm $form;

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
        $this->validate();

        Group::create(
            $this->form->all()
        );
    }


    /**
     * Render the component.
     */
    public function render()
    {
        return view('livewire.my-group-directory');
    }
}
