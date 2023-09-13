<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meetup extends Model
{
    use HasFactory;


    /**
     * Attach the meetups to the user model.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'organiser_id');
    }
}     