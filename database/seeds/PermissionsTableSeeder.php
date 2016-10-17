<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\PermissionCategory;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = PermissionCategory::create([
            'name' => 'User'
        ]);

        Permission::create([
            'name' => 'Create Profiles',
            'permission_category_id' => $category->id]);

        Permission::create([
            'name' => 'View Profiles',
            'permission_category_id' => $category->id]);

        Permission::create(['name' => 'Edit Profiles',
            'permission_category_id' => $category->id]);

        Permission::create(['name' => 'Delete Profiles',
            'permission_category_id' => $category->id]);


        $category = PermissionCategory::create([
            'name' => 'Songs'
        ]);

        Permission::create([
            'name' => 'Create Songs',
            'permission_category_id' => $category->id]);

        Permission::create([
            'name' => 'View Songs',
            'permission_category_id' => $category->id]);

        Permission::create(['name' => 'Edit Songs',
            'permission_category_id' => $category->id]);

        Permission::create(['name' => 'Delete Songs',
            'permission_category_id' => $category->id]);
    }
}
