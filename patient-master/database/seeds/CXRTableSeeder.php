<?php

use Illuminate\Database\Seeder;

class CXRTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Cxr::truncate();

        $data = [
            0 =>[
                'name' => 'Normal',
            ],
            1 =>[
                'name' => 'Right Lung Shadow',
            ],
            2 =>[
                'name' => 'Left Lung Shadow',
            ],
            3 =>[
                'name' => 'Cardio Megaly',
            ],
            4 =>[
                'name' => 'Right Pneumo thorax',
            ],
            5 =>[
                'name' => 'Left Pneumo thorax',
            ],
            6 =>[
                'name' => 'Right Effusion',
            ],
            7 =>[
                'name' => 'Left Effusion',
            ],
            8 =>[
                'name' => 'Right Reib fracture',
            ],
            9 =>[
                'name' => 'Left Reib fracture',
            ],
        ];

        \App\Cxr::insert($data);
    }
}
