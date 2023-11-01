<?php

namespace App\Livewire;

use App\Enums\MeetupCategoryEnum;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Meetup;
use App\Models\User;

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
    public $meetupOrganisers;
    public $isGoing;

    public $organisers;
    public $categories;

    /**
     * Runs when the component is first mounted.
     */
    public function mount()
    {
        $this->user = auth()->user();  
    }

    /**
     * Handle and filter the meetup data.
     */
    private function handleMeetups()
    {
        $this->categories = MeetupCategoryEnum::cases();
        $this->organisers = User::where('id', '!=', $this->user->id)->pluck('name', 'id');
    
        $query = Meetup::query()->whereHas('users', function ($q) {
            $q->where('role', 'organiser')
               ->where('user_id', '!=', $this->user->id);
        });

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
     * Handle the user toggling their whether or not they're going
     */
    public function toggleIsGoing($meetupId)
    {
        $this->isGoing = !$this->isGoing;
        $this->user->meetups()->toggle([$meetupId => ['role' => 'participant']]);
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
