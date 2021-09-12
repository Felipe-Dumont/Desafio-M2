<?php

namespace Database\Seeders;

use App\Models\Desconto;
use Illuminate\Database\Seeder;

class DescontoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $descontos = Desconto::factory()->count(20)->make()->toArray();

        foreach ($descontos as $desconto) {
            Desconto::create($desconto);
        }
    }
}
