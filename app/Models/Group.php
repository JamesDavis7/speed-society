<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Group extends Model 
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'privacy',
    ];

    /**
     * Get the groups attached users.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_groups', 'group_id', 'user_id');
    }
} 
  