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
                'thumbnail' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=1000&q=80',
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
                <p>Hãy luôn luôn cẩn trọng trước khi nhập bất kỳ thông tin quan trọng nào lên mạng. Kiểm tra thật kỹ thanh địa chỉ web là thói mãnh mẽ giúp bạn bảo vệ tài sản của mình.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=1000&q=80',
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
                'thumbnail' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=1000&q=80',
                'hashtags' => 'ngan-hang, bao-mat, app-gia-mao, otp',
            ],
            [
                'title' => 'Lừa đảo mạo danh admin CheckScam để chiếm đoạt tài sản',
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
                'thumbnail' => 'https://images.unsplash.com/photo-1593113598332-cd288d649433?w=1000&q=80',
                'hashtags' => 'checkscam, canh-bao, mạo-danh, bao-ve-nguoi-dung',
            ],
            [
                'title' => 'Deepfake - Công nghệ lừa đảo cuộc gọi video tinh vi năm 2024',
                'description' => 'Tội phạm mạng đang sử dụng AI để giả mạo hình ảnh và giọng nói của người thân để vay tiền. Cách nhận diện và phòng tránh hiệu quả.',
                'content' => '<h3>Khi mắt thấy, tai nghe chưa chắc đã là thật</h3>
                <p>Deepfake là một công nghệ sử dụng trí tuệ nhân tạo để tạo ra các video giả mạo trông như thật. Gần đây, nhiều người dân đã bị lừa hàng trăm triệu đồng khi nhận được cuộc gọi video từ "con cái" hoặc "người thân" đang ở nước ngoài nhờ chuyển tiền gấp.</p>
                <p>Các video này thường có hình ảnh mờ ảo, giọng nói hơi đứt quãng và thời gian gọi rất ngắn để nạn nhân không kịp nhận ra sự bất thường.</p>
                <h4>Dấu hiệu nhận biết cuộc gọi Deepfake</h4>
                <ul>
                    <li>Góc nhìn nghiêng của khuôn mặt thường bị biến dạng hoặc mờ đi.</li>
                    <li>Màu da không đồng nhất giữa khuôn mặt và cổ.</li>
                    <li>Chuyển động môi không khớp hoàn toàn với lời nói.</li>
                    <li>Mạch văn và cách dùng từ có vẻ lạ so với thói quen của người thân.</li>
                </ul>
                <p><strong>Lời khuyên:</strong> Khi nhận được yêu cầu chuyển tiền qua video call, hãy ngắt máy và gọi lại bằng số điện thoại di động thông thường. Hoặc hãy hỏi một câu hỏi mà chỉ hai người mới biết để kiểm tra danh tính.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=1000&q=80',
                'hashtags' => 'deepfake, ai, lua-dao, cong-nghe',
            ],
            [
                'title' => 'Lừa đảo tuyển cộng tác viên Shopee, Lazada và TikTok',
                'description' => 'Chiêu trò "việc nhẹ lương cao" thông qua việc nạp tiền làm nhiệm vụ chốt đơn ảo đang khiến hàng nghìn người sập bẫy mỗi ngày.',
                'content' => '<h3>Sự thật đằng sau những công việc "chốt đơn" kiếm tiền triệu</h3>
                <p>Các đối tượng lừa đảo thường đăng tin tuyển cộng tác viên trên các mạng xã hội với hứa hẹn thu nhập từ 300k - 500k/ngày chỉ với vài thao tác trên điện thoại.</p>
                <p>Ban đầu, chúng sẽ cho bạn làm các nhiệm vụ nhỏ với số tiền vài trăm nghìn và chuyển trả hoa hồng sòng phẳng để tạo lòng tin. Khi bạn bắt đầu tin tưởng và nạp số tiền lớn (vài chục triệu), chúng sẽ báo lỗi hệ thống và yêu cầu nạp thêm để "giải cứu" số tiền cũ.</p>
                <p><strong>Cảnh báo:</strong> Các sàn thương mại điện tử như Shopee, Lazada KHÔNG bao giờ tuyển cộng tác viên làm nhiệm vụ chốt đơn online theo hình thức nạp tiền trước. Tất cả các lời mời gọi nạp tiền để hưởng hoa hồng đều là lừa đảo.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1556742044-3c52d6e88c62?w=1000&q=80',
                'hashtags' => 'cong-tac-vien, shopee, lazada, kiem-tien-online',
            ],
            [
                'title' => 'Tổng hợp các sàn giao dịch tiền ảo lừa đảo tại Việt Nam',
                'description' => 'Danh sách các mô hình đa cấp biến tướng dưới dạng sàn đầu tư Crypto, Forex cam kết lợi nhuận khủng bạn nên tránh xa.',
                'content' => '<h3>Cẩn thận với cam kết "lợi nhuận 1% mỗi ngày"</h3>
                <p>Đầu tư tài chính luôn đi kèm rủi ro, nhưng các sàn lừa đảo thường cam kết lợi nhuận cố định rất cao mà không cần làm gì. Đây thực chất là mô hình Ponzi - lấy tiền người sau trả cho người trước.</p>
                <p>Một số đặc điểm của sàn lừa đảo:</p>
                <ul>
                    <li>Không có giấy phép hoạt động hợp pháp.</li>
                    <li>Dùng hoa hồng cao để lôi kéo người khác tham gia (đa cấp).</li>
                    <li>Khó khăn trong việc rút tiền khi số dư lớn.</li>
                    <li>Đội ngũ điều hành thường ẩn danh hoặc dùng thông tin giả.</li>
                </ul>
                <p>Trước khi đầu tư, hãy tra cứu thông tin sàn trên các cộng đồng uy tín và CheckScam để xem có phản hồi xấu nào không.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1621761191319-c6fb62004040?w=1000&q=80',
                'hashtags' => 'crypto, forex, dau-tu, ponzi',
            ],
            [
                'title' => 'Cảnh báo lừa đảo chiếm đoạt sim điện thoại để hack ngân hàng',
                'description' => 'Kẻ gian mạo danh nhân viên nhà mạng yêu cầu hỗ trợ nâng cấp sim 4G/5G từ xa để chiếm quyền kiểm soát số điện thoại của nạn nhân.',
                'content' => '<h3>Chiêu trò nâng cấp SIM từ xa nguy hiểm như thế nào?</h3>
                <p>Đối tượng sẽ gọi điện tự xưng là nhân viên Viettel, MobiFone hoặc VinaPhone và hướng dẫn bạn soạn tin nhắn theo cú pháp để nâng cấp sim 4G miễn phí. Thực chất, đây là cú pháp để kích hoạt sim trắng của chúng và hủy sim đang dùng của bạn.</p>
                <p>Sau khi chiếm được số điện thoại, chúng sẽ dùng chức năng "quên mật khẩu" của các ứng dụng ngân hàng, ví điện tử để lấy mã OTP và rút sạch tiền trong tài khoản.</p>
                <p><strong>Cách phòng tránh:</strong> Chỉ thực hiện nâng cấp sim tại các cửa hàng giao dịch trực tiếp của nhà mạng. Tuyệt đối không soạn tin nhắn theo hướng dẫn của người lạ qua điện thoại.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1562408590-e32931084e23?w=1000&q=80',
                'hashtags' => 'sim-card, hacker, ngan-hang, bao-mat',
            ],
            [
                'title' => 'Cách lấy lại tài khoản Facebook bị hack nhanh chóng và an toàn',
                'description' => 'Tài khoản của bạn bị đổi email và số điện thoại? Đừng quá lo lắng, hãy làm theo các bước dưới đây để yêu cầu Facebook hỗ trợ.',
                'content' => '<h3>Quy trình phục hồi tài khoản Facebook bị xâm nhập</h3>
                <p>Khi bị hacker chiếm quyền điều khiển, điều đầu tiên cần làm là không được hoảng loạn. Facebook cung cấp các công cụ để người dùng chính chủ lấy lại quyền truy cập.</p>
                <ol>
                    <li>Truy cập địa chỉ: facebook.com/hacked</li>
                    <li>Sử dụng thiết bị và mạng Internet (Wi-Fi) mà bạn thường xuyên dùng để đăng nhập trước đây.</li>
                    <li>Cung cấp giấy tờ tùy thân (CCCD/Bằng lái) nếu được yêu cầu.</li>
                    <li>Xác minh danh tính qua email cũ hoặc số điện thoại cũ đã từng liên kết.</li>
                </ol>
                <p>Sau khi lấy lại được, hãy kích hoạt ngay bảo mật 2 lớp (2FA) bằng ứng dụng Google Authenticator để ngăn chặn việc bị hack trong tương lai.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1611162617213-7d7a39e9b1d7?w=1000&q=80',
                'hashtags' => 'facebook, hacked, security, 2fa',
            ],
            [
                'title' => 'Top 5 ví điện tử an toàn và phổ biến nhất tại Việt Nam 2024',
                'description' => 'So sánh ưu nhược điểm và tính năng bảo mật của MoMo, ZaloPay, Viettel Money, VNPay và ShopeePay.',
                'content' => '<h3>Lựa chọn ví điện tử thông minh cho giao dịch hàng ngày</h3>
                <p>Ví điện tử đã trở thành một phần không thể thiếu trong đời sống số. Tuy nhiên, tính an toàn luôn được đặt lên hàng đầu. Các ví lớn tại Việt Nam đều đạt chứng chỉ bảo mật quốc tế PCI DSS.</p>
                <p><strong>MoMo:</strong> Hệ sinh thái lớn nhất, bảo mật nhiều lớp nhưng đôi khi ứng dụng hơi nặng.</p>
                <p><strong>ZaloPay:</strong> Tích hợp ngay trong Zalo, giao dịch cực kỳ nhanh chóng.</p>
                <p><strong>Viettel Money:</strong> An toàn cao, hỗ trợ tốt cả những nơi không có mạng Internet qua USSD.</p>
                <p>Dù dùng ví nào, bạn cũng nên đặt mật khẩu khác nhau và không bao giờ liên kết quá nhiều tiền từ tài khoản ngân hàng chính vào ví.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1593526612308-d4629baaa841?w=1000&q=80',
                'hashtags' => 'vi-dien-tu, momo, zalopay, vnpay',
            ],
            [
                'title' => 'Cảnh báo dịch vụ "Thu phí lấy lại tiền lừa đảo" trên mạng',
                'description' => 'Lừa đảo chồng lừa đảo! Cảnh giác với các nhóm cam kết "hack vào hệ thống đối phương" để đòi lại tiền đã mất cho nạn nhân.',
                'content' => '<h3>Đừng để bị lừa thêm một lần nữa</h3>
                <p>Sau khi bị lừa mất tiền, nhiều người có tâm lý nôn nóng muốn lấy lại nên tìm đến các dịch vụ "hỗ trợ thu hồi vốn". Các đối tượng này tự xưng là công ty luật, hacker mũ trắng hoặc cán bộ an ninh mạng.</p>
                <p>Chúng sẽ yêu cầu bạn đóng phí "mở hồ sơ", "lệnh rút tiền" hoặc "phí phần mềm quét dữ liệu". Sau khi nhận tiền, chúng sẽ lập tức chặn liên lạc. Thực tế, không có cá nhân hay tổ chức nào có thể hack vào tài khoản của kẻ lừa đảo để lấy lại tiền cho bạn ngoài cơ quan công an.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1614064641938-3bbee52942c7?w=1000&q=80',
                'hashtags' => 'canh-bao, lua-dao, thu-hoi-von, hack',
            ],
            [
                'title' => 'Phân biệt Telegram thật và các nhóm Telegram lừa đảo Crypto',
                'description' => 'Làm thế nào để nhận biết một dự án Crypto uy tín trên Telegram giữa hàng nghìn nhóm mời gọi đầu tư mỗi ngày.',
                'content' => '<h3>Telegram - Mảnh đất màu mỡ của tội phạm mạng</h3>
                <p>Telegram nổi tiếng với tính ẩn danh cao, nên đây cũng là nơi tội phạm lừa đảo hoạt động mạnh nhất. Chúng thường thêm bạn vào các nhóm "kèo thơm", "tín hiệu bay" mà chưa bao giờ bạn đăng ký tham gia.</p>
                <p>Dấu hiệu nhóm lừa đảo:</p>
                <ul>
                    <li>Số lượng thành viên ảo (bot) rất lớn nhưng tương tác kém.</li>
                    <li>Chặn chức năng chat của thành viên, chỉ Admin được đăng bài.</li>
                    <li>Yêu cầu chuyển tiền trực tiếp cho Admin để mua token "giá rẻ".</li>
                </ul>
                <p>Hãy luôn kiểm tra tính minh bạch của dự án và tuyệt đối không click vào các file .file đính kèm trong các nhóm lạ.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1620321023374-d1a68fbc720d?w=1000&q=80',
                'hashtags' => 'telegram, crypto, blockchain, airdrop',
            ],
            [
                'title' => 'Lừa đảo mạo danh cơ quan Thuế yêu cầu cài app quyết toán thuế',
                'description' => 'Thủ đoạn lừa đảo này đang bùng phát trong mùa quyết toán thuế, khiến nhiều doanh nghiệp và cá nhân bị mất quyền kiểm soát điện thoại.',
                'content' => '<h3>Cảnh báo về ứng dụng "Tổng cục Thuế" giả mạo</h3>
                <p>Kẻ lừa đảo gọi điện hướng dẫn cài đặt ứng dụng có tên "eTax Mobile" hoặc "Tổng cục Thuế" nhưng qua một đường link gửi qua Zalo/iMessage (file .apk). Ứng dụng này chứa mã độc cho phép hacker theo dõi mọi hoạt động của bạn.</p>
                <p><strong>Lưu ý:</strong> Cơ quan Thuế chỉ có ứng dụng chính thức trên Store của Apple và Google. Cán bộ thuế không bao giờ yêu cầu người dân cài app qua link lạ hay cung cấp thông tin bí mật qua điện thoại.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=1000&q=80',
                'hashtags' => 'thue, etax, lua-dao, bao-mat',
            ],
            [
                'title' => 'Tầm quan trọng của việc kiểm tra STK trước khi chuyển tiền',
                'description' => 'Tại sao bạn nên tra cứu số tài khoản trên CheckScam trước khi thực hiện các giao dịch mua bán online với người lạ?',
                'content' => '<h3>Phòng bệnh hơn chữa bệnh: Quy tắc 3 phút an toàn</h3>
                <p>Mỗi ngày có hàng trăm số tài khoản lừa đảo được cập nhật lên hệ thống CheckScam. Chỉ cần dành ra 3 phút truy cập website để tra cứu:</p>
                <ul>
                    <li>Số tài khoản ngân hàng.</li>
                    <li>Số điện thoại liên hệ.</li>
                    <li>Link Facebook/Telegram của người bán.</li>
                </ul>
                <p>Nếu kết quả hiện "Bị báo cáo lừa đảo", hãy dừng ngay giao dịch. Đây là cách đơn giản nhất để bảo vệ túi tiền của chính bạn khỏi những kẻ gian gian lận trên mạng.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1601597111158-2fcee29ecad5?w=1000&q=80',
                'hashtags' => 'checkscam, giao-dich, an-toan, ngan-hang',
            ],
            [
                'title' => 'Chiêu trò lừa đảo qua ứng dụng hẹn hò Tinder và Bumble',
                'description' => 'Cảnh báo về các "nữ thần" mời gọi đầu tư sàn chứng khoán hoặc Crypto sau khi làm quen qua các ứng dụng hẹn hò.',
                'content' => '<h3>Mắc bẫy "tình" kiêm bẫy "tiền" trên app hẹn hò</h3>
                <p>Nhiều nam giới đã trở thành nạn nhân của chiêu trò này. Sau vài ngày nhắn tin ngọt ngào, đối phương sẽ bắt đầu khoe về lợi nhuận từ việc đầu tư và ngỏ ý "dẫn dắt" bạn cùng tham gia.</p>
                <p>Thực chất, các sàn giao dịch này đều do chúng kiểm soát. Ban đầu bạn sẽ thắng, nhưng khi nạp tiền lớn, tài khoản của bạn sẽ bị khóa hoặc không thể rút được. Hãy tỉnh táo, tình yêu không bao giờ đến dễ dàng kèm theo các lời mời đầu tư tài chính.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1516245834210-c4c142787335?w=1000&q=80',
                'hashtags' => 'hen-ho, tinder, lua-dao-tc, scammer',
            ],
            [
                'title' => 'Hướng dẫn báo cáo tài khoản lừa đảo lên hệ thống CheckScam',
                'description' => 'Bạn vừa bị lừa hoặc phát hiện kẻ gian? Hãy xem hướng dẫn cách gửi bằng chứng báo cáo để cảnh báo cho cộng đồng.',
                'content' => '<h3>Cùng nhau xây dựng cộng đồng mạng sạch bóng lừa đảo</h3>
                <p>Để báo cáo một vụ lừa đảo thành công, bạn cần chuẩn bị đầy đủ các bằng chứng sau:</p>
                <ol>
                    <li>Ảnh chụp màn hình các tin nhắn giao dịch.</li>
                    <li>Ảnh chụp bằng chứng chuyển khoản thành công (Bill ngân hàng).</li>
                    <li>Thông tin chi tiết về đối tượng (STK, SĐT, Link trang cá nhân).</li>
                </ol>
                <p>Báo cáo của bạn sẽ giúp hàng nghìn người khác không bị mất tiền như bạn. Hãy chung tay bảo vệ cộng đồng!</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1589216532372-1c2a367900d8?w=1000&q=80',
                'hashtags' => 'report, checkscam, cong-dong, canh-bao',
            ],
            [
                'title' => 'Lừa đảo "nhận quà miễn phí" nhưng phải trả phí vận chuyển cao',
                'description' => 'Chiêu trò tặng nước hoa, mỹ phẩm hay đồ điện tử 0 đồng nhưng khách hàng phải trả phí ship "trên trời".',
                'content' => '<h3>Cái bẫy quà tặng 0 đồng bạn nên tránh</h3>
                <p>Kẻ gian gọi điện thông báo bạn là khách hàng may mắn được tặng một món quà giá trị như nước hoa Chanel hay đồng hồ thông minh. Bạn chỉ cần thanh toán phí vận chuyển và phí thuế hải quan từ 200k - 500k.</p>
                <p>Tuy nhiên, khi nhận hàng, bên trong chỉ là rác hoặc các vật dụng rẻ tiền trị giá vài nghìn đồng. Đây là hình thức lừa đảo tinh vi dựa trên tâm lý thích đồ miễn phí của người dùng.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1513885535751-8b9238bd345a?w=1000&q=80',
                'hashtags' => 'qua-tang, lua-dao, freebie, ship-cod',
            ],
            [
                'title' => 'Rủi ro khi mua tài khoản Game, Netflix giá rẻ trên mạng',
                'description' => 'Tại sao các tài khoản Netflix, Spotify hay Game Steam giá rẻ thường bị quét và khóa sau vài ngày sử dụng?',
                'content' => '<h3>Tiền mất tật mang khi mua hàng "lậu"</h3>
                <p>Các tài khoản giá rẻ được bán tràn lan trên mạng thường có nguồn gốc từ việc sử dụng thẻ tín dụng chùa (CC) hoặc tận dụng các lỗ hồng của dịch vụ. Các nền tảng như Netflix hay Spotify liên tục quét các tài khoản này.</p>
                <p>Khi bị phát hiện, tài khoản của bạn sẽ bị khóa vĩnh viễn và người bán cũng sẽ "bay màu" khiến bạn không thể bảo hành. Hãy đăng ký trực tiếp từ nhà phát hành để được hưởng dịch vụ tốt nhất và an toàn nhất.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?w=1000&q=80',
                'hashtags' => 'netflix, game, premium, lua-dao',
            ],
            [
                'title' => 'Quy trình đóng bảo hiểm tại CheckScam đảm bảo uy tín',
                'description' => 'Tìm hiểu về hệ thống quỹ bảo hiểm tại CheckScam và cách nó bảo vệ quyền lợi cho cả người mua và người bán.',
                'content' => '<h3>Xây dựng lòng tin bằng quỹ bảo hiểm CheckScam</h3>
                <p>Hệ thống Đóng Bảo Hiểm tại CheckScam giúp định danh những người làm dịch vụ uy tín. Khi một cá nhân đóng bảo hiểm, số tiền đó sẽ được hệ thống giữ lại để bồi thường nếu có sự cố gian lận xảy ra.</p>
                <p>Ưu điểm cho người đóng bảo hiểm:</p>
                <ul>
                    <li>Tăng độ uy tín trong mắt khách hàng.</li>
                    <li>Được ưu tiên hiển thị trên hệ thống.</li>
                    <li>Hỗ trợ giải quyết tranh chấp nhanh chóng.</li>
                </ul>
                <p>Hãy liên hệ ngay với Admin chính thức để tìm hiểu về mức phí và quy trình tham gia bảo hiểm chuyên nghiệp.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1554224155-1696413575b9?w=1000&q=80',
                'hashtags' => 'bao-hiem, uy-tin, checkscam, quy-bao-hiem',
            ],
            [
                'title' => 'Cảnh báo lừa đảo trúng thưởng qua điện thoại và Facebook',
                'description' => 'Bạn nhận được thông báo trúng thưởng xe SH hoặc 100 triệu đồng từ Messenger? Đọc ngay bài viết để không mất tiền oan.',
                'content' => '<h3>Trúng thưởng giả - Mất tiền thật</h3>
                <p>Đây là chiêu trò cổ điển nhưng vẫn rất nhiều người sập bẫy. Kẻ gian mạo danh nhân viên của Facebook, Viettel hoặc tập đoàn lớn báo bạn đã trúng thưởng phần quà cực lớn.</p>
                <p>Chúng yêu cầu bạn chuyển trước phí làm thủ tục hồ sơ hoặc phí vận chuyển quà tặng. Đừng bao giờ tin vào những giải thưởng "từ trên trời rơi xuống" mà bạn chưa bao giờ tham gia dự thi.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?w=1000&q=80',
                'hashtags' => 'trung-thuong, lua-dao, Messenger, canh-bao',
            ],
            [
                'title' => 'Lừa đảo đầu tư chứng khoán quốc tế và các sàn BO',
                'description' => 'Phân tích mô hình hoạt động của các sàn nhị phân (BO) và rủi ro cháy tài khoản khi nghe theo các "chuyên gia đọc lệnh".',
                'content' => '<h3>Sự thật về các sàn giao dịch quyền chọn nhị phân</h3>
                <p>Các sàn BO thực chất là một hình thức đánh bạc đội lốt đầu tư tài chính. Người chơi chỉ có 2 lựa chọn lên hoặc xuống trong thời gian cực ngắn. Các "chuyên gia" thường khoe cuộc sống sang chảnh để lôi kéo người chơi nạp tiền.</p>
                <p>Hệ thống sàn thường có thể can thiệp vào kết quả giao dịch ở những giây cuối cùng. Hãy tránh xa các sàn giao dịch này nếu không muốn trắng tay trong một đêm.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1611974714400-999313db4608?w=1000&q=80',
                'hashtags' => 'bo, chung-khoan, dau-tu, rui-ro',
            ],
            [
                'title' => 'Bảo mật thông tin cá nhân trên mạng xã hội như thế nào?',
                'description' => 'Những thói quen vô tình của bạn đang tạo điều kiện cho hacker chiếm đoạt tài khoản và thông tin cá nhân.',
                'content' => '<h3>Dữ liệu cá nhân: Tài sản quý giá nhất trong kỷ nguyên số</h3>
                <p>Hacker thường thu thập thông tin của bạn từ những chi tiết nhỏ nhất:</p>
                <ul>
                    <li>Ngày tháng năm sinh hiển thị công khai.</li>
                    <li>Sử dụng số điện thoại cá nhân làm mật khẩu.</li>
                    <li>Click vào các liên kết khảo sát, đố vui trên tường của bạn bè.</li>
                </ul>
                <p>Hãy ẩn bớt thông tin nhạy cảm, chỉ để chế độ bạn bè và thường xuyên kiểm tra danh sách các ứng dụng đang có quyền truy cập vào Facebook của bạn.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?w=1000&q=80',
                'hashtags' => 'privacy, security, social-media, tips',
            ],
            [
                'title' => 'Cảnh báo lừa đảo vay tiền qua ứng dụng tín dụng đen',
                'description' => 'Những hệ lụy kinh khủng khi cài đặt các app vay tiền dễ dàng chỉ cần CCCD và quyền truy cập danh bạ điện thoại.',
                'content' => '<h3>Ám ảnh app vay tiền và chiêu trò "đòi nợ kiểu xã hội đen"</h3>
                <p>Các app vay tiền lừa đảo thường quảng cáo vay tiền không lãi suất, nhưng thực chất lãi suất cực cao dưới các loại phí dịch vụ. Khi nợ quá hạn, chúng sẽ dùng hình ảnh và thông tin của bạn để bêu rếu lên mạng xã hội và gọi điện khủng bố người thân trong danh bạ.</p>
                <p>Duyên nợ với các app này rất khó dứt. Hãy tìm đến các tổ chức tài chính chính thống và uy tín nếu thực sự cần vay vốn.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?w=1000&q=80',
                'hashtags' => 'vay-tien, app-vay, tin-dung-den, canh-bao',
            ],
            [
                'title' => 'Hướng dẫn kiểm tra iPhone cũ khi mua qua mạng xã hội',
                'description' => 'Tránh mua phải iPhone dựng, iPhone lock hoặc iPhone bị dính iCloud ẩn qua các nhóm mua bán điện thoại cũ.',
                'content' => '<h3>Kinh nghiệm mua đồ công nghệ cũ online an toàn</h3>
                <p>Mua iPhone cũ qua Facebook Marketplace hay hội nhóm tiềm ẩn rất nhiều rủi ro. Hãy yêu cầu người bán giao dịch trực tiếp hoặc qua trung gian uy tín.</p>
                <p>Các bước kiểm tra cơ bản:</p>
                <ul>
                    <li>Kiểm tra IMEI/Serial trên trang chủ Apple.</li>
                    <li>Kiểm tra chức năng FaceID hoặc TouchID xem có hoạt động ổn định không.</li>
                    <li>Khôi phục cài đặt gốc ngay tại chỗ để tránh iCloud ẩn.</li>
                </ul>
                <p>Đừng vì quá ham rẻ mà mua phải những chiếc máy "mất vân, hư cam" hoặc máy đã qua sửa chữa nặng nề.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1510557880182-3d4d3cba3f21?w=1000&q=80',
                'hashtags' => 'iphone, cong-nghe, mua-ban, tips',
            ],
            [
                'title' => 'Lừa đảo mạo danh Công an thông báo vi phạm giao thông "phạt nguội"',
                'description' => 'Cuộc gọi tự xưng Công an giao thông thông báo bạn có biên bản phạt nguội và yêu cầu nộp tiền qua tài khoản cá nhân.',
                'content' => '<h3>Cảnh giác với các cuộc gọi thông báo "phạt nguội"</h3>
                <p>Tội phạm mạo danh cán bộ CSGT gọi điện đe dọa nạn nhân liên quan đến các vụ án giao thông nghiêm trọng hoặc có biên bản phạt nguội chưa nộp. Chúng yêu cầu bạn chuyển khoản ngay để "đình chỉ vụ việc".</p>
                <p><strong>Lưu ý quan trọng:</strong> Cơ quan Công an chỉ làm việc thông qua giấy mời, giấy triệu tập tại trụ sở chính thức. Mọi yêu cầu chuyển tiền qua điện thoại đều là hành vi lừa đảo chiếm đoạt tài sản.</p>',
                'thumbnail' => 'https://images.unsplash.com/photo-1503676260728-1c00da07bb5e?w=1000&q=80',
                'hashtags' => 'cong-an, phat-nguoi, lua-dao, canh-bao',
            ],
        ];

        // Lấy bài viết dựa trên index của factory (từ 0 đến 24)
        // Nếu dùng factory()->count(25), ta có thể dùng $count để lấy tuần tự
        static $index = 0;
        $postData = $postsData[$index % count($postsData)];
        $index++;

        return [
            'title' => $postData['title'],
            'slug' => Str::slug($postData['title']).'-'.Str::random(5),
            'description' => $postData['description'],
            'content' => $postData['content'],
            'thumbnail' => $postData['thumbnail'],
            'is_featured' => $this->faker->boolean(20), // 20% featured
            'view_count' => $this->faker->numberBetween(100, 10000),
            'hashtags' => $postData['hashtags'],
            'author_id' => User::where('role', 'admin')->first()?->id ?? User::factory(),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => now(),
        ];
    }
}
