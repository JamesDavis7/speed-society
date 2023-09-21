<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Group;
use Livewire\WithPagination;

class GroupDirectory extends Component
{
    use WithPagination;

    public $all;
    public $public;
    public $private;
    public $privacy;
    
    /**
     * Render the component.
     */
    public function render()
    {
        $groups = $this->sortGroups();

        return view('livewire.group-directory', [
            'groups' => $groups
        ]);
    }

    /**
     * Sort groups by privacy type based on user selection.
     */
    private function sortGroups()
    {
        $query = Group::query()->whereIn('privacy', ['private', 'public']);

        if ($this->privacy == 'public' || $this->privacy == 'private') {
            $query->where('privacy', $this->privacy);
        }

        return $query->paginate(8);
    }
};