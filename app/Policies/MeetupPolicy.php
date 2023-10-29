<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Meetup;

class MeetupPolicy
{
    /**
     * Determines whether or not the user can manage the meetup.
     */
    public function edit(User $user, Meetup $meetup)
    {
        return $user->id === $meetup->pivot->user_id && $meetup->pivot->role === 'organiser';
    }
    
}
