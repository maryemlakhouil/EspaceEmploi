<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'job_offer_id',
        'user_id',
        'status',
    ];

    public function jobOffer()
    {
        return $this->belongsTo(JobOffer::class);
    }

    public function candidate()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
