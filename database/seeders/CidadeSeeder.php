<?php

namespace Database\Seeders;

use App\Models\Cidade;
use Illuminate\Database\Seeder;

class CidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cidades = Cidade::factory()->count(20)->make()->toArray();

        foreach ($cidades as $cidade) {
            Cidade::create($cidade);
        }
    }
}
