<?php

namespace Database\Factories;

use App\Models\CampanhaProduto;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampanhaProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CampanhaProduto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'produto' => rand(1, 20),
            'campanha' => rand(1, 20),
        ];
    }
}
