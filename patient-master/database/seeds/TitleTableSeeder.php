<?php

use Illuminate\Database\Seeder;

class TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Title::truncate();

        $data = [
            0 =>[
                'name' => 'Consultant',
            ],
            1 =>[
                'name' => 'House Surgeon',
            ],
            2 =>[
                'name' => 'Surgeon',
            ],
        ];

        \App\Title::insert($data);
    }
}
