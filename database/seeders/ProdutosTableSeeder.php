<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('produtos')->insert([
            'nome' => 'Acai',
            'descricao' => 'gostoso',
            'valor_uni' => 10,
            'quantidade' => 20,
            'categoria_id' => 1,
            'status_produto' => 1,
            'valor_entrega' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Acai',
            'descricao' => 'gostoso',
            'valor_uni' => 10,
            'quantidade' => 20,
            'categoria_id' => 1,
            'status_produto' => 1,
            'valor_entrega' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Camisa',
            'descricao' => 'tste ffdfsdf fsfsdfsdg fsdfs',
            'valor_uni' => 10,
            'quantidade' => 20,
            'categoria_id' => 1,
            'status_produto' => 1,
            'valor_entrega' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Shorte',
            'descricao' => 'f fhgfg fgfdgfd gfd',
            'valor_uni' => 10,
            'quantidade' => 20,
            'categoria_id' => 1,
            'status_produto' => 1,
            'valor_entrega' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Saia',
            'descricao' => 'gosffdf sdfsdfsd fsd toso',
            'valor_uni' => 10,
            'quantidade' => 20,
            'categoria_id' => 1,
            'status_produto' => 1,
            'valor_entrega' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Acaiff',
            'descricao' => ' dsfsdfsd sdfsdf ',
            'valor_uni' => 10,
            'quantidade' => 20,
            'categoria_id' => 1,
            'status_produto' => 1,
            'valor_entrega' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('produtos')->insert([
            'nome' => 'Teste',
            'descricao' => 'sd ffdrg fdfd ggfdggfgfghfgbdger',
            'valor_uni' => 10,
            'quantidade' => 20,
            'categoria_id' => 1,
            'status_produto' => 1,
            'valor_entrega' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
