<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DesignationTableSeeder::class);
        $this->call(BrainTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
//        $this->call(CXRTableSeeder::class);
        $this->call(LanguageTableSeeder::class);
        $this->call(PusCellTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(SurgeryTypeTableSeeder::class);
        $this->call(TitleTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
