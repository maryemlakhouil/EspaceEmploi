<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 


class Experience extends Model
{
     use HasFactory;
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
