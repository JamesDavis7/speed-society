<?php

namespace App\Livewire;

use App\Enums\MeetupCategoryEnum;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Meetup;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MeetupDirectory extends Component
{
    use WithPagination;

    public $user;
    public $search = "";
    public $time;
    public $category = "";
    public $organiser = "";    
    public $latest;
    public $earliest;
    public $mineOnly;
    public $organiserName;
    public $meetupOrganisers;

    public $organisers;
    public $categories;

    /**
     * Runs when the component is first mounted.
     */
    public function mount()
    {
        $this->mineOnly = false;
        $this->user = auth()->user();  
    }

    /**
     * Handle and filter the meetup data.
     */
    private function handleMeetups()
    {
        $this->categories = MeetupCategoryEnum::cases();
        $this->organisers = User::pluck('name', 'id');

        $query = Meetup::query();

        if ($this->mineOnly) {
            $query->whereHas('users', function ($q) {
                $q->where('user_id', $this->user->id);
            });
        }
    
        if ($this->search) {
            $query->where('title', 'LIKE', '%' . $this->search . '%');
        }
    
        if ($this->category) {
            $query->where('category', $this->category);
        }

        if ($this->organiser) {
            $query->whereHas('users', function ($q) {
                $q->where('user_id', $this->organiser);
            });        
        }
    
        if ($this->time) {
            $query->orderBy('time', $this->time == 'earliest' ? 'asc' : 'desc');
        }
    
        return $query->paginate(5);
}

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
}
