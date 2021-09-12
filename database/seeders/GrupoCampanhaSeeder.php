<?php

namespace Database\Seeders;

use App\Models\GrupoCampanha;
use Illuminate\Database\Seeder;

class GrupoCampanhaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gruposCampanhas = GrupoCampanha::factory()->count(20)->make()->toArray();

        foreach ($gruposCampanhas as $grupocampanha) {
            GrupoCampanha::create($grupocampanha);
        }
    }
}
