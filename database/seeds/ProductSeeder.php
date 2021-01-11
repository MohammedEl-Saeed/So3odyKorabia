<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();

        $data = [
            [
                'name' => 'Egg',
                'logo' => 'https://pngimage.net/wp-content/uploads/2018/06/logo-admin-png-7.png',
                'description' => 'this is Egg describtion',
                'type' => 'Egg'
            ],
            [
                'name' => 'Milk',
                'logo' => 'https://pngimage.net/wp-content/uploads/2018/06/logo-admin-png-7.png',
                'description' => 'this is Milk describtion',
                'type' => 'Milk'
            ],
            [
                'name' => 'Butter',
                'logo' => 'https://pngimage.net/wp-content/uploads/2018/06/logo-admin-png-7.png',
                'description' => 'this is Butter describtion',
                'type' => 'Butter'
            ]
        ];

        DB::table('products')->insert($data);

    }

}
