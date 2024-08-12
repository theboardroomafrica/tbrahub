<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function writtenProficiency()
    {
        return $this->belongsTo(LanguageProficiency::class, 'written_proficiency_id');
    }

    public function spokenProficiency()
    {
        return $this->belongsTo(LanguageProficiency::class, 'spoken_proficiency_id');
    }
}
