<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['account', 'website'];
        $status = ['pending', 'approved', 'rejected'];
        
        $targetType = $this->faker->randomElement($types);
        
        if ($targetType === 'account') {
            $targetId = $this->faker->numerify('##########'); // 10 digit account number
            $targetBank = $this->faker->randomElement(['Vietcombank', 'MBBank', 'Techcombank', 'ACB', 'BIDV']);
        } else {
            $targetId = 'fb.com/' . $this->faker->userName();
            $targetBank = null;
        }

        $reporterName = $this->faker->name();

        return [
            'type' => $targetType,
            'reporter_name' => $reporterName,
            'reporter_contact' => $this->faker->phoneNumber(),
            'target_id' => $targetId,
            'target_name' => $this->faker->name(),
            'target_bank' => $targetBank,
            'category' => $this->faker->randomElement(['Lừa đảo chuyển khoản', 'SCAM trung gian', 'Lừa đảo nạp thẻ game', 'Bán hàng giả mạo FB']),
            'description' => $this->faker->realText(200),
            'evidence_images' => ['https://techfest.vn/wp-content/uploads/2021/08/luong-canh-hinh-anh-768x402-1.jpg'],
            'status' => $this->faker->randomElement($status),
            'rejection_reason' => null,
            'view_count' => $this->faker->numberBetween(10, 5000),
            'search_count' => $this->faker->numberBetween(0, 1000),
            'slug' => Str::slug($targetId . '-' . Str::random(5)),
        ];
    }
}
