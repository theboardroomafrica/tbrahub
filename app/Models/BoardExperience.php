<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardExperience extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'committee_ids' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function position()
    {
        return $this->belongsTo(BoardPosition::class, 'position_id');
    }
}
