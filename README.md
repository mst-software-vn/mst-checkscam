# Bussiness Logic Document

- Project: **MST-CheckScam**
- Version: **1.0**
- Mục tiêu: Tài liệu nghiệp vụ để dev build source, bán lại cho người muốn vận hành web CheckScam. Logic bám sát thực tế thị trường VN, không over-engineer.

---

## I. MODULE TRA CỨU (SEARCH)

### Luồng chính

Người dùng vào trang chủ → nhập thông tin → hệ thống tìm trong DB → trả kết quả.

**Các loại input hỗ trợ:**

- Số tài khoản ngân hàng (STK)
- Số điện thoại (SĐT)
- Link Facebook hoặc UID số

**Xử lý input trước khi tìm kiếm (Normalization):**

- Xóa khoảng trắng, dấu chấm, dấu gạch ngang.
- SĐT: Cho phép nhập cả `0xxx` lẫn `84xxx`, tìm match với cả hai dạng.
- Facebook: Nếu nhập URL dạng `facebook.com/tennguoi` thì tách lấy phần `tengruoi` để tìm. Nếu nhập UID số thì tìm thẳng.

**Kết quả trả về — 2 trường hợp:**

**Trường hợp 1 — Tìm thấy (có phốt đã duyệt):**

- Hiện banner đỏ: *"⚠️ CẢNH BÁO: Đối tượng này đã bị tố cáo lừa đảo"*
- Hiện số lượt tố cáo + tổng tiền thiệt hại (nếu có)
- Hiện danh sách các bài phốt công khai bên dưới
- Nút: "Tôi cũng bị lừa bởi đối tượng này" → dẫn sang trang gửi tố cáo với giá trị đã điền sẵn

**Trường hợp 2 — Không tìm thấy:**

- Hiện banner xanh/xám: *"Không tìm thấy thông tin tố cáo nào về đối tượng này"*
- Ghi chú nhỏ: *"Không có nghĩa là an toàn tuyệt đối. Hãy cẩn thận khi giao dịch."*
- Nút: "Tố cáo đối tượng này"

---

## II. MODULE TỐ CÁO (REPORT)

### 1. Gửi tố cáo

Ai cũng có thể gửi tố cáo, không cần đăng ký tài khoản.

**Thông tin bắt buộc phải nhập:**

- Loại đối tượng: STK / SĐT / Facebook
- Giá trị (số TK, SĐT, link FB)
- Nội dung mô tả sự việc (tối thiểu 50 ký tự)
- Tối thiểu 1 ảnh bằng chứng (bill, ảnh chat)
- Số tiền bị lừa (không bắt buộc, nhưng nên có để thống kê)

**Thông tin tùy chọn:**

- Tên người gửi + SĐT liên hệ (để Admin có thể hỏi thêm khi cần)
- Checkbox "Ẩn danh": nếu tick thì thông tin người gửi không hiện công khai

**Anti-spam đơn giản:**

- Giới hạn 3 lần gửi / IP / 24h
- Nếu vượt ngưỡng: hiện thông báo "Bạn đã gửi quá nhiều báo cáo hôm nay"

**Sau khi gửi:**

- Bài phốt vào trạng thái `Chờ duyệt`
- Không hiện công khai cho đến khi Admin duyệt
- Người gửi thấy màn hình: *"Cảm ơn! Báo cáo của bạn đang chờ Admin xét duyệt."*

### 2. Trạng thái bài phốt

```
Chờ duyệt  →  Công khai
           →  Từ chối
```

Chỉ có 3 trạng thái, đơn giản. Không cần workflow phức tạp nhiều bước.

### 3. Comment vào bài phốt

- Ai cũng có thể comment, không cần đăng ký
- Có checkbox "Ẩn danh": nếu tick thì hiển thị là "Người dùng ẩn danh"
- Admin có thể xóa comment vi phạm từ panel
- Giới hạn 5 comment / IP / bài / 24h để tránh spam

---

## III. MODULE ADMIN PANEL

Đây là toàn bộ tính năng cần có trong trang quản trị.

### Quản lý báo cáo

- Xem danh sách bài phốt đang `Chờ duyệt`
- Xem chi tiết: nội dung, ảnh bằng chứng, thông tin người gửi
- Nút **Duyệt** → bài phốt chuyển sang `Công khai`, đối tượng bị đánh dấu Scam
- Nút **Từ chối** → nhập lý do → bài phốt bị ẩn
- Nút **Xóa** → xóa hẳn khỏi hệ thống (spam, sai hoàn toàn)

### Quản lý scam records

- Xem danh sách tất cả đối tượng đang bị đánh dấu Scam
- Có thể sửa thông tin, xóa record nếu cần (ví dụ oan sai)
- Xem lịch sử các bài phốt liên quan đến đối tượng đó

### Quản lý comment

- Xem + xóa comment vi phạm

### Thống kê trang chủ (Dashboard)

- Tổng số đối tượng đã bị phốt
- Tổng số báo cáo
- Số báo cáo đang chờ duyệt
- Tổng tiền thiệt hại cộng đồng

---

## IV. MODULE TELEGRAM BOT

Tính năng cốt lõi giúp người dùng MMO check nhanh mà không cần vào web.

### Lệnh người dùng thường dùng

- `/check [STK hoặc SĐT hoặc link FB]`
    
    Bot trả về: Trạng thái (Scam / Không có dữ liệu) + số lượt tố cáo + link xem chi tiết trên web
    
- `/report` — Bot gửi link trang tố cáo trên web

### Tự động push thông báo

Khi Admin duyệt 1 bài phốt mới → Bot tự động đăng lên Telegram Channel: tóm tắt thông tin đối tượng + link bài phốt. Giúp Channel có nội dung liên tục, kéo người dùng subscribe.

### Bảo mật Bot Admin

- Lệnh `/approve [id]` và `/reject [id]` chỉ hoạt động với Telegram User ID được cấu hình sẵn trong file `.env`
- Đơn giản dùng whitelist ID tĩnh, không cần DB phức tạp

---

## V. MODULE QUỸ BẢO HIỂM (TÙY CHỌN)

> Module này **không bắt buộc** trong bản cơ bản. Chủ web có thể bật/tắt trong cài đặt. Nếu tắt, toàn bộ UI liên quan tự ẩn đi.
> 

### Ý nghĩa

Người dùng nộp tiền vào quỹ của web → được gắn badge **"Đã đóng bảo hiểm"** → hiện thị uy tín cao hơn khi người khác search tên họ. Đây là nguồn thu chính của chủ web.

### Luồng đơn giản

1. Người dùng liên hệ Admin (qua Zalo/Telegram) để đăng ký gói bảo hiểm.
2. Chuyển khoản cho Admin.
3. Admin vào panel → thêm record bảo hiểm thủ công cho tài khoản đó.
4. Hệ thống tự hiển thị badge xanh + số tiền bảo hiểm khi ai search đến đối tượng đó.

**Hiển thị khi search thấy người có bảo hiểm:**

> ✅ *"Người dùng này đã đóng quỹ bảo hiểm [số tiền]. Liên hệ Admin để được hỗ trợ nếu xảy ra tranh chấp."*
> 

**Không cần tự động hóa thanh toán trong v1** — Admin xác nhận thủ công là đủ.

### Bảng gói bảo hiểm (chủ web tự set trong Admin panel)

Chủ web cấu hình được: tên gói, mức tiền, phí duy trì/tháng. Mặc định gợi ý 3 gói: nhỏ / vừa / lớn.

---

## VI. TRANG CHỦ & THỐNG KÊ

Trang chủ gồm 3 phần chính:

**Phần 1 — Ô tìm kiếm to, nằm giữa trang:**

Dropdown chọn loại (STK / SĐT / Facebook) + input + nút "Kiểm tra ngay".

**Phần 2 — Số liệu thống kê (lấy real-time từ DB):**

- Tổng đối tượng scam trong hệ thống
- Tổng lượt tố cáo
- Tổng tiền thiệt hại cộng đồng

**Phần 3 — Danh sách bài phốt mới nhất:**

10 bài phốt được duyệt gần nhất, hiển thị dạng card/list. Click vào để xem chi tiết.

---

## VII. NGUỒN DOANH THU

Thiết kế cho chủ web vận hành, không phức tạp:

**1. Phí quỹ bảo hiểm (chính)**

Thu tiền từ người muốn có badge uy tín. Phí duy trì hàng tháng. Admin xác nhận thủ công.

**2. Quảng cáo Banner**

Cho thuê vị trí banner trên web (Header, Sidebar). Admin set ảnh + link + thời hạn trong panel. Hết hạn tự ẩn.

**3. Phí API (nâng cao, làm sau)**

Nếu có nhu cầu, bán quyền truy cập API cho bên thứ 3. Nhưng không cần làm trong v1.

---

## VIII. PHẠM VI MVP (CÁI GÌ LÀM TRƯỚC)

**Làm trước — Core (bắt buộc có):**

- ✅ Trang chủ + ô search
- ✅ Trang kết quả tìm kiếm
- ✅ Form gửi tố cáo (có upload ảnh, ẩn danh)
- ✅ Trang chi tiết bài phốt + comment
- ✅ Admin panel: duyệt/từ chối báo cáo, quản lý scam records, xóa comment
- ✅ Telegram Bot: `/check`

**Làm sau — Nâng cao (tùy chọn):**

- Module quỹ bảo hiểm + badge Trust
- Quản lý banner quảng cáo trong admin
- Telegram Bot: auto push bài phốt mới lên Channel
- Public API cho bên thứ 3