<?php

namespace Database\Factories;

use App\Models\GrupoCampanha;
use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoCampanhaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GrupoCampanha::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grupo' => rand(1, 20),
            'campanha' => rand(1, 20),
            'ativo' => 'S'
        ];
    }
}
