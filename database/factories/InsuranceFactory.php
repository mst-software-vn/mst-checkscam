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
            'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1527980965255-d3b416303d12?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1508214751196-bcfd4ca60f91?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1531123897727-8f129e1688ce?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1463453091185-61582044d556?w=400&h=400&fit=crop',
            'https://images.unsplash.com/photo-1502685104226-ee32379fefbe?w=400&h=400&fit=crop',
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
            'amount' => $this->faker->randomElement([5000000, 10000000, 20000000, 50000000, 100000000, 200000000]),
            'insurance_date' => $insuranceDate,
            'expired_at' => $expiredAt,
            'contact_info' => [
                'zalo' => '0'.$this->faker->numberBetween(900000000, 999999999),
                'facebook' => 'https://facebook.com/'.Str::slug($fullName),
                'telegram' => '@'.Str::slug($fullName, '_'),
                'phone' => '0'.$this->faker->numberBetween(300000000, 899999999),
            ],
            'payment_accounts' => [
                [
                    'bank_name' => $this->faker->randomElement($banks),
                    'account_number' => $this->faker->numerify('################'),
                    'account_holder' => mb_convert_case($fullName, MB_CASE_UPPER, 'UTF-8'),
                ],
            ],
            'services' => $this->faker->randomElements($servicesList, $this->faker->numberBetween(2, 5)),
            'status' => $this->faker->randomElement([1, 1, 1, 0]), // 75% active
            'slug' => Str::slug($fullName).'-'.$this->faker->unique()->numberBetween(1000, 9999),
            'created_at' => $insuranceDate,
            'updated_at' => now(),
        ];
    }
}
