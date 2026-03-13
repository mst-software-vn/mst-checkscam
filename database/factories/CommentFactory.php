<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    public function definition(): array
    {
        // Pool tên Việt thực tế
        $vietnameseNames = [
            'Nguyễn Minh Tuấn',
            'Trần Thị Lan',
            'Lê Văn Hùng',
            'Phạm Thị Mai',
            'Hoàng Đức Anh',
            'Vũ Thị Hoa',
            'Đặng Văn Nam',
            'Bùi Thị Thu',
            'Ngô Quang Huy',
            'Đinh Thị Ngọc',
            'Trịnh Văn Long',
            'Phan Thị Linh',
        ];

        // Pool nội dung comment thực tế, phù hợp ngữ cảnh checkscam
        $commentContents = [
            'Tôi cũng bị thằng này lừa rồi, mất gần 3 triệu. Mọi người cẩn thận nhé!',
            'Xác nhận đây là scammer, đã báo cáo lên công an phường nhưng chưa có phản hồi.',
            'Nó còn dùng tài khoản khác là 0912xxxxxx, anh em chú ý thêm.',
            'Tôi tìm được facebook của nó rồi, đang dùng ảnh đại diện giả để lừa người.',
            'Cảm ơn web đã cập nhật kịp thời, may mà tìm được trước khi chuyển tiền.',
            'Hình thức lừa đảo y chang những gì mô tả. Chuyên nghiệp lắm, nói chuyện rất khéo.',
            'Anh em nào có thêm thông tin về thằng này thì cập nhật thêm để cộng đồng biết.',
            'Đã chia sẻ lên group cảnh báo scam, cảm ơn người đã đăng báo cáo này.',
            'Số điện thoại này thay đổi liên tục, lúc tôi bị lừa là số khác nhưng cùng ngân hàng.',
            'Mới bị hôm qua, vẫn đang liên hệ ngân hàng để freeze tài khoản.',
            'Nó còn hoạt động trên Zalo nữa, username giống tên Facebook.',
            'Tôi đã trình báo công an, đang trong quá trình điều tra.',
            'Chiêu bài y chang vụ tôi gặp 2 tháng trước, cùng một băng nhóm đấy.',
            'Cẩn thận ai nhận được link từ số này, đừng click vào!',
            'Đã block và report Facebook của nó, mọi người làm theo để sớm bị khóa tài khoản.',
        ];

        $isAnonymous = $this->faker->boolean(30);
        $ip          = $this->faker->ipv4();

        return [
            'report_id'    => Report::where('status', 'approved')->inRandomOrder()->value('id') ?? 1,
            'full_name'    => $isAnonymous ? 'Ẩn danh (' . $ip . ')' : $this->faker->randomElement($vietnameseNames),
            'content'      => $this->faker->randomElement($commentContents),
            'ip_address'   => $ip,
            'is_anonymous' => $isAnonymous,
            'created_at'   => $this->faker->dateTimeBetween('-10 days', 'now'),
            'updated_at'   => now(),
        ];
    }
}
