<?php

use Illuminate\Database\Seeder;

class OptionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('option_types')->delete();

        $data=[
            [
                'name'=>'الحجم',
            ],
            [
                'name'=>'الأوزان',
            ],
            [
                'name'=>'التقطيع',
            ],
            [
                'name'=>'التجهيز',
            ],
            [
                'name'=>'الأحشاء',
            ],
            [
                'name'=>'الأوزان',
            ],
            [
                'name'=>'الرأس',
            ],
            [
                'name'=>'العبوات',
            ],
        ];

        DB::table('option_types')->insert($data);
    }
}
