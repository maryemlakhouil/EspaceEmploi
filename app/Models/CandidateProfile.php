<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use App\Models\User;

class CandidateProfile extends Model
{
     use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'bio',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function educations()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
}
