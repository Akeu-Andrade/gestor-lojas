<?php
namespace Database\Seeders;

use App\Business\Seguranca\Models\Perfil;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PerfilsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfils')->insert([
            'nome' => 'Admin',
            "actions" => json_encode([
                "perfilcontroller@create",
                "perfilcontroller@store",
                "perfilcontroller@edit",
                "perfilcontroller@update",
                "perfilcontroller@destroy",
                "perfilcontroller@index",
                "perfilcontroller@show",
                ]),
        ]);

//        factory(Perfil::class, 50)->create();
    }
}
