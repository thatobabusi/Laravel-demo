<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'Standard User']);
        $role = Role::create(['name' => 'Song Writer']);
        $role = Role::create(['name' => 'Admin']);
    }
}
