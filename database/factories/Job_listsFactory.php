<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class Job_listsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence(3,true),
            'nama_perusahaan'=>fake()->word(2,true),
            'web_perusahaan'=>fake()->word(2,true),
            'lokasi'=>fake()->word(1,true),
            'gaji'=>fake()->word(1,true),
            'deskription'=>fake()->paragraph(2,true),
            'tag'=>fake()->word(1,true)
        ];
    }
}
