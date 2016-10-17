<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'firstname'        => 'Darryl',
            'lastname'         => 'Goodrich',
            'username'         => 'darryl',
            'dob'              => '1986-06-19',
            'gender'           => 'male',
            'email'            => 'admin@admin.com',
            'password'         => bcrypt('secret'),
            'postal_address'   => 'Test address',
            'physical_address' => 'Test address',
        ]);

        $user = User::create([
            'firstname'        => 'Brody',
            'lastname'         => 'Goodrich',
            'username'         => 'brody',
            'dob'              => '2015-04-29',
            'gender'           => 'male',
            'email'            => 'admin1@admin.com',
            'password'         => bcrypt('secret'),
            'postal_address'   => 'Test address',
            'physical_address' => 'Test address',
        ]);

        $user = User::create([
            'firstname'        => 'Nicole',
            'lastname'         => 'Goodrich',
            'username'         => 'nicole',
            'dob'              => '1986-06-16',
            'gender'           => 'female',
            'email'            => 'admin2@admin.com',
            'password'         => bcrypt('secret'),
            'postal_address'   => 'Test address',
            'physical_address' => 'Test address',
        ]);

    }
}
