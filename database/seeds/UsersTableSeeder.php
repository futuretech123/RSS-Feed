<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a admin user
        factory(User::class)->create([
            'name' => 'Neeraj Thakur',
            'email' => 'neeraj@vkaps.com',
            'is_admin' => 1,
        ]);
    }
}
