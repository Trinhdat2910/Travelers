<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // DB::Table('users')->truncate();
       //  App\User::create([
       //  	'name'=>'TrinhDat',
       //  	'email'=>'TrinhDat98@gmail.com',
       //  	'password'=>bcrypt(12345678),
       //  ]);

        DB::Table('khachhang')->insert([
            'Username'=>'TrinhDat98',
            'TenKH'=>'Trịnh Đạt',
            'Email'=>'TrinhDat98@gmail.com',
            'password'=>bcrypt(12345678),

        ]);
    }
}
