<?php

namespace Database\Seeders;

use App\Models\Grupo;
use Illuminate\Database\Seeder;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grupos = Grupo::factory()->count(20)->make()->toArray();

        foreach ($grupos as $grupo) {
            Grupo::create($grupo);
        }
    }
}
