<?php

use App\EventType;
use Illuminate\Database\Seeder;

class EventTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = collect([
            ['name' => 'Travel', 'class' => 'red', 'icon' => '', 'readonly' => true],
            ['name' => 'Leave', 'class' => 'orange', 'icon' => '', 'readonly' => true],
            ['name' => 'Birthdays', 'class' => 'yellow', 'icon' => '', 'readonly' => true],
            ['name' => 'Events', 'class' => 'olive', 'icon' => '', 'readonly' => true],
            ['name' => 'Public Holidays', 'class' => 'green', 'icon' => '', 'readonly' => true],
        ])->transform(function ($type) {
            $type['created_at'] = carbon()->now();
            $type['updated_at'] = carbon()->now();
            return $type;
        })->toArray();
        EventType::insert($types);
    }
}