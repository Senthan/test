<?php

use Illuminate\Database\Seeder;

class PusCellTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PusCell::truncate();

        $data = [
            0 =>[
                'name' => 'Normal',
            ],
            1 =>[
                'name' => '1 -5 ',
            ],
            2 =>[
                'name' => '5 - 10',
            ],
            3 =>[
                'name' => ' >10 ',
            ]
        ];

        \App\PusCell::insert($data);
    }
}
