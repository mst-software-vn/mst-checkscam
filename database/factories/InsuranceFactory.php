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
            'https://i.pravatar.cc/300?u=1', 'https://i.pravatar.cc/300?u=2', 'https://i.pravatar.cc/300?u=3', 'https://i.pravatar.cc/300?u=4', 'https://i.pravatar.cc/300?u=5',
            'https://i.pravatar.cc/300?u=6', 'https://i.pravatar.cc/300?u=7', 'https://i.pravatar.cc/300?u=8', 'https://i.pravatar.cc/300?u=9', 'https://i.pravatar.cc/300?u=10',
            'https://i.pravatar.cc/300?u=11', 'https://i.pravatar.cc/300?u=12', 'https://i.pravatar.cc/300?u=13', 'https://i.pravatar.cc/300?u=14', 'https://i.pravatar.cc/300?u=15',
            'https://i.pravatar.cc/300?u=16', 'https://i.pravatar.cc/300?u=17', 'https://i.pravatar.cc/300?u=18', 'https://i.pravatar.cc/300?u=19', 'https://i.pravatar.cc/300?u=20',
            'https://i.pravatar.cc/300?u=21', 'https://i.pravatar.cc/300?u=22', 'https://i.pravatar.cc/300?u=23', 'https://i.pravatar.cc/300?u=24', 'https://i.pravatar.cc/300?u=25',
            'https://i.pravatar.cc/300?u=26', 'https://i.pravatar.cc/300?u=27', 'https://i.pravatar.cc/300?u=28', 'https://i.pravatar.cc/300?u=29', 'https://i.pravatar.cc/300?u=30',
            'https://i.pravatar.cc/300?u=31', 'https://i.pravatar.cc/300?u=32', 'https://i.pravatar.cc/300?u=33', 'https://i.pravatar.cc/300?u=34', 'https://i.pravatar.cc/300?u=35',
            'https://i.pravatar.cc/300?u=36', 'https://i.pravatar.cc/300?u=37', 'https://i.pravatar.cc/300?u=38', 'https://i.pravatar.cc/300?u=39', 'https://i.pravatar.cc/300?u=40',
            'https://i.pravatar.cc/300?u=41', 'https://i.pravatar.cc/300?u=42', 'https://i.pravatar.cc/300?u=43', 'https://i.pravatar.cc/300?u=44', 'https://i.pravatar.cc/300?u=45',
            'https://i.pravatar.cc/300?u=46', 'https://i.pravatar.cc/300?u=47', 'https://i.pravatar.cc/300?u=48', 'https://i.pravatar.cc/300?u=49', 'https://i.pravatar.cc/300?u=50',
            'https://i.pravatar.cc/300?u=51', 'https://i.pravatar.cc/300?u=52', 'https://i.pravatar.cc/300?u=53', 'https://i.pravatar.cc/300?u=54', 'https://i.pravatar.cc/300?u=55',
            'https://i.pravatar.cc/300?u=56', 'https://i.pravatar.cc/300?u=57', 'https://i.pravatar.cc/300?u=58', 'https://i.pravatar.cc/300?u=59', 'https://i.pravatar.cc/300?u=60',
            'https://i.pravatar.cc/300?u=61', 'https://i.pravatar.cc/300?u=62', 'https://i.pravatar.cc/300?u=63', 'https://i.pravatar.cc/300?u=64', 'https://i.pravatar.cc/300?u=65',
            'https://i.pravatar.cc/300?u=66', 'https://i.pravatar.cc/300?u=67', 'https://i.pravatar.cc/300?u=68', 'https://i.pravatar.cc/300?u=69', 'https://i.pravatar.cc/300?u=70',
            'https://i.pravatar.cc/300?u=71', 'https://i.pravatar.cc/300?u=72', 'https://i.pravatar.cc/300?u=73', 'https://i.pravatar.cc/300?u=74', 'https://i.pravatar.cc/300?u=75',
            'https://i.pravatar.cc/300?u=76', 'https://i.pravatar.cc/300?u=77', 'https://i.pravatar.cc/300?u=78', 'https://i.pravatar.cc/300?u=79', 'https://i.pravatar.cc/300?u=80',
            'https://i.pravatar.cc/300?u=81', 'https://i.pravatar.cc/300?u=82', 'https://i.pravatar.cc/300?u=83', 'https://i.pravatar.cc/300?u=84', 'https://i.pravatar.cc/300?u=85',
            'https://i.pravatar.cc/300?u=86', 'https://i.pravatar.cc/300?u=87', 'https://i.pravatar.cc/300?u=88', 'https://i.pravatar.cc/300?u=89', 'https://i.pravatar.cc/300?u=90',
            'https://i.pravatar.cc/300?u=91', 'https://i.pravatar.cc/300?u=92', 'https://i.pravatar.cc/300?u=93', 'https://i.pravatar.cc/300?u=94', 'https://i.pravatar.cc/300?u=95',
            'https://i.pravatar.cc/300?u=96', 'https://i.pravatar.cc/300?u=97', 'https://i.pravatar.cc/300?u=98', 'https://i.pravatar.cc/300?u=99', 'https://i.pravatar.cc/300?u=100',
            'https://i.pravatar.cc/300?u=101', 'https://i.pravatar.cc/300?u=102', 'https://i.pravatar.cc/300?u=103', 'https://i.pravatar.cc/300?u=104', 'https://i.pravatar.cc/300?u=105',
            'https://i.pravatar.cc/300?u=106', 'https://i.pravatar.cc/300?u=107', 'https://i.pravatar.cc/300?u=108', 'https://i.pravatar.cc/300?u=109', 'https://i.pravatar.cc/300?u=110',
            'https://i.pravatar.cc/300?u=111', 'https://i.pravatar.cc/300?u=112', 'https://i.pravatar.cc/300?u=113', 'https://i.pravatar.cc/300?u=114', 'https://i.pravatar.cc/300?u=115',
            'https://i.pravatar.cc/300?u=116', 'https://i.pravatar.cc/300?u=117', 'https://i.pravatar.cc/300?u=118', 'https://i.pravatar.cc/300?u=119', 'https://i.pravatar.cc/300?u=120',
            'https://i.pravatar.cc/300?u=121', 'https://i.pravatar.cc/300?u=122', 'https://i.pravatar.cc/300?u=123', 'https://i.pravatar.cc/300?u=124', 'https://i.pravatar.cc/300?u=125',
            'https://i.pravatar.cc/300?u=126', 'https://i.pravatar.cc/300?u=127', 'https://i.pravatar.cc/300?u=128', 'https://i.pravatar.cc/300?u=129', 'https://i.pravatar.cc/300?u=130',
            'https://i.pravatar.cc/300?u=131', 'https://i.pravatar.cc/300?u=132', 'https://i.pravatar.cc/300?u=133', 'https://i.pravatar.cc/300?u=134', 'https://i.pravatar.cc/300?u=135',
            'https://i.pravatar.cc/300?u=136', 'https://i.pravatar.cc/300?u=137', 'https://i.pravatar.cc/300?u=138', 'https://i.pravatar.cc/300?u=139', 'https://i.pravatar.cc/300?u=140',
            'https://i.pravatar.cc/300?u=141', 'https://i.pravatar.cc/300?u=142', 'https://i.pravatar.cc/300?u=143', 'https://i.pravatar.cc/300?u=144', 'https://i.pravatar.cc/300?u=145',
            'https://i.pravatar.cc/300?u=146', 'https://i.pravatar.cc/300?u=147', 'https://i.pravatar.cc/300?u=148', 'https://i.pravatar.cc/300?u=149', 'https://i.pravatar.cc/300?u=150',
            'https://i.pravatar.cc/300?u=151', 'https://i.pravatar.cc/300?u=152', 'https://i.pravatar.cc/300?u=153', 'https://i.pravatar.cc/300?u=154', 'https://i.pravatar.cc/300?u=155',
            'https://i.pravatar.cc/300?u=156', 'https://i.pravatar.cc/300?u=157', 'https://i.pravatar.cc/300?u=158', 'https://i.pravatar.cc/300?u=159', 'https://i.pravatar.cc/300?u=160',
            'https://i.pravatar.cc/300?u=161', 'https://i.pravatar.cc/300?u=162', 'https://i.pravatar.cc/300?u=163', 'https://i.pravatar.cc/300?u=164', 'https://i.pravatar.cc/300?u=165',
            'https://i.pravatar.cc/300?u=166', 'https://i.pravatar.cc/300?u=167', 'https://i.pravatar.cc/300?u=168', 'https://i.pravatar.cc/300?u=169', 'https://i.pravatar.cc/300?u=170',
            'https://i.pravatar.cc/300?u=171', 'https://i.pravatar.cc/300?u=172', 'https://i.pravatar.cc/300?u=173', 'https://i.pravatar.cc/300?u=174', 'https://i.pravatar.cc/300?u=175',
            'https://i.pravatar.cc/300?u=176', 'https://i.pravatar.cc/300?u=177', 'https://i.pravatar.cc/300?u=178', 'https://i.pravatar.cc/300?u=179', 'https://i.pravatar.cc/300?u=180',
            'https://i.pravatar.cc/300?u=181', 'https://i.pravatar.cc/300?u=182', 'https://i.pravatar.cc/300?u=183', 'https://i.pravatar.cc/300?u=184', 'https://i.pravatar.cc/300?u=185',
            'https://i.pravatar.cc/300?u=186', 'https://i.pravatar.cc/300?u=187', 'https://i.pravatar.cc/300?u=188', 'https://i.pravatar.cc/300?u=189', 'https://i.pravatar.cc/300?u=190',
            'https://i.pravatar.cc/300?u=191', 'https://i.pravatar.cc/300?u=192', 'https://i.pravatar.cc/300?u=193', 'https://i.pravatar.cc/300?u=194', 'https://i.pravatar.cc/300?u=195',
            'https://i.pravatar.cc/300?u=196', 'https://i.pravatar.cc/300?u=197', 'https://i.pravatar.cc/300?u=198', 'https://i.pravatar.cc/300?u=199', 'https://i.pravatar.cc/300?u=200',
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
