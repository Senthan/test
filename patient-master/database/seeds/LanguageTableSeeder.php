<?php

use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Language::truncate();

        $time = \Carbon\Carbon::now();

        $data = [
            0 =>[
                'language' => 'English',
                'code' => 'en',
            ],
            1 =>[
                'language' => 'Tamil',
                'code' => 'ta',
            ],
            2 =>[
                'language' => 'Sinhala',
                'code' => 'si',
            ],
        ];

        foreach ($data as $key => $datum) {
            $data[$key]['created_at'] = $time;
            $data[$key]['updated_at'] = $time;
        }

        \App\Language::insert($data);
    }
}
