<?php

use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Designation::insert([
            ['name' => 'Consultant Surgeon', 'description' => 'Consultant Surgeon'],
            ['name' => 'Anesthetist', 'description' => 'Anesthetist'],
            ['name' => 'Registrar', 'description' => 'Registrar'],
            ['name' => 'Senior Registrar', 'description' => 'Senior Registrar'],
            ['name' => 'Senior House Officer', 'description' => 'Senior House Officer'],
            ['name' => 'House Officer', 'description' => 'House Officer'],
            ['name' => 'Enginner', 'description' => 'Enginner']
        ]);
    }
}
