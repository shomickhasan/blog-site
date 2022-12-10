<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('user_infos')->insert([
        'name'=>'Admin',
        'email'=>'admin@gmail.com',
        'password'=> Hash::make('password'),
        'status'=>1,
       ]);

    }
}
