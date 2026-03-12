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
        // Define a static pool of realistic "Scammers" so that multiple reports group to the same people.
        $scammerPool = [
            [
                'type' => 'account',
                'target_id' => '059983434',
                'target_name' => 'Nguyễn Văn Đạt',
                'target_bank' => 'Vietcombank',
            ],
            [
                'type' => 'account',
                'target_id' => '1903456789',
                'target_name' => 'Trần Thị Thuỷ',
                'target_bank' => 'Techcombank',
            ],
            [
                'type' => 'account',
                'target_id' => '5723103006',
                'target_name' => 'Lê Minh Khang',
                'target_bank' => 'MBBank',
            ],
            [
                'type' => 'account',
                'target_id' => '0938111222',
                'target_name' => 'Phạm Tuấn Ngọc',
                'target_bank' => null,
            ],
            [
                'type' => 'account',
                'target_id' => '0909456789',
                'target_name' => 'Công Ty Lừa Đảo TNHH',
                'target_bank' => null,
            ],
            [
                'type' => 'website',
                'target_id' => 'facebook.com/le.hoang.anh2000',
                'target_name' => 'Lê Hoàng Anh',
                'target_bank' => null,
            ],
        ];

        $status = ['pending', 'approved', 'rejected'];

        // Randomly pick ONE scammer from the pool. This ensures duplication across many generated records.
        $target = $this->faker->randomElement($scammerPool);

        $reporterName = $this->faker->name();

        return [
            'type' => $target['type'],
            'reporter_name' => $reporterName,
            'reporter_contact' => $this->faker->phoneNumber(),
            'target_id' => $target['target_id'],
            'target_name' => $target['target_name'],
            'target_bank' => $target['target_bank'],
            'category' => $this->faker->randomElement(['Lừa đảo chuyển khoản', 'SCAM trung gian', 'Lừa đảo nạp thẻ game', 'Bán hàng giả mạo FB']),
            'description' => $this->faker->realText(200),
            'damage_amount' => $this->faker->randomNumber(5) * 1000,
            'evidence_images' => ['https://techfest.vn/wp-content/uploads/2021/08/luong-canh-hinh-anh-768x402-1.jpg'],
            'status' => $this->faker->randomElement($status),
            'rejection_reason' => null,
            'view_count' => $this->faker->numberBetween(10, 5000),
            'search_count' => $this->faker->numberBetween(0, 1000),
            'slug' => Str::slug($target['target_id'].'-'.Str::random(5)),
            // Spread data randomly over the last 15 days to test weekly queries.
            'created_at' => $this->faker->dateTimeBetween('-15 days', 'now'),
            'updated_at' => now(),
        ];
    }
}
