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
        DB::table('users')->insert([
            'name' => 'administrador',
            'cpf' => '111.111.111.-11',
            'email' => 'administrador@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'Auxiliar',
            'cpf' => '222.222.222.-22',
            'email' => 'auxiliar@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'SubAuxiliar',
            'cpf' => '333.333.333.-33',
            'email' => 'subauxiliar@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
