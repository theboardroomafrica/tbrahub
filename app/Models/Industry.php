<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function users()
    {
        return $this->hasManyThrough(User::class, UserIndustry::class);
    }
}
