<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
          [
              'name' => 'Admin',
              'email' => 'admin@doccure.com',
              'is_admin' => '1',
              'password' => Hash::make('admin007'),
          ],
          [
               'name'=>'User',
               'email'=>'user@itsolutionstuff.com',
                'is_admin'=>'0',
               'password'=> Hash::make('12345678'),
            ],
        ];

        foreach($user as $key => $value) {
            User::create($value);
        }
    }
}