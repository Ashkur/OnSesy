<?php

use Illuminate\Database\Seeder;

class PermissoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissoes')->insert([
            'nome' => 'Criar Edital',
            'descricao' => 'criar-edital'
        ]);

        DB::table('permissoes')->insert([
            'nome' => 'Editar Edital',
            'descricao' => 'editar-edital'
        ]);

        DB::table('permissoes')->insert([
            'nome' => 'Remover Edital',
            'descricao' => 'remover-edital'
        ]);
    }
}
