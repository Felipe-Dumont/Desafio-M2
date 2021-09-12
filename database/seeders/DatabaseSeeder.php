<?php

namespace Database\Seeders;

use Database\Factories\ProdutoFactory;
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
        $this->call(GrupoSeeder::class);
        $this->call(CidadeSeeder::class);
        $this->call(CampanhaSeeder::class);
        $this->call(DescontoSeeder::class);
        $this->call(ProdutoFactory::class);
        $this->call(GrupoCampanhaSeeder::class);
        $this->call(CampanhaProdutoSeeder::class);
    }
}
