<?php

use Illuminate\Database\Seeder;

class SurgeryTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\SurgeryType::truncate();

        $data = [
            0 =>[
                'name' => 'Open inguinal hernia mesh repair',
                'side' => 'Active',
                'type_of_Anaesthesia' => 'Active',
            ],
            1 =>[
                'name' => 'Appendisectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            2 =>[
                'name' => 'Hydrocelectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            3 =>[
                'name' => 'PPV Ligation',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            4 =>[
                'name' => 'Mastectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            5 =>[
                'name' => 'Thyroidectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            6 =>[
                'name' => 'Varicose Vein Surgery',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            7 =>[
                'name' => 'Carpal tunnel syndrome',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            8 =>[
                'name' => 'Hemicolectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            9 =>[
                'name' => 'Esophagectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            10 =>[
                'name' => 'Parotidectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            11 =>[
                'name' => 'Gastrectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            12 =>[
                'name' => 'Umbilical Hernia repair',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            13 =>[
                'name' => 'Epigastric Hernia',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            14 =>[
                'name' => 'Haemorrhoidectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            15 =>[
                'name' => 'Fistulectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            16 =>[
                'name' => 'Lateral Anal Sphincterotomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            17 =>[
                'name' => 'Amputation',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            18 =>[
                'name' => 'Tendon Repair',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            19 =>[
                'name' => 'laparoscopic cholecystectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            20 =>[
                'name' => 'Laparoscopic  Inguinal Hernia TAPP repair',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            21 =>[
                'name' => 'Laparoscopic left inguinal hernia repair (TEP)',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            22 =>[
                'name' => 'Laparoscopic left hemicolectomy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
            23 =>[
                'name' => 'OGD',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],

            24 =>[
                'name' => 'Colonoscopy',
                'side' => 'Inactive',
                'type_of_Anaesthesia' => 'Inactive',
            ],
        ];
        \App\SurgeryType::insert($data);
    }
}
