<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'cpf' => '222.222.222-22',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'cpf' => '333.333.333-33',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'cpf' => '444.444.444-44',
            'password' => bcrypt('secret'),
        ]);
    }
}
