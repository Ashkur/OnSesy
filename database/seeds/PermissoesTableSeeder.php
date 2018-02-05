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
            'descricao' => 'Adicionar um Treinamento',
            'valor' => json_encode([
                'adicionar-treinamento' => true,
            ]),
        ]);

        DB::table('permissoes')->insert([            
            'descricao' => 'Atualização um Treinamento',
            'valor' => json_encode([
                'atualiza-treinamento' => true,
            ]),
        ]);

        DB::table('permissoes')->insert([
            'descricao' => 'Remoção de um Treinamento',
            'valor' => json_encode([
                'remove-treinamento' => true,
            ]),
        ]);

    }
}
