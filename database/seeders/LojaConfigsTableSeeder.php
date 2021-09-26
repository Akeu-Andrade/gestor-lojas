<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class LojaConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loja_configs')->insert([
            'nome' => 'Akeu Story',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
