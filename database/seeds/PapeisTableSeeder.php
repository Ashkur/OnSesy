<?php

use Illuminate\Database\Seeder;

class PapeisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('papeis')->insert([
            'nome' => 'Gerente',
            'descricao' => 'gerente do sistema'
        ]);

        DB::table('papeis')->insert([
            'nome' => 'Auxiliar',
            'descricao' => 'auxiliar do gerente do sistema'
        ]);

        DB::table('papeis')->insert([
            'nome' => 'Administrador',
            'descricao' => 'administrador geral do sistema'
        ]);
    }
}
