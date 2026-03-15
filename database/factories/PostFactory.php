<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $postsData = [
            [
                'title' => 'Cảnh báo chiêu trò lừa đảo qua tin nhắn iMessage và SMS',
                'description' => 'Gần đây, nhiều người dùng tại Việt Nam liên tục nhận được các tin nhắn lừa đảo qua iMessage và SMS với nội dung tuyển dụng việc làm nhẹ lương cao.',
                'content' => '<h3>Chiêu trò lừa đảo qua tin nhắn bùng phát</h3>
                <p>Trong thời gian qua, Cục An toàn thông tin (Bộ Thông tin và Truyền thông) đã liên tục nhận được phản ánh của người dân về việc nhận được các tin nhắn rác, tin nhắn lừa đảo qua iMessage trên điện thoại iPhone và các tin nhắn SMS thông thường.</p>
                <p>Nội dung các tin nhắn này thường đánh vào tâm lý muốn tìm kiếm việc làm thêm của người dân như: "Công ty chúng tôi đang tuyển nhân viên xử lý dữ liệu online, thu nhập từ 500k-1tr/ngày...", hoặc các nội dung về trúng thưởng, vay vốn ngân hàng với lãi suất cực thấp.</p>
                <h4>Cách thức hoạt động của các đối tượng</h4>
                <p>Để tăng sự tin tưởng, các đối tượng này thường đính kèm đường link dẫn đến các nhóm Zalo hoặc Telegram. Khi người dùng nhấn vào đường link và tham gia nhóm, chúng sẽ yêu cầu người dùng thực hiện các "nhiệm vụ" như like video YouTube, đánh giá sản phẩm Shopee... và trả một khoản tiền nhỏ ban đầu để mồi chài.</p>
                <p>Đến khi người dùng nạp số tiền lớn để làm "nhiệm vụ cao cấp", chúng sẽ đưa ra nhiều lý do như sai cú pháp, lỗi hệ thống để yêu cầu người dùng nạp thêm tiền mới cho rút. Cuối cùng, khi nạn nhân không còn khả năng nạp tiền, chúng sẽ xóa nhóm và biến mất.</p>
                <p><strong>Cơ quan chức năng khuyến cáo:</strong> Người dân tuyệt đối không nhấn vào các đường link lạ từ người gửi không xác định. Không cung cấp thông tin cá nhân hay mã OTP cho bất kỳ ai. Luôn kiểm chứng thông tin tuyển dụng qua các kênh chính thống.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=800&q=80',
                'hashtags' => 'canh-bao, lua-dao, tin-nhan-rac, an-ninh-mang',
            ],
            [
                'title' => '6 dấu hiệu nhận biết một trang web lừa đảo bạn cần biết',
                'description' => 'Làm sao để không bị sập bẫy các trang web giả mạo ngân hàng hoặc sàn thương mại điện tử? Hãy xem ngay 6 dấu hiệu nhận biết dưới đây.',
                'content' => '<h3>An toàn khi truy cập Internet: Làm sao để nhận biết website giả mạo?</h3>
                <p>Với sự phát triển của công nghệ, các website giả mạo ngày càng được thiết kế tinh vi, giống hệt trang thật khiến người dùng rất khó phân biệt. Tuy nhiên, nếu chú ý kỹ, bạn vẫn có thể nhận ra qua 6 dấu hiệu sau:</p>
                <ol>
                    <li><strong>Tên miền (Domain) sai lệch:</strong> Đây là dấu hiệu dễ nhận biết nhất. Các trang giả mạo thường dùng tên miền gần giống trang thật như vietcombank-home.vn thay vì vietcombank.com.vn, hoặc sh0pee.vn thay vì shopee.vn.</li>
                    <li><strong>Không có chứng chỉ SSL (HTTPS):</strong> Các trang web uy tín luôn bắt đầu bằng https:// và có biểu tượng ổ khóa xanh trên thanh địa chỉ. Nếu thấy trang yêu cầu nhập thông tin nhạy cảm mà chỉ có http://, hãy rời đi ngay lập tức.</li>
                    <li><strong>Yêu cầu cung cấp thông tin quá mức:</strong> Một trang web mua sắm thông thường sẽ không bao giờ yêu cầu bạn nhập mật khẩu email hay mã OTP ngân hàng.</li>
                    <li><strong>Nội dung sơ sài, sai lỗi chính tả:</strong> Các website lừa đảo thường được làm vội vàng nên hay mắc lỗi chính tả, phông chữ không đồng nhất, hình ảnh mờ nhạt.</li>
                    <li><strong>Ưu đãi "quá hớp":</strong> Nếu một trang web chào bán iPhone mới nhất với giá chỉ vài triệu đồng, 99% đó là lừa đảo.</li>
                    <li><strong>Các đường link điều hướng bị lỗi:</strong> Khi bạn click vào các mục như "Giới thiệu", "Liên hệ" trên trang giả mạo, thường sẽ không dẫn đi đâu hoặc quay lại trang chủ.</li>
                </ol>
                <p>Hãy luôn luôn cẩn trọng trước khi nhập bất kỳ thông tin quan trọng nào lên mạng. Kiểm tra thật kỹ thanh địa chỉ web là thói quen tốt giúp bạn bảo vệ tài sản của mình.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=800&q=80',
                'hashtags' => 'security, website, phishing, tips',
            ],
            [
                'title' => 'Hướng dẫn bảo vệ tài khoản ngân hàng trong mùa cao điểm',
                'description' => 'Các vụ mất tiền trong tài khoản ngân hàng liên tục diễn ra do người dân bị lừa cài ứng dụng chứa mã độc. Xem ngay hướng dẫn bảo mật từ chuyên gia.',
                'content' => '<h3>Bảo vệ "ví tiền" online của bạn trước các loại mã độc</h3>
                <p>Hiện nay, thay vì lừa lấy OTP, tội phạm mạng đã chuyển sang hình thức tinh vi hơn: lừa người dân cài đặt các ứng dụng giả mạo ứng dụng Chính phủ, Thuế, Bảo hiểm xã hội để chiếm quyền điều khiển điện thoại.</p>
                <p>Khi đã cài đặt, ứng dụng này sẽ bí mật đọc tin nhắn OTP, theo dõi các thao tác cá nhân và tự động thực hiện lệnh chuyển tiền mà người dùng không hề hay biết.</p>
                <h4>Quy tắc vàng để an toàn</h4>
                <ul>
                    <li><strong>Chỉ cài đặt ứng dụng từ cửa hàng chính thống:</strong> Apple App Store và Google Play Store. Tuyệt đối không cài các file .apk từ link lạ.</li>
                    <li><strong>Không bao giờ chia sẻ OTP:</strong> Dù người gọi có tự xưng là công an, nhân viên ngân hàng hay cán bộ thuế.</li>
                    <li><strong>Kích hoạt sinh trắc học:</strong> Hãy sử dụng FaceID hoặc vân tay để xác thực giao dịch thay vì chỉ dùng mã PIN.</li>
                    <li><strong>Hạn chế hạn mức chuyển tiền:</strong> Chỉ để hạn mức đủ dùng trong ngày trên ứng dụng ngân hàng để giảm thiểu rủi ro nếu chẳng may bị hack.</li>
                </ul>
                <p>Nếu nghi ngờ điện thoại bị nhiễm mã độc, hãy thực hiện khôi phục cài đặt gốc ngay lập tức để xóa sạch các phần mềm gián điệp và liên hệ ngân hàng để khóa tài khoản tạm thời.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=800&q=80',
                'hashtags' => 'ngan-hang, bao-mat, app-gia-mao, otp',
            ],
            [
                'title' => 'Lừa đảo mạo danh admin checkscam để chiếm đoạt tài sản',
                'description' => 'Nhiều kẻ xấu đã lập các tài khoản Facebook giả mạo admin của hệ thống CheckScam để lừa phí "kiểm tra thông tin" của người dùng.',
                'content' => '<h3>Cảnh báo mạo danh đội ngũ quản trị CheckScam</h3>
                <p>Hệ thống CheckScam xin gửi thông báo quan trọng đến toàn thể người dùng về tình trạng mạo danh cán bộ, quản trị viên của chúng tôi để trục lợi cá nhân.</p>
                <p><strong>Thủ đoạn của chúng:</strong> Các đối tượng sẽ sử dụng tên, hình ảnh và logo của CheckScam để tạo các trang fanpage hoặc tài khoản cá nhân. Khi người dùng nhắn tin nhờ kiểm tra thông tin một tài khoản lừa đảo khác, chúng sẽ yêu cầu đóng phí "tra cứu chuyên sâu" hoặc phí "mở hồ sơ den" với giá từ vài trăm nghìn đến hàng triệu đồng.</p>
                <p>Chúng tôi xin khẳng định <strong>CheckScam là hệ thống tra cứu MIỄN PHÍ</strong> dành cho cộng đồng. Chúng tôi không bao giờ chủ động nhắn tin yêu cầu người dùng chuyển tiền để kiểm tra thông tin hay giải quyết khiếu nại.</p>
                <h4>Cách xử lý khi gặp đối tượng mạo danh</h4>
                <p>Người dân nên thực hiện các bước sau:</p>
                <ol>
                    <li>Chụp ảnh màn hình cuộc hội thoại và trang cá nhân của đối tượng.</li>
                    <li>Gửi phản ánh ngay cho chúng tôi qua kênh liên hệ chính thức trên website.</li>
                    <li>Báo cáo (Report) tài khoản giả mạo đó cho Facebook/Telegram.</li>
                </ol>
                <p>Hãy là người dùng thông thái. Hãy cùng nhau xây dựng một cộng đồng CheckScam minh bạch và an toàn.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1593113598332-cd288d649433?w=800&q=80',
                'hashtags' => 'checkscam, canh-bao, mạo-danh, bao-ve-nguoi-dung',
            ],
            [
                'title' => 'Dịch vụ trung gian giao dịch - Giải pháp an toàn khi mua bán online',
                'description' => 'Bạn lo lắng khi giao dịch với người lạ trên mạng? Tìm hiểu ngay về dịch vụ trung gian và lý do tại sao nó lại cần thiết.',
                'content' => '<h3>Tại sao nên sử dụng trung gian khi giao dịch online?</h3>
                <p>Mua bán tài khoản game, vật phẩm ảo hay hàng hóa qua mạng luôn tiềm ẩn rủi ro "bùng hàng" hoặc "bùng tiền". Đây chính là lúc các dịch vụ trung gian uy tín phát huy tác dụng.</p>
                <h4>Trung gian giao dịch là gì?</h4>
                <p>Trung gian là một bên thứ ba uy tín, đứng ra giữ tiền của người mua. Sau khi người mua xác nhận đã nhận đúng và đủ hàng từ người bán, bên trung gian mới thực hiện chuyển tiền cho người bán.</p>
                <p>Nếu có tranh chấp xảy ra, người làm trung gian sẽ dựa trên bằng chứng của hai bên để đưa ra phán quyết công bằng nhất, đảm bảo không ai bị thiệt thòi.</p>
                <h4>Lợi ích khi dùng trung gian:</h4>
                <ul>
                    <li><strong>An tâm 100%:</strong> Người mua không sợ chuyển tiền xong bị chặn, người bán không sợ gửi hàng xong không nhận được tiền.</li>
                    <li><strong>Kiểm soát chất lượng:</strong> Trung gian có thể hỗ trợ kiểm tra thông tin tài khoản hoặc hàng hóa trước khi bàn giao.</li>
                    <li><strong>Lưu giữ bằng chứng:</strong> Toàn bộ quá trình giao dịch đều được ghi lại, dễ dàng đối soát nếu có vấn đề phát sinh sau này.</li>
                </ul>
                <p><em>Lời khuyên:</em> Chỉ nên sử dụng các trung gian có đóng bảo hiểm tại các hệ thống uy tín như CheckScam để được bảo vệ quyền lợi tối đa nếu trung gian đó chẳng may có hành vi không trung thực.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1454165833267-0352c9388147?w=800&q=80',
                'hashtags' => 'trung-gian, giao-dich, an-toan, mua-ban-online',
            ],
        ];

        $post = $this->faker->randomElement($postsData);

        return [
            'title' => $post['title'],
            'slug' => Str::slug($post['title']).'-'.Str::random(5),
            'description' => $post['description'],
            'content' => $post['content'],
            'thumbnail' => $post['thumbnail'],
            'is_featured' => $this->faker->boolean(20), // 20% featured
            'view_count' => $this->faker->numberBetween(100, 10000),
            'hashtags' => $post['hashtags'],
            'author_id' => User::where('role', 'admin')->first()?->id ?? User::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => now(),
        ];
    }
}
