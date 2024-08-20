<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            // 'password' => 'hashed',
        ];
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function getFilamentName(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function skills()
    {
        return $this->hasManyThrough(Skill::class, UserIndustry::class, 'user_id', 'id', 'id', 'user_industry_id');
    }

    public function interests()
    {
        return $this->belongsToMany(Interest::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function userIndustries()
    {
        return $this->hasMany(UserIndustry::class);
    }

    public function professionalExperiences()
    {
        return $this->hasMany(ProfessionalExperience::class);
    }

    public function orderedProfessionalExperiences()
    {
        return $this->professionalExperiences()->ordered()->get();
    }

    public function boardExperiences()
    {
        return $this->hasMany(BoardExperience::class);
    }

    public function orderedBoardExperiences()
    {
        return $this->boardExperiences()->ordered()->get();
    }

    public function languages()
    {
        return $this->hasMany(UserLanguage::class);
    }

    public function recognitions()
    {
        return $this->hasMany(Recognition::class, 'user_id');
    }

    public function achievements()
    {
        return $this->hasMany(Achievement::class, 'user_id');
    }

    public function boardSkills()
    {
        return $this->hasMany(UserSkill::class);
    }
}
