# Tài liệu Thiết kế Database - CheckScam

Tài liệu này mô tả chi tiết các bảng, trường dữ liệu và quan hệ trong cơ sở dữ liệu của hệ thống CheckScam.

---

## 1. Bảng `settings` (Cấu hình hệ thống)

Lưu trữ các cấu hình chung của website (Title, Description, Hotline, Facebook Link, v.v.)

| Key          | Type        | Nullable | Mô tả                                          |
| :----------- | :---------- | :------- | :--------------------------------------------- |
| `key`        | String (PK) | No       | Khóa định danh của cấu hình (VD: `site_title`) |
| `value`      | Text        | Yes      | Giá trị của cấu hình                           |
| `created_at` | Timestamp   | Yes      |                                                |
| `updated_at` | Timestamp   | Yes      |                                                |

---

## 2. Bảng `users` (Quản trị viên)

Lưu trữ thông tin người có quyền đăng nhập vào CMS để duyệt bài.

| Key          | Type            | Nullable | Mô tả                           |
| :----------- | :-------------- | :------- | :------------------------------ |
| `id`         | BigInt (PK)     | No       |                                 |
| `username`   | String (Unique) | No       | Tên đăng nhập                   |
| `password`   | String          | No       | Mật khẩu (đã mã hóa)            |
| `email`      | String (Unique) | No       |                                 |
| `full_name`  | String          | Yes      | Họ tên thật                     |
| `role`       | String          | No       | Quyền hạn: `admin`, `moderator` |
| `status`     | TinyInt         | No       | `1`: Active, `0`: Inactive      |
| `created_at` | Timestamp       | Yes      |                                 |
| `updated_at` | Timestamp       | Yes      |                                 |

---

## 3. Bảng `reports` (Danh sách tố cáo)

Bảng quan trọng nhất lưu trữ thông tin các vụ lừa đảo.

| Key                | Type        | Nullable | Mô tả                                                |
| :----------------- | :---------- | :------- | :--------------------------------------------------- |
| `id`               | BigInt (PK) | No       |                                                      |
| `type`             | Enum        | No       | `account` (STK/SĐT), `website` (URL)                 |
| `reporter_name`    | String      | No       | Họ tên người tố cáo                                  |
| `reporter_contact` | String      | No       | Thông tin liên hệ người tố cáo (Zalo/SĐT)            |
| `target_id`        | String      | No       | Số TK/SĐT hoặc URL website lừa đảo (Dùng để tra cứu) |
| `target_name`      | String      | Yes      | Tên chủ tài khoản hoặc Tên website                   |
| `target_bank`      | String      | Yes      | Tên ngân hàng/Ví điện tử (Dành cho `type=account`)   |
| `category`         | String      | Yes      | Phân loại (Giả mạo ngân hàng, app, cá cược...)       |
| `description`      | Text        | No       | Chi tiết sự việc                                     |
| `evidence_images`  | Text        | Yes      | Danh sách URL ảnh bằng chứng (Mỗi ảnh 1 dòng)        |
| `status`           | String      | No       | Trạng thái: `pending`, `approved`, `rejected`        |
| `rejection_reason` | String      | Yes      | Lý do admin từ chối duyệt                            |
| `view_count`       | Int         | No       | Số lượt xem bài viết (Mặc định 0)                    |
| `search_count`     | Int         | No       | Số lần bài này được tìm thấy qua thanh tra cứu       |
| `moderator_id`     | BigInt (FK) | Yes      | ID user người đã duyệt bài này                       |
| `created_at`       | Timestamp   | Yes      | Ngày đăng bài                                        |
| `updated_at`       | Timestamp   | Yes      |                                                      |

---

## 4. Bảng `comments` (Bình luận)

Lưu trữ các đóng góp ý kiến dưới mỗi bài tố cáo đã được duyệt.

| Key          | Type        | Nullable | Mô tả                       |
| :----------- | :---------- | :------- | :-------------------------- |
| `id`         | BigInt (PK) | No       |                             |
| `report_id`  | BigInt (FK) | No       | Liên kết tới bảng `reports` |
| `full_name`  | String      | No       | Tên người bình luận         |
| `content`    | Text        | No       | Nội dung bình luận          |
| `created_at` | Timestamp   | Yes      | Ngày bình luận              |

---

## 5. Bảng `insurances` (Quỹ bảo hiểm)

Lưu trữ thông tin các trung gian uy tín đóng bảo hiểm.

| Key                | Type        | Nullable | Mô tả                                                                              |
| :----------------- | :---------- | :------- | :--------------------------------------------------------------------------------- |
| `id`               | BigInt (PK) | No       |                                                                                    |
| `full_name`        | String      | No       | Họ tên người đóng bảo hiểm                                                         |
| `avatar`           | String      | Yes      | URL ảnh đại diện                                                                   |
| `amount`           | Decimal     | No       | Số tiền đặt cọc bảo hiểm                                                           |
| `insurance_date`   | Date        | No       | Ngày tham gia                                                                      |
| `contact_info`     | JSON        | Yes      | Mảng JSON: `[{"platform": "FB", "link": "..."}, ...]`                              |
| `payment_accounts` | JSON        | Yes      | Mảng JSON: `[{"bank": "VCB", "number": "123", "logo": "..."}, ...]`                |
| `services`         | JSON        | Yes      | Mảng JSON: `[{"title": "Giao dịch trung gian", "desc": "...", "icon": "fa-user"}]` |
| `status`           | TinyInt     | No       | `1`: Hoạt động, `0`: Tạm dừng                                                      |
| `slug`             | String      | No       | Đường dẫn tĩnh (VD: `vo-xuan-sang`)                                                |
| `created_at`       | Timestamp   | Yes      |                                                                                    |
| `updated_at`       | Timestamp   | Yes      |                                                                                    |

---

## 6. Bảng `posts` (Tin tức & Bài viết)

Blog chia sẻ kinh nghiệm, cảnh báo chung.

| Key           | Type            | Nullable | Mô tả                                  |
| :------------ | :-------------- | :------- | :------------------------------------- |
| `id`          | BigInt (PK)     | No       |                                        |
| `title`       | String          | No       | Tiêu đề bài viết                       |
| `slug`        | String (Unique) | No       | Đường dẫn bài viết                     |
| `description` | String          | Yes      | Mô tả ngắn / Sapo                      |
| `content`     | LongText        | No       | Nội dung chi tiết bài viết             |
| `thumbnail`   | String          | Yes      | Ảnh đại diện bài viết                  |
| `is_featured` | TinyInt         | No       | `1`: Bài viết nổi bật, `0`: Thường     |
| `view_count`  | Int             | No       | Số lượt đọc                            |
| `hashtags`    | String          | Yes      | Ví dụ: `Cảnh báo, Phishing, Ngân hàng` |
| `author_id`   | BigInt (FK)     | Yes      | Liên kết `users.id`                    |
| `created_at`  | Timestamp       | Yes      |                                        |
| `updated_at`  | Timestamp       | Yes      |                                        |

---

## 7. Bảng `search_logs` (Lịch sử tra cứu)

Lưu lại vết mỗi khi người dùng tìm kiếm để phân tích xu hướng.

| Key            | Type        | Nullable | Mô tả                                   |
| :------------- | :---------- | :------- | :-------------------------------------- |
| `id`           | BigInt (PK) | No       |                                         |
| `search_query` | String      | No       | Nội dung người dùng nhập (STK/SĐT/URL)  |
| `is_found`     | TinyInt     | No       | `1`: Tìm thấy scam, `0`: Không tìm thấy |
| `ip_address`   | String      | Yes      | IP người tìm kiếm (Chống spam)          |
| `created_at`   | Timestamp   | Yes      | Thời điểm tra cứu                       |

---

## Gói đề xuất bổ sung:

1.  **Trường `slug` trong `reports`**: Nên thêm để bài viết tố cáo có đường dẫn đẹp chuẩn SEO (`/to-cao/nguyen-van-a-lua-dao-123456`).
2.  **Bảng `banks`**: (Phụ) để admin quản lý danh sách các ngân hàng/ví điện tử hỗ trợ (Tên, Logo) phục vụ việc hiển thị ở phần "Tài khoản thanh toán" cho đồng bộ.
3.  **Logs Audit**: Thêm bảng ghi lại hoạt động của các `users` (Admin/Mod) như: Ai đã xóa bài, ai đã sửa thông tin cấu hình... để tăng tính bảo mật nội bộ.
