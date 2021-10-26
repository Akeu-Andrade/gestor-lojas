<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedidos')->insert([
            'user_comprador_id' => 1,
            'status' => 1,
            'forma_pagamento' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
