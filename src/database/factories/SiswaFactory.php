<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // make factory for Siswa
            'nisn' => $this->faker->unique()->randomNumber(9),
            'id_user' => $this->faker->unique()->randomNumber(9),
            'nama' => $this->faker->name(),
            'alamat' => $this->faker->address(),
            'tanggal_lahir' => $this->faker->date(),
            'wali_murid' => $this->faker->name(),
            'kelas' => $this->faker->randomElement(['X', 'XI', 'XII']),
            'keterampilan' => $this->faker->randomElement(['RPL', 'TKJ', 'MM']),
            'golongan_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
        ];
    }
}
