<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meetup extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'time',
        'thumbnail',
        'category',
    ];

    /**
     * Attach the meetups to the user model.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_meetups', 'meetup_id', 'user_id');
    }
}     