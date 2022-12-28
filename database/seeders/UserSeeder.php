<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'BossaBox',
            'email' => 'admin@bossabox.com',
            'password' => '$2y$10$txtR4izNy1jAc75nbsytlu6usRcXygrGKQPjgqmgKm9ocFwwjIx5e'
        ]);
    }
}
