# CheckScam — Feature Spec: Khu Mua Bán (/newfeed/)

---

## 1. Tổng quan

Khu Mua Bán là tính năng dạng social feed tích hợp vào CheckScam, cho phép cộng đồng MMO đăng bán tài khoản, dịch vụ, tool. Điểm khác biệt cốt lõi: tick xanh xác minh uy tín do admin duyệt thủ công, cơ chế tự ẩn bài theo ngưỡng report, không cho chỉnh sửa bài sau khi đăng.

---

## 2. Phạm vi v1.0

**In scope:**
- Feed dạng Masonry Grid (Pinterest layout) + Card-based
- Filter bar theo category + tìm kiếm từ khóa
- Đăng bài qua popup (yêu cầu login)
- Tick xanh xác minh uy tín
- Xóa bài (chủ bài + admin)
- Report bài vi phạm + tự ẩn theo ngưỡng
- Popup yêu cầu đăng nhập với guest

**Out of scope (v1.1+):**
- Nút liên hệ động (Telegram, Zalo, SĐT) — v1.1
- Rating / đánh giá người bán — v1.2

---

## 3. User Flows

**Guest (chưa đăng nhập):**
- Vào /newfeed/ → xem bài bình thường, lọc category, tìm kiếm
- Bấm "Đăng bài" → hiện popup yêu cầu đăng nhập
- Không thể report bài

**Authenticated User:**
- Đăng nhập Google → redirect về /newfeed/
- Bấm "Đăng bài" → hiện popup đăng bài
- Bài của mình: thấy nút Xóa, không thấy Report
- Bài người khác: thấy Report, không thấy Xóa

**Admin:**
- Có tất cả quyền của user thường
- Thấy nút Xóa trên mọi bài
- Thấy và có thể unhide bài bị ẩn do ngưỡng report
- Vào admin panel → edit user → bật/tắt tick xanh

---

## 4. Database Schema

**Bảng posts:**
```
id                  BIGINT UNSIGNED PK AUTO_INCREMENT
user_id             BIGINT UNSIGNED FK → users.id
category            VARCHAR(100)
content             TEXT
price               DECIMAL(15,0) NULLABLE
image_path          VARCHAR(500) NULLABLE
is_hidden           TINYINT(1) DEFAULT 0   -- 1 = ẩn do ngưỡng report
hidden_by_admin     TINYINT(1) DEFAULT 0   -- dự phòng admin tự ẩn
report_count        INT UNSIGNED DEFAULT 0  -- cache, tăng mỗi lần có report
created_at          TIMESTAMP
deleted_at          TIMESTAMP NULLABLE      -- soft delete
```

**Bảng post_reports:**
```
id              BIGINT UNSIGNED PK
post_id         BIGINT UNSIGNED FK → posts.id
reporter_id     BIGINT UNSIGNED FK → users.id
reason          VARCHAR(255) NULLABLE
created_at      TIMESTAMP

UNIQUE KEY (post_id, reporter_id)
```

**Bổ sung bảng users:**
```
is_verified     TINYINT(1) DEFAULT 0        -- tick xanh, admin bật thủ công
google_id       VARCHAR(100) NULLABLE UNIQUE
avatar          VARCHAR(500) NULLABLE
```

**Category:** không tạo bảng động, seed cứng vào config. Danh sách gợi ý mặc định:
- Tài khoản game
- Tài khoản mạng xã hội
- Tool / phần mềm MMO
- Dịch vụ MMO
- Via / tài khoản clone
- Ví điện tử / thanh toán
- Khác

---

## 5. UI/UX Spec

**Feed chính:**
- Layout: Masonry Grid (CSS columns hoặc Masonry.js vanilla), 2 cột desktop/tablet, 1 cột mobile
- Infinite scroll: load thêm 12 bài mỗi lần, dùng Intersection Observer API
- Thanh tìm kiếm ở top, placeholder: "Tìm tài khoản, dịch vụ MMO..."
- Filter bar dạng chip/tag bên dưới search, chip "Hoạt động mới" mặc định active, hiển thị số lượng bài mỗi category
- Filter bar scroll ngang trên mobile (overflow-x: auto)
- Nút "Đăng bài" màu xanh nổi bật nằm giữa filter bar và danh sách, bám sát ảnh tham chiếu số 1
- Trên mobile: FAB fixed bottom-right

**Card bài đăng:**
- Avatar tròn + tên người đăng + tick xanh (nếu is_verified = 1) + thời gian relative
- Toàn bộ nội dung bài (không truncate cứng, Masonry tự co giãn)
- Giá hiển thị màu đỏ nổi bật nếu có, bỏ qua nếu null
- 1 ảnh width 100% card, height auto
- Like / Comment / Share ở bottom card
- Tương tác tổng góc dưới phải
- Icon cờ (Report) góc trên phải — chỉ hiện với user đã login và KHÔNG phải chủ bài
- Icon X (Xóa) góc trên phải — chỉ hiện với chủ bài hoặc admin
- Nút "Theo dõi" nếu chưa follow người đăng

**Popup yêu cầu đăng nhập (Guest):**
- Tiêu đề: "Bạn cần đăng nhập để đăng bài"
- Nội dung: hướng dẫn đăng nhập Google
- Nút "Đăng nhập với Google" (có logo Google)
- Nút "Hủy"
- Click overlay để đóng
- max-width: 480px, responsive mobile

**Popup đăng bài mới:**
- max-height: 90vh, overflow-y: auto bên trong body popup
- max-width: 600px desktop, width 100% mobile với padding 16px
- Header sticky: icon globe + "Công khai" góc trái, nút X đóng, nút "Đăng" màu xanh góc phải (disabled khi chưa điền đủ)
- Footer sticky: warning MẸO + LƯU Ý đúng như ảnh số 2

Các trường trong popup:
- Textarea nội dung (bắt buộc): placeholder "Mô tả chứa từ khóa bài đăng mới hiệu quả...", toolbar Bold/Italic/Underline
- Input giá (tùy chọn): số nguyên VNĐ
- Combobox category (bắt buộc): gõ tự do hoặc chọn từ dropdown gợi ý, cho phép nhập tên không có trong danh sách
- Upload ảnh (tùy chọn): 1 ảnh duy nhất JPG/PNG/WEBP max 5MB, preview ngay, có nút xóa
- Nút "AI tạo content": để v1.1 hoặc gắn label "Sắp ra mắt"

---

## 6. Tick xanh xác minh uy tín

- Admin vào panel → edit user → toggle is_verified, không có flow tự động
- Hiển thị: icon checkmark vòng tròn xanh cạnh tên trên card và profile
- Tooltip hover: "Tài khoản đã được CheckScam xác minh uy tín"
- Màu: đồng bộ brand color CheckScam

---

## 7. Report bài

**Quy tắc:**
- Chỉ user đã login mới report được
- Không report bài của chính mình (check server-side, trả 403 nếu vi phạm)
- Mỗi user chỉ report 1 lần / 1 bài (unique constraint DB)
- Sau khi report, icon cờ đổi trạng thái, không cho report lại

**Flow:**
1. Bấm icon cờ → mini popup xác nhận + dropdown lý do (Spam / Lừa đảo / Nội dung không phù hợp / Khác)
2. Xác nhận → POST /api/posts/{id}/report
3. Backend insert post_reports, tăng report_count
4. Nếu report_count >= ngưỡng → is_hidden = 1
5. Admin thấy bài trong dashboard bị ẩn, có thể unhide

**Ngưỡng tự ẩn:**
- Mặc định 10, config qua .env: `POST_REPORT_THRESHOLD=10`
- Admin unhide → is_hidden = 0, report_count KHÔNG reset

---

## 8. Xóa bài

- Chủ bài (user_id = auth()->id()) và Admin được xóa
- Không có nút Edit, không có endpoint PATCH/PUT cho bài đăng
- Soft delete (SoftDeletes trait Laravel)
- Dialog confirm trước khi xóa
- Remove card khỏi feed ngay (optimistic UI)

---

## 9. Authentication

- Provider duy nhất: Google OAuth 2.0 qua Laravel Socialite
- Route callback: /auth/google/callback
- Không hỗ trợ email/password, Facebook hay provider nào khác
- Lưu google_id, email, name, avatar khi lần đầu login

---

## 10. API Endpoints

```
GET    /newfeed                      -- render trang (Blade view), không cần auth
GET    /api/posts                    -- danh sách bài, phân trang, filter, search
POST   /api/posts                    -- tạo bài mới (auth required)
DELETE /api/posts/{id}               -- xóa bài (chủ bài hoặc admin)
POST   /api/posts/{id}/report        -- report bài (auth required)
GET    /auth/google                  -- redirect sang Google OAuth
GET    /auth/google/callback         -- callback
POST   /auth/logout                  -- đăng xuất (auth required)
PATCH  /admin/users/{id}/verify      -- bật/tắt tick xanh (admin only)
GET    /admin/posts/hidden           -- danh sách bài đang bị ẩn (admin only)
PATCH  /admin/posts/{id}/unhide      -- bỏ ẩn bài (admin only)
```

Query params cho GET /api/posts:
- `page` (int, default 1)
- `per_page` (int, default 12)
- `category` (string, comma-separated cho multi-filter)
- `q` (string, full-text search trong content)
- `sort` (string: newest | oldest, default newest)

---

## 11. Business Rules

- BR-01: Guest xem được toàn bộ feed, không cần login
- BR-02: Đăng bài bắt buộc login Google, không có hình thức khác
- BR-03: Không cho chỉnh sửa bài sau khi đăng
- BR-04: Mỗi bài chỉ 1 ảnh, validate server-side
- BR-05: Tick xanh chỉ admin bật được, không có flow tự đăng ký
- BR-06: Không tự report bài mình, trả 403 nếu vi phạm
- BR-07: Mỗi user chỉ report 1 lần/bài, unique constraint DB
- BR-08: Tự ẩn khi đủ ngưỡng, configurable qua .env
- BR-09: Admin unhide không reset report_count
- BR-10: Soft delete, bài xóa vẫn còn trong DB
- BR-11: Chỉ chủ bài và admin được xóa, dùng PostPolicy::delete()
- BR-12: Feed ẩn bài có is_hidden=1, admin route query riêng

---

## 12. Validation (server-side)

```
content       required | string | min:10 | max:5000
price         nullable | numeric | min:0 | max:999999999
category      required | string | max:100
image         nullable | image | mimes:jpg,jpeg,png,webp | max:5120
report.reason nullable | string | max:255
```

---

## 13. Performance

- Index: posts(created_at DESC), posts(category), posts(is_hidden), post_reports(post_id, reporter_id)
- Eager load user khi query posts, tránh N+1
- Cache danh sách category (file cache hoặc Redis, TTL 1 giờ)
- Ảnh: lưu storage/app/public/posts/ hoặc CloudFly S3 tùy config hiện tại

---

## 14. Open Questions — cần confirm trước khi build

- OQ-01: Like / Comment có trong v1.0 không? (card ảnh 1 có hiển thị số like/comment) → nếu có cần thêm bảng post_likes, post_comments
- OQ-02: Nút "Theo dõi" người bán có trong v1.0 không? → nếu có cần bảng user_follows
- OQ-03: Ảnh lưu local hay CloudFly S3? → ảnh hưởng config storage driver
- OQ-04: Có gửi email thông báo cho chủ bài khi bài bị ẩn không? → cần queue + mail template
- OQ-05: Ngưỡng report mặc định chốt là bao nhiêu? (đề xuất 10)