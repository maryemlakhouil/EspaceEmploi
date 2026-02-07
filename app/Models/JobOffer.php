<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; 

class JobOffer extends Model
{
     use HasFactory;
    protected $fillable = [
        'user_id',
        'company',
        'title',
        'description',
        'type_contrat',
        'image',
        'is_closed',
    ];

        protected $casts = [
            'is_closed' => 'boolean',
        ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function candidates()
    {
        return $this->belongsToMany(User::class, 'applications')->withPivot('status')->withTimestamps();
    }

    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
