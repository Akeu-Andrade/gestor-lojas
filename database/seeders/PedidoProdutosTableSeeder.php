<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PedidoProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedido_produtos')->insert([
            'pedido_id' => 1,
            'produto_id' => 1,
            'status' => 1,
            'valor' => 20,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
