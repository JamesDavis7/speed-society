<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
    
    /**
     * Modify the meetup category value from the table.
     */
    protected function category(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst(strtolower($value))
        );
    }
}     