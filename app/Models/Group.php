<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Group extends Model 
{
    use HasFactory;

    /**
     * Modify the meetup category value from the table.
     */
    protected function privacy(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst(strtolower($value))
        );
    }

} 
  