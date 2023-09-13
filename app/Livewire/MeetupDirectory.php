<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Meetup;

class MeetupDirectory extends Component
{
    use WithPagination;

    public function render()
    {
        $meetups = Meetup::with('user')->paginate(5);

        return view('livewire.meetup-directory', [
            'meetups' => $meetups
        ]);
    }
}
