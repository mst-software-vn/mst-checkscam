<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    protected $model = Banner::class;

    public function definition(): array
    {
        $positions = ['home_top', 'home_sidebar', 'home_between', 'scammer', 'blog'];
        $position = fake()->randomElement($positions);
        $type = in_array($position, ['home_sidebar']) ? 'square' : 'horizontal';

        return [
            'title' => fake()->sentence(3),
            'image_path' => 'https://placehold.co/950x80?text=Banner+Ad',
            'redirect_url' => fake()->url(),
            'position' => $position,
            'type' => $type,
            'start_date' => null,
            'end_date' => null,
            'status' => true,
            'sort_order' => fake()->numberBetween(0, 10),
        ];
    }
}
