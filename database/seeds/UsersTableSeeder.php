<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'email' => 'user@email.com',
            'name' => 'Admin',
            'admin' => true,
            'password' => bcrypt('adminpassword')
        ]);
        factory(App\User::class, 2)->create();
    }
}
