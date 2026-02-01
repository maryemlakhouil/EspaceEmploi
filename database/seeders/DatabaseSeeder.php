<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\Skill;
use App\Models\CandidateProfile;
use App\Models\JobOffer;


class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
      // Roles
        Role::firstOrCreate(['name' => 'chercheur']);
        Role::firstOrCreate(['name' => 'recruiter']);

        // Skills
        Skill::factory(10)->create();

        // Chercheurs
        User::factory(10)->create()->each(function ($user) {
            $user->assignRole('chercheur');

            $profile = CandidateProfile::factory()->create([
                'user_id' => $user->id,
            ]);

            $profile->skills()->attach(
                Skill::inRandomOrder()->take(3)->pluck('id')
            );
        });

        // Recruteurs
        User::factory(3)->create()->each(function ($user) {
            $user->assignRole('recruiter');

            JobOffer::factory(3)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}
