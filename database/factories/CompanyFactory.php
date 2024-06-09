<?php
namespace Database\Factories;
use \Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('ar_SA');
        return [
            'name' => json_encode(['ar' => $faker->company, 'en' => $this->faker->company], JSON_UNESCAPED_UNICODE),
            'image' => 'logo.png',
        ];
    }
}
