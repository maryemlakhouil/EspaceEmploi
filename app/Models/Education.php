<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 


class Education extends Model
{
     use HasFactory;
     protected $fillable = [
        'candidate_profile_id',
        'diploma',
        'school',
        'year',
    ];

    public function candidateProfile()
    {
        return $this->belongsTo(CandidateProfile::class);
    }
}
