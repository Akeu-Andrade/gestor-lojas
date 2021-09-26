<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class VariacaoProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variacao_produtos')->insert([
            'nome' => 'Tamanho',
            'produto_id' => 1,
            'qtd_opcao' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
