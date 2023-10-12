<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\Group;

class GroupForm extends Form
{    
    public Group $group;

    #[Rule(['required', 'unique:groups,name'])]
    public $name;

    #[Rule(['required' , 'max:500'])]
    public $description;

    #[Rule(['required', 'in:groups,public,private,hidden'])]
    public $privacy;

    #[Rule(['nullable', 'image', 'mimes:jpeg,png,jpg|max:2048'])]
    public $thumbnail;

}
