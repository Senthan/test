<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::truncate();

        $data = [
            0 =>[
                'name' => 'Cardiologist',
            ],
            1 =>[
                'name' => 'Neurosurgeon',
            ],
            2 =>[
                'name' => 'Oncologist',
            ],
        ];

        \App\Category::insert($data);
    }
}
