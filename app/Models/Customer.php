<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function scopeSearch($query, $value)
    {
        return $query->where("first_name", "like", "%{$value}%")
            ->orWhere("last_name", "like", "%{$value}%")
            ->orWhere("email", "like", "%{$value}%")
            ->orWhere("phone", "like", "%{$value}%")
            ->orWhere("country", "like", "%{$value}%");
    }
}
