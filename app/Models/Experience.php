<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'candidate_profile_id',
        'position',
        'company',
        'start_date',
        'end_date',
    ];

    public function candidateProfile()
    {
        return $this->belongsTo(CandidateProfile::class);
    }
}
