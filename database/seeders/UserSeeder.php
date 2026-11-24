<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profil;
use App\Models\Topic;
use App\Models\Reply;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

    User::factory(10)
    ->has(Profil::factory())
    ->has(Topic::factory())
    ->has(Reply::factory())
    ->create();
        
    }
}
