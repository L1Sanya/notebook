<?php

namespace Database\Factories;

use App\Models\Notebook;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Notebook>
 */
class NotebookFactory extends Factory
{
    protected $model = Notebook::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => $this->faker->lastName,
            'name' => $this->faker->firstName,
            'surname' => $this->faker->lastName,
            'company_name' => $this->faker->company,
            'phone'        => $this->faker->unique()->phoneNumber,
            'email'        => $this->faker->unique()->safeEmail,
            'birth_date'   => $this->faker->date,
            'image_id'     => null,
        ];
    }
}
