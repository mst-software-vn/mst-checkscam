## Phân tích Admin Panel — MST CheckScam

### Bối cảnh thị trường cần hiểu trước

Website CheckScam trong mảng MMO VN không phải là công cụ từ thiện — nó là **sản phẩm kinh doanh**. Người vận hành cần:

1. **Xử lý báo cáo đủ nhanh** để không mất uy tín với cộng đồng (báo cáo treo 3–5 ngày là người dùng bỏ đi)
2. **Kiểm soát nội dung** vì đây là nội dung nhạy cảm pháp lý (tố cáo sai → kiện ngược)
3. **Theo dõi doanh thu** từ quỹ bảo hiểm — đây là core monetization
4. **Chống lạm dụng** — đối thủ cạnh tranh có thể spam báo cáo giả để phá uy tín người khác

Với góc nhìn đó, đây là toàn bộ Admin Panel cần có:

---

## NHÓM 1 — Dashboard (Màn hình tổng quan)

Đây là màn hình đầu tiên khi đăng nhập. Phải trả lời được câu hỏi: **"Hôm nay tôi cần làm gì?"**

### Metrics cần hiển thị

**Hàng trên — số liệu cần xử lý ngay:**
- Số báo cáo đang chờ duyệt (badge đỏ, click vào → danh sách)
- Số comment bị flag vi phạm (nếu có hệ thống auto-flag)
- Số IP bị rate-limit trong 24h qua (dấu hiệu spam)

**Hàng giữa — sức khỏe hệ thống:**
- Tổng báo cáo được duyệt hôm nay / tuần này
- Tổng lượt tra cứu hôm nay (real-time từ `search_logs`)
- Top 5 từ khóa được tra cứu nhiều nhất hôm nay

**Hàng dưới — doanh thu:**
- Tổng tiền quỹ bảo hiểm đang hoạt động
- Số thành viên bảo hiểm sắp hết hạn trong 7 ngày tới (để chủ động gia hạn)
- Banner quảng cáo sắp hết hạn

### Tại sao quan trọng

`search_logs` là mỏ vàng thực sự. Nếu 1 STK được search 50 lần trong 1 ngày mà chưa có báo cáo nào → đó là tín hiệu thị trường, chủ web có thể chủ động post bài cảnh báo hoặc đăng lên Telegram Channel trước.

---

## NHÓM 2 — Quản lý Báo cáo (Report Management)

Đây là chức năng tốn thời gian nhất trong ngày của Moderator.

### 2.1 — Danh sách báo cáo chờ duyệt

Màn hình danh sách phải có đủ thông tin để quyết định **mà không cần mở chi tiết từng cái**:

| Cột hiển thị | Lý do cần thiết |
|---|---|
| Loại (STK/SĐT/FB) + Giá trị | Nhận diện nhanh |
| Số tiền thiệt hại | Báo cáo lớn ưu tiên xử lý trước |
| Số ảnh bằng chứng | 0 ảnh → nhiều khả năng spam |
| Thời gian gửi | Ưu tiên theo thứ tự |
| IP gửi | Phát hiện nhiều báo cáo cùng IP |
| **Đã từng bị report trước đó chưa** | Nếu STK này đã có 5 báo cáo trước → duyệt nhanh hơn |

Thao tác **bulk action**: chọn nhiều báo cáo → Duyệt tất / Từ chối tất. Không có bulk action thì khi spam 20 báo cáo giả, Moderator phải click 20 lần.

### 2.2 — Chi tiết báo cáo

Khi mở chi tiết 1 báo cáo, bố cục cần chia làm 3 cột:

**Cột trái — Thông tin cần kiểm tra:**
- Nội dung báo cáo đầy đủ
- Ảnh bằng chứng (preview không cần mở tab mới)
- Thông tin người gửi (ẩn với Moderator nếu người dùng tick ẩn danh — nhưng Admin thấy được)

**Cột giữa — Lịch sử đối tượng:**
- Tất cả báo cáo cũ liên quan đến `target_id` này (kể cả bị từ chối)
- Số lần đối tượng này bị search trong 30 ngày qua
- Nếu đối tượng có trong quỹ bảo hiểm → hiện cảnh báo rõ ràng

**Cột phải — Thao tác:**
- Nút Duyệt / Từ chối (có textarea nhập lý do từ chối)
- Nút Đánh dấu spam (để ban IP)
- Ghi chú nội bộ (chỉ Admin/Mod thấy, không public)

### 2.3 — Tại sao cần "lịch sử đối tượng" trong màn hình duyệt

Thực tế hay gặp trong MMO: một STK bị tố cáo lần 2, nhưng báo cáo lần đầu bị từ chối vì thiếu bằng chứng. Nếu Moderator không thấy lịch sử này → họ có thể từ chối tiếp lần 2 dù lần này có đủ bằng chứng. Đây là lỗi UX nghiêm trọng mà nhiều hệ thống bỏ qua.

---

## NHÓM 3 — Scam Records (Quản lý đối tượng đã bị đánh dấu)

Khác với "Quản lý báo cáo" — đây là quản lý **kết quả sau khi duyệt**.

### Chức năng cần có

**Danh sách scam records:**
- Filter theo loại (STK / SĐT / Facebook)
- Filter theo số lần bị tố cáo
- Sort theo tổng thiệt hại, số lượt search, ngày gần nhất
- Search trực tiếp theo `target_id`

**Chi tiết 1 scam record:**
- Tổng hợp thống kê: bao nhiêu báo cáo, tổng thiệt hại, lần đầu bị report khi nào
- Danh sách tất cả báo cáo liên quan (kể cả đã bị từ chối)
- Nút **"Đánh dấu oan sai / Xóa khỏi blacklist"** — cần confirm 2 bước và ghi lý do

**Tại sao cần "Xóa khỏi blacklist" với confirm 2 bước:** Đây là thao tác có rủi ro pháp lý cao nhất. Nếu xóa nhầm 1 scammer thực sự → nạn nhân tiếp theo không được cảnh báo. Cần log lại ai xóa, lúc nào, lý do gì.

---

## NHÓM 4 — Quỹ Bảo Hiểm (Insurance Management)

Đây là **trái tim doanh thu** của hệ thống. Admin Panel ở đây phải phục vụ tốt cho chủ web.

### 4.1 — Danh sách thành viên bảo hiểm

| Cột | Ghi chú |
|---|---|
| Tên + Avatar | |
| Số tiền bảo hiểm | |
| Ngày tham gia | |
| **Ngày hết hạn** | Cần tính và hiển thị — DB hiện tại chưa có trường này |
| **Trạng thái** | Active / Sắp hết hạn (< 7 ngày) / Đã hết hạn |
| Nút quản lý | Sửa / Gia hạn / Tạm dừng |

### 4.2 — Form thêm / sửa thành viên

Form cần đủ:
- Thông tin cơ bản (tên, ảnh)
- Số tiền bảo hiểm + **ngày hết hạn** (trường này đang thiếu trong DB)
- Contact info (JSON editor đơn giản hoặc form thêm từng dòng — đừng bắt Admin viết JSON tay)
- Payment accounts (tương tự — form thêm từng tài khoản ngân hàng)
- Services (danh sách dịch vụ cung cấp)

**Vấn đề thiết kế DB cần chỉ ra:** Bảng `insurances` hiện tại không có `expired_at`. Không có trường này thì không thể tự động tắt badge khi hết hạn, và Dashboard không thể hiển thị "sắp hết hạn". Cần bổ sung.

---

## NHÓM 5 — Quản lý Nội dung (Content Management)

### 5.1 — Bài viết (Posts)

Chức năng tiêu chuẩn:
- Danh sách bài viết + filter theo trạng thái, tác giả, ngày
- Editor soạn thảo (tối thiểu là rich text, lý tưởng là có hỗ trợ embed ảnh)
- Đánh dấu bài viết nổi bật
- Quản lý hashtag

### 5.2 — Comment

Đây là chức năng cần xử lý cẩn thận hơn vẻ ngoài của nó:

- Danh sách comment gần nhất trên toàn hệ thống (không phải chỉ 1 bài)
- Filter theo báo cáo cụ thể
- Xóa comment — thao tác này cần **ghi log** (ai xóa, comment nói gì, lúc nào) vì nếu có tranh chấp pháp lý sau này, bằng chứng đã xóa là vấn đề

---

## NHÓM 6 — Search Analytics (Phân tích tra cứu)

Đây là tính năng bị **underrated** nhất trong hệ thống, nhưng lại có giá trị kinh doanh cao nhất.

Từ bảng `search_logs`, Admin cần thấy được:

**Bảng "Hot Targets" — Đối tượng được search nhiều nhưng chưa có báo cáo:**
- STK / SĐT / FB được search > N lần trong 7 ngày qua
- Không có báo cáo nào được duyệt
- Đây là danh sách **lead** để chủ web chủ động liên hệ cộng đồng MMO hỏi thêm thông tin

**Bảng xu hướng theo thời gian:**
- Lượt tra cứu theo ngày/tuần
- Tỷ lệ "tìm thấy scam" vs "không tìm thấy"
- Tỷ lệ cao → hệ thống đang có dữ liệu tốt; tỷ lệ thấp → cần đẩy nội dung

**Tại sao quan trọng với MMO:** Trong thị trường MMO, thông tin chạy rất nhanh qua Telegram/Zalo. Khi 1 STK bắt đầu được search nhiều đột ngột → đó là dấu hiệu cộng đồng đang cảnh báo nhau. Nếu chủ web phát hiện trước và có bài đăng sớm → uy tín tăng mạnh, traffic organic tự đến.

---

## NHÓM 7 — Cấu hình Hệ thống (Settings)

### 7.1 — Cấu hình chung

Từ bảng `settings`:
- SEO: Title, Description, Keywords
- Thông tin liên hệ: Hotline, Zalo, Facebook Fanpage
- Logo, Favicon
- Bật/tắt các module (Quỹ bảo hiểm, Banner quảng cáo...)

### 7.2 — Quản lý Banner quảng cáo

Chức năng nhỏ nhưng cần:
- Upload ảnh banner
- Nhập link redirect
- Chọn vị trí (Header / Sidebar / Footer)
- Ngày bắt đầu + ngày kết thúc → tự ẩn khi hết hạn
- Thống kê click (đơn giản, không cần phức tạp)

### 7.3 — Quản lý Users (Admin only)

- Danh sách Admin / Moderator
- Tạo tài khoản mới, phân quyền
- Đổi mật khẩu, vô hiệu hóa tài khoản

---

## NHÓM 8 — Audit Log (Lịch sử thao tác)

Đây là tính năng **bắt buộc** dù README để ở phần đề xuất, vì lý do pháp lý và vận hành:

Mỗi hành động quan trọng cần log lại:

| Hành động | Cần log |
|---|---|
| Duyệt báo cáo | User, thời gian, report_id |
| Từ chối báo cáo | User, thời gian, report_id, lý do |
| Xóa scam record | User, thời gian, target_id, lý do |
| Xóa comment | User, thời gian, nội dung comment (trước khi xóa) |
| Thêm/sửa thành viên bảo hiểm | User, thời gian, thông tin thay đổi |
| Thay đổi cấu hình hệ thống | User, thời gian, key, giá trị cũ → mới |

Khi có tranh chấp ("tại sao bài tôi bị xóa?", "ai đã sửa thông tin tôi?") → Admin có đầy đủ bằng chứng để trả lời.

---

## Tổng hợp — Những điểm cần bổ sung vào DB

Sau khi phân tích, có một số vấn đề thiết kế DB cần chú ý:

1. **`insurances` thiếu `expired_at`** — Không có trường này thì toàn bộ logic gia hạn và cảnh báo hết hạn không hoạt động được

2. **`reports` nên có `slug`** — README đã đề cập, cần làm ngay vì ảnh hưởng SEO trực tiếp

3. **`comments` thiếu `is_anonymous`** — README có đề cập tính năng ẩn danh khi comment, nhưng DB không có trường này

4. **Thiếu bảng `audit_logs`** — Cần thiết kế thêm với các trường: `user_id`, `action`, `target_type`, `target_id`, `old_value`, `new_value`, `created_at`

5. **`reports.category` nên là FK** — Hiện tại là String tự do, nên liên kết với 1 bảng `scam_categories` để Admin quản lý danh mục tập trung và filter chính xác

---

Trên đây là toàn bộ phân tích từ góc nhìn vận hành thực tế. Nếu bạn muốn tôi đi sâu vào phần nào — ví dụ thiết kế chi tiết UI layout cho Dashboard, hoặc viết migration schema cho các bảng còn thiếu — cứ nói thẳng.
