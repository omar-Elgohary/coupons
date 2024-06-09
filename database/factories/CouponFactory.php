<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = rand(0, 1);
        $data = [            
            'company_id' => rand(1, 10),
            'country_id' => rand(1, 4),
            'coupon' => $this->faker->bothify('??##??##??'),
            'status' => rand(0, 1),
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(50),
        ];

        if ($status == 1) {
            $data['status'] = 0;
        }
    
        return $data;
    }
}
