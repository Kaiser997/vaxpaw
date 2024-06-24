<?php

namespace Database\Factories;

use App\Models\Vaccune;
use Illuminate\Database\Eloquent\Factories\Factory;

class VaccuneFactory extends Factory
{
    protected $model = Vaccune::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'descripcion' => $this->faker->word, // Genera una palabra aleatoria
            'dose' => $this->faker->numberBetween(1, 15), // Genera un número entre 1 y 15
            'date' => $this->faker->dateTimeBetween('-15 years', 'now')->format('d-m-Y'), // Fecha en formato DD-MM-YYYY
            
        ];
        
    }
}
