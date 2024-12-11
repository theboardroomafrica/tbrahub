<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpportunityApplicationExperience extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'oaes';

    public function opportunityApplication()
    {
        return $this->belongsTo(OpportunityApplication::class);
    }

    public function experience()
    {
        return $this->belongsTo(Experience::class, 'opportunity_experiences_id');
    }

    public function professionalExperience()
    {
        return $this->belongsTo(ProfessionalExperience::class);
    }
}
