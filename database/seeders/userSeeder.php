<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Joko Ahmad"
        ]);
        User::create([
            'name' => "Subarjo"
        ]);
        User::create([
            'name' => "Ilham Basuki"
        ]);
        User::create([
            'name' => "Pendekar Pedang"
        ]);
    }
}
