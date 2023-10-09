<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;

class GroupForm extends Form
{
    #[Rule(['required', 'unique:groups' ])]
    public $name;

    #[Rule(['required' , 'max:500'])]
    public $description;

    #[Rule(['required', 'in:groups,public,private,hidden'])]
    public $privacy;

    #[Rule(['nullable', 'image', 'mimes:jpeg,png,jpg|max:2048'])]
    public $thumbnail;
}
