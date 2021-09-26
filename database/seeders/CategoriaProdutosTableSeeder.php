<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriaProdutosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categoria_produtos')->insert([
            'name' => 'Alimento',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
