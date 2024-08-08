<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserIndustry extends Model
{
    use HasFactory;

    protected $casts = [
        'skill_ids' => 'array',
    ];

    protected $guarded = [];

    protected $table = "user_industry";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function industry()
    {
        return $this->belongsTo(Industry::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'industry_skill');
    }
}
