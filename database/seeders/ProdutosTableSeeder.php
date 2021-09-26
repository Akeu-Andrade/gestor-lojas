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
            'quantidade_estoque' => 200,
            'categoria_produto_id' => 1,
            'status_produto' => 1,
            'valor_entrega' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
