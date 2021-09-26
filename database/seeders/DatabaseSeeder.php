<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([PerfilsTableSeeder::class]);
        $this->call([UsersTableSeeder::class]);
        $this->call([CategoriaProdutosTableSeeder::class]);
        $this->call([LojaConfigsTableSeeder::class]);
        $this->call([ProdutosTableSeeder::class]);
        $this->call([VariacaoProdutosTableSeeder::class]);
        $this->call([ItemVariacaoProdutosTableSeeder::class]);
        $this->call([CompraUsuariosTableSeeder::class]);

    }
}
