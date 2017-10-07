<?php

use Illuminate\Database\Seeder;

class BrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Brain::truncate();

        $data = [
            0 =>[
                'name' => 'Normal',
            ],
            1 =>[
                'name' => 'Right EDH',
            ],
            2 =>[
                'name' => 'Left EDH',
            ],
            3 =>[
                'name' => 'Right SDH',
            ],
            4 =>[
                'name' => 'Left SDH',
            ],
            5 =>[
                'name' => 'Right SAH',
            ],
            6 =>[
                'name' => 'Left SAH',
            ],
            7 =>[
                'name' => 'Right ICH',
            ],
            8 =>[
                'name' => 'Left ICH',
            ],
            9 =>[
                'name' => 'Diffuse Axonal Injury Present',
            ],
            10 =>[
                'name' => 'Cerebral Edema Present',
            ],
        ];

        \App\Brain::insert($data);
    }
}
