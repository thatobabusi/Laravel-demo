<?php

use Illuminate\Database\Seeder;
use App\Department;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $department = Department::create([
            'department'       => 'Production'
        ]);

        $department = Department::create([
                'department'       => 'Research and Development'
        ]);

        $department = Department::create([
                'department'       => 'Purchasing'
        ]);

        $department = Department::create([
                'department'       => 'Marketing '
        ]);

        $department = Department::create([
                'department'       => 'Human Resource Management'
        ]);

        $department = Department::create([
                'department'       => 'Accounting and Finance'
        ]);

        $department = Department::create([
            'department'       => 'IT'
        ]);
    }
}
