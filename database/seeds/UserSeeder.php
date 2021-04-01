<?php

use Illuminate\Database\Seeder;
use App\models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $data=[
                    [
                    'name'=>'Admin Admin',
                    'phone'=>'0111111111',
                    'email'=>'admin@mazraa.com',
                    'password'=>'$2y$10$8uuHSMyODfXKe6kP6FhiheK6bvAbsVBcPNEqE9llJrd/VSlHC2E1O', //123456
                    'image'=>'https://pngimage.net/wp-content/uploads/2018/06/logo-admin-png-7.png',
//                    'description'=>'this is Admin describtion',
                    'type'=>'Admin'
                    ],
                    [
                    'name'=>'Mohammed',
                    'phone'=>'0111111111',
                    'email'=>'mohamed@gmail.com',
                    'password'=>'$2y$10$bhWz5bWsp9/7/m6zxlToZOCoG3AwauqDyDp5CGsLSVLgkPQFQ/2Iy', //12345678
                    'image'=>'https://pngimage.net/wp-content/uploads/2018/06/logo-admin-png-7.png',
//                    'description'=>'this is Admin describtion',
                    'type'=>'Admin'
                    ]
            ];

            DB::table('users')->insert($data);

//            factory(User::class, 15)->create();
    }

}
