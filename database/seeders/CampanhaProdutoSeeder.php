<?php

namespace Database\Seeders;

use App\Models\CampanhaProduto;
use Illuminate\Database\Seeder;

class CampanhaProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campanhasProdutos = CampanhaProduto::factory()->count(20)->make()->toArray();

        foreach ($campanhasProdutos as $campanhaProduto) {
            CampanhaProduto::create($campanhaProduto);
        }
    }
}
