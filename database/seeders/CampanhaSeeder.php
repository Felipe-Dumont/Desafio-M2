<?php

namespace Database\Seeders;

use App\Models\Campanha;
use Illuminate\Database\Seeder;

class CampanhaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campanhas = Campanha::factory()->count(20)->make()->toArray();

        foreach ($campanhas as $campanha) {
            Campanha::create($campanha);
        }
    }
}
