<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tasks;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaskFactory extends Factory
{
    protected $model = Tasks::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->text,
        ];
    }
}
