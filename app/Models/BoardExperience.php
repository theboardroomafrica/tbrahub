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

    public function scopeOrdered($query)
    {
        return $query->orderBy('start_date', 'desc')
            ->orderByRaw('CASE WHEN end_date IS NULL THEN 1 ELSE 0 END')
            ->orderBy('end_date', 'asc');
    }
}
