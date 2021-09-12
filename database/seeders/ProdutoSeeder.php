<?php

namespace Database\Seeders;

use App\Models\Produto;
use Illuminate\Database\Seeder;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = Produto::factory()->count(20)->make()->toArray();

        foreach ($produtos as $produto) {
            Produto::create($produto);
        }
    }
}
