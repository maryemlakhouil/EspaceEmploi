<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
     protected $fillable = ['name'];

    public function candidateProfiles()
    {
        return $this->belongsToMany(CandidateProfile::class);
    }
}
