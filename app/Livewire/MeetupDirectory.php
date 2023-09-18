<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Meetup;
use App\Models\User;


class MeetupDirectory extends Component
{
    use WithPagination;

    public $search = "";
    public $time;
    public $category = "";
    public $organiser = "";    

    public $organisers;
    public $categories;

    /**
     * Render the component.
     */
    public function render()
    {
        $meetups = $this->handleMeetups();

        return view('livewire.meetup-directory', [
            'meetups' => $meetups,
        ]);
    }

    /**
     * Handle and filter the meetup data.
     */
    private function handleMeetups()
    {
        $query = Meetup::query();

        $this->organisers = User::pluck('name', 'id');
        $this->categories = Meetup::distinct('category')->pluck('category');

        if($this->search){
            $query->where('title', 'LIKE', '%'.$this->search.'%');
        }

        if ($this->organiser) {
            $query->where('organiser_id', $this->organiser);
        }

        if ($this->category) {
            $query->where('category', $this->category);
        }

        return $query->paginate(5);
    }
}
