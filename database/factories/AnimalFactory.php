<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'race' => $this->faker->word, // Genera una palabra aleatoria
            'age' => $this->faker->numberBetween(1, 15), // Genera un número entre 1 y 15
            'sex' => $this->faker->randomElement(['masculino', 'femenino']), // Elige aleatoriamente entre 'male' y 'female'
            
        ];
        
    }
}
