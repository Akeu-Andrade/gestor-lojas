<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CompraUsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('compra_usuarios')->insert([
            'produto_id' => 1,
            'user_comprador_id' => 1,
            'quantidade' => 2,
            'status_compra_usuario' => 1,
            'forma_pagamento' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
