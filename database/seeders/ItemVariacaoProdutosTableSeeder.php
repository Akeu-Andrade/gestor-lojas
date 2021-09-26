<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ItemVariacaoProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_variacao_produtos')->insert([
            'nome' => 'M',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('item_variacao_produtos')->insert([
            'nome' => 'P',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
