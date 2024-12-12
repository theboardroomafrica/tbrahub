<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable, HasUuids, InteractsWithMedia;

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

    public function getCurrentProfessionalExperienceAttribute()
    {
        return $this->professionalExperiences()->first();
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

    public function getAvatarAttribute()
    {
        return $this->getFirstMediaUrl('avatars') ?: "https://via.placeholder.com/300";
    }

    public function getFilesAttribute()
    {
        return $this->getMedia('*');
    }

    public function getFileUrlsAttribute()
    {
        return $this->files->implode('original_url', ', ');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatars');
    }

    public function opportunityApplications()
    {
        return $this->hasMany(OpportunityApplication::class, 'user_id');
    }

    public function hasOpportunityApplication($id)
    {
        return $this->opportunityApplications()->where('opportunity_id', $id)->first();
    }

    public function opportunityConnections()
    {
        return $this->hasMany(OpportunityConnection::class, 'user_id');
    }

    public function opportunityNotes()
    {
        return $this->hasMany(OpportunityNote::class, 'user_id');
    }

    public function opportunityConnection($opportunity_id)
    {
        return $this->opportunityConnections()->where('opportunity_id', $opportunity_id)->first();
    }

    public function createOpportunityConnection($opportunity_id)
    {
        $connection = OpportunityConnection::create([
            'user_id' => $this->id,
            'opportunity_id' => $opportunity_id
        ]);

        $connection->notifyUser();

        return $connection;
    }

    public function createOrDeleteOpportunityBookmark($opportunity_id)
    {
        $bookmark = $this->opportunityBookmark($opportunity_id)->first();

        if ($bookmark) return $bookmark->delete();

        return OpportunityBookmark::create([
            'user_id' => $this->id,
            'opportunity_id' => $opportunity_id
        ]);
    }

    public function opportunityNote($opportunity_id)
    {
        return $this->opportunityNotes()->where('opportunity_id', $opportunity_id)->first();
    }

    public function updateOrCreateOpportunityNote($opportunity_id, $note)
    {
        return OpportunityNote::updateOrCreate([
            'user_id' => $this->id,
            'opportunity_id' => $opportunity_id
        ], [
            'note' => $note
        ]);
    }

    public function opportunityBookmark()
    {
        return $this->hasOne(OpportunityBookmark::class);
    }


}
