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
        //permissoes
        DB::table('permissoes')->insert([            
            'descricao' => 'Visualizar Permissões',
            'valor' => json_encode([
                'visualizar-permissao' => true,
            ]),
        ]);

        DB::table('permissoes')->insert([            
            'descricao' => 'Adicionar uma Permissão',
            'valor' => json_encode([
                'adicionar-permissao' => true,
            ]),
        ]);

        DB::table('permissoes')->insert([
            'descricao' => 'Remover uma Permissão',
            'valor' => json_encode([
                'remove-treinamento' => true,
            ]),
        ]);

        //papel
        DB::table('permissoes')->insert([
            'descricao' => 'Visulizar Papeis',
            'valor' => json_encode([
                'visualizar-papeis' => true,
            ]),
        ]);

        DB::table('permissoes')->insert([
            'descricao' => 'Adicionar Papel',
            'valor' => json_encode([
                'adicionar-papel' => true,
            ]),
        ]);

        DB::table('permissoes')->insert([
            'descricao' => 'Editar um Papel',
            'valor' => json_encode([
                'editar-papel' => true,
            ]),
        ]);

        DB::table('permissoes')->insert([
            'descricao' => 'Remoção de um Papel',
            'valor' => json_encode([
                'remove-papel' => true,
            ]),
        ]);

    }
}
