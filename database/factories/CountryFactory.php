<?php
namespace Database\Factories;
use \Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('ar_SA');
        $en_faker = Faker::create('en_US');
        return [
            'name' => json_encode(['ar' => $faker->country, 'en' => $en_faker->country], JSON_UNESCAPED_UNICODE),
            'iso2' => $this->faker->countryCode,
            'iso3' => $this->faker->countryISOAlpha3,
        ];
    }
}
