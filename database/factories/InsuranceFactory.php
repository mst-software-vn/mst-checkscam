<?php

namespace Database\Factories;

use App\Models\Insurance;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Insurance>
 */
class InsuranceFactory extends Factory
{
    protected $model = Insurance::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Random participant date within the last 2 years
        $insuranceDate = $this->faker->dateTimeBetween('-2 years', 'now');

        // Expiration is exactly 1 year after joining, but we want some to be expired or expiring soon for testing
        // Logic: 70% chance of being 1 year from now, 15% chance of being in the past, 15% chance of being very soon
        $rand = $this->faker->numberBetween(1, 100);
        if ($rand <= 70) {
            $expiredAt = (clone $insuranceDate)->modify('+1 year');
            // If that's still in the past, let's make it future for "Active" ones
            if ($expiredAt < new \DateTime) {
                $expiredAt = $this->faker->dateTimeBetween('now', '+1 year');
            }
        } elseif ($rand <= 85) {
            // Expired
            $expiredAt = $this->faker->dateTimeBetween('-6 months', '-1 day');
        } else {
            // Expiring soon (within 7 days)
            $expiredAt = $this->faker->dateTimeBetween('now', '+6 days');
        }

        $vietnameseNames = [
            'Nguyễn Văn Hùng', 'Trần Thị Mai', 'Lê Hoàng Anh', 'Phạm Minh Đức', 'Vũ Thị Hồng',
            'Đặng Thái Sơn', 'Hoàng Kim Liên', 'Bùi Xuân Trường', 'Đỗ Mạnh Cường', 'Lý Hải Đăng',
            'Ngô Bảo Châu', 'Tạ Quang Bửu', 'Võ Nguyên Giáp', 'Phan Bội Châu', 'Nguyễn Thái Học',
            'Hồ Xuân Hương', 'Chu Văn An', 'Nguyễn Trãi', 'Lê Lợi', 'Lý Thái Tổ',
            'Phạm Văn Đồng', 'Trương Tấn Sang', 'Nguyễn Tấn Dũng', 'Trần Đại Quang', 'Nguyễn Phú Trọng',
        ];

        $fullName = $this->faker->randomElement($vietnameseNames);

        $avatarUrls = [
            'https://i.pravatar.cc/300?u=1',
            'https://i.pravatar.cc/300?u=2',
            'https://i.pravatar.cc/300?u=3',
            'https://i.pravatar.cc/300?u=4',
            'https://i.pravatar.cc/300?u=5',
            'https://i.pravatar.cc/300?u=6',
            'https://i.pravatar.cc/300?u=7',
            'https://i.pravatar.cc/300?u=8',
            'https://i.pravatar.cc/300?u=9',
            'https://i.pravatar.cc/300?u=10',
            'https://i.pravatar.cc/300?u=11',
            'https://i.pravatar.cc/300?u=12',
            'https://i.pravatar.cc/300?u=13',
            'https://i.pravatar.cc/300?u=14',
            'https://i.pravatar.cc/300?u=15',
            'https://i.pravatar.cc/300?u=16',
            'https://i.pravatar.cc/300?u=17',
            'https://i.pravatar.cc/300?u=18',
            'https://i.pravatar.cc/300?u=19',
            'https://i.pravatar.cc/300?u=20',
        ];

        $banks = ['Vietcombank', 'Techcombank', 'MB Bank', 'Agribank', 'BIDV', 'ACB', 'VPBank', 'TPBank', 'Sacombank', 'VIB'];

        $servicesList = [
            'Mua bán tài khoản game (Liên Quân, Free Fire, PUBG)',
            'Nạp tiền Alipay, WeChat, QQ giá tốt',
            'Trung gian giao dịch an toàn 24/7',
            'Cho thuê website, hosting, VPS cấu hình cao',
            'Dịch vụ tăng tương tác Facebook, TikTok, Instagram',
            'Cày thuê rank cao thủ, thách đấu',
            'Bán mã thẻ Garena, Zing, Vcoin chiết khấu cao',
            'Thiết kế landing page chuẩn SEO',
            'Hỗ trợ lấy lại tài khoản bị hack',
        ];

        return [
            'full_name' => $fullName,
            'avatar' => $this->faker->randomElement($avatarUrls),
            'amount' => $this->faker->randomElement([5000000, 10000000, 15000000, 20000000, 50000000, 100000000, 200000000, 500000000]),
            'insurance_date' => $insuranceDate,
            'expired_at' => $expiredAt,
            'contact_info' => [
                [
                    'platform' => 'Facebook',
                    'link' => 'https://facebook.com/'.Str::slug($fullName),
                ],
                [
                    'platform' => 'Zalo',
                    'link' => 'https://zalo.me/0'.$this->faker->numberBetween(900000000, 999999999),
                ],
                [
                    'platform' => 'Telegram',
                    'link' => 'https://t.me/'.Str::slug($fullName, '_'),
                ],
            ],
            'payment_accounts' => [
                [
                    'bank' => $this->faker->randomElement($banks),
                    'number' => $this->faker->numerify('##########'),
                    'name' => mb_convert_case($fullName, MB_CASE_UPPER, 'UTF-8'),
                ],
                [
                    'bank' => $this->faker->randomElement($banks),
                    'number' => $this->faker->numerify('##########'),
                    'name' => mb_convert_case($fullName, MB_CASE_UPPER, 'UTF-8'),
                ],
            ],
            'services' => collect($this->faker->randomElements($servicesList, $this->faker->numberBetween(2, 5)))
                ->map(fn ($item) => ['title' => $item])
                ->toArray(),
            'status' => $this->faker->randomElement([1, 1, 1, 0]), // 75% active
            'slug' => Str::slug($fullName).'-'.$this->faker->unique()->numberBetween(1000, 9999),
            'created_at' => $insuranceDate,
            'updated_at' => now(),
        ];
    }
}
