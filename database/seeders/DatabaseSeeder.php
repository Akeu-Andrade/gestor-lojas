<?php
namespace Database\Seeders;

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
        $this->call([CategoriasTableSeeder::class]);
        $this->call([LojaConfigsTableSeeder::class]);
        $this->call([ProdutosTableSeeder::class]);
        $this->call([PedidosTableSeeder::class]);
        $this->call([PedidoProdutosTableSeeder::class]);
    }
}
