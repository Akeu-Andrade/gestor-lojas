<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Admin',
            'observacao' => 'faz tudo',
            "actions" => json_encode([
                "perfilcontroller@create",
                "perfilcontroller@store",
                "perfilcontroller@edit",
                "perfilcontroller@update",
                "perfilcontroller@destroy",
                "perfilcontroller@index",
                "perfilcontroller@show",
                ]),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
