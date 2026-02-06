<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use App\Models\CandidateProfile;
use App\Models\Application;
use App\Models\JobOffer;


class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;
     use HasRoles; 

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'specialite',
        'bio',
        'photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
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
            'password' => 'hashed',
        ];
    }
    /*
    * 1 user hasone 1 candidate_profile
    */
    public function profile()
    {
        return $this->hasOne(CandidateProfile::class);
    }

    /*
    *un recruteur peut creer plusieurs offres 
    */

    // public function jobOffers()
    // {
    //     return $this->belongsToMany(JobOffer::class, 'applications')->withPivot('status')->withTimestamps();
    // }

    public function jobOffers()
    {
        return $this->hasMany(JobOffer::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    } 

    public function appliedJobOffers()
    {
        return $this->belongsToMany(JobOffer::class, 'applications')->withPivot('status')->withTimestamps();
    }

    public function sentFriendRequests()
    {
        return $this->hasMany(Amitie::class, 'sender_id');
    }

    public function receivedFriendRequests()
    {
        return $this->hasMany(Amitie::class, 'receiver_id');
    }

    public function friends()
    {
        return User::whereIn('id', function ($query) {
            $query->select('receiver_id')->from('Amitie')
                  ->where('sender_id', auth()->id())
                  ->where('status', 'accepted');
        })->orWhereIn('id', function ($query) {
            $query->select('sender_id')
                  ->from('Amitie')
                  ->where('receiver_id', auth()->id())
                  ->where('status', 'accepted');
        });
    }



}
