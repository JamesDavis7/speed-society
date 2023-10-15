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
        if(!$this->mineOnly){
            $query = Meetup::query();
        } else{
            $query = Meetup::where('organiser_id', $this->user->id);
        }

        $this->categories = MeetupCategoryEnum::cases();
        $this->organisers = User::pluck('name', 'id');
        
        if($this->search){
            $query->where('title', 'LIKE', '%'.$this->search.'%');
        }
        
        if ($this->organiser) {
            $query->where('organiser_id', $this->organiser);
        }
        
        if ($this->category) {
            $query->where('category', $this->category);
        }
        
        if($this->time) {
            if($this->time == 'earliest'){
                $query->orderBy('time', 'asc')->get();
            } else{
                $query->orderBy('time', 'desc')->get();
            }
            
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
