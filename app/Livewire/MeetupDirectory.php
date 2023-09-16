<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Meetup;

class MeetupDirectory extends Component
{
    use WithPagination;

    public $search = "";
    public $organiser;
    public $time;
    public $category;
    
    public function render()
    {
        $meetups = $this->filterMeetup();

        return view('livewire.meetup-directory', [
            'meetups' => $meetups,
        ]);
    }

    private function filterMeetups()
    {
        dd('here');
    }
}