@extends('admin.layouts.master')

@section('title', 'Nâng cấp phiên bản Pro - MST CheckScam')

@section('content')
  <div class="content upgrade-container">
    <!-- Header Section -->
    <div class="upgrade-header text-center">
      <h2>Nâng Cấp Phiên Bản PRO</h2>
      <p class="text-muted lead">Sở hữu toàn bộ tính năng cao cấp nhất để vận hành hệ thống CheckScam chuyên nghiệp.</p>
    </div>

    <div class="row justify-content-center g-4">
      <!-- Free Version Card -->
      <div class="col-lg-5 col-md-6">
        <div class="pricing-card">
          <h3>Bản Hiện Tại</h3>
          <div class="price">MIỄN PHÍ</div>
          <p class="text-muted small">Mọi tính năng cốt lõi để bạn bắt đầu vận hành ngay.</p>
          <hr />
          <ul class="features-list">
            <li>
              <i class="fas fa-check-circle text-success mt-1"></i>
              Tra cứu: Ngân hàng, SĐT, Facebook
            </li>
            <li>
              <i class="fas fa-check-circle text-success mt-1"></i>
              Gửi tố cáo & Upload bằng chứng
            </li>
            <li>
              <i class="fas fa-check-circle text-success mt-1"></i>
              Quản lý Bài viết & Bình luận
            </li>
            <li>
              <i class="fas fa-check-circle text-success mt-1"></i>
              Duyệt/Từ chối báo cáo từ cộng đồng
            </li>
            <li>
              <i class="fas fa-check-circle text-success mt-1"></i>
              Quản lý dữ liệu Scam trên hệ thống
            </li>
            <li>
              <i class="fas fa-check-circle text-success mt-1"></i>
              Thống kê Dashboard cơ bản
            </li>
            <li>
              <i class="fas fa-check-circle text-success mt-1"></i>
              Quỹ bảo hiểm: Quản lý thủ công
            </li>
            <li>
              <i class="fas fa-check-circle text-success mt-1"></i>
              Quản lý QC - Banner Ads tự động hóa
            </li>
            <li class="not-included">
              <i class="fas fa-times-circle text-muted mt-1"></i>
              Telegram Bot Admin (Duyệt nhanh)
            </li>
            <li class="not-included">
              <i class="fas fa-times-circle text-muted mt-1"></i>
              Hệ thống Public API (Bán Key)
            </li>
            <li class="not-included">
              <i class="fas fa-times-circle text-muted mt-1"></i>
              Auto Push báo cáo lên Channel
            </li>
            <li class="not-included">
              <i class="fas fa-times-circle text-muted mt-1"></i>
              Hệ thống Tranh Chấp (Dispute)
            </li>
          </ul>
          <button class="btn btn-outline-secondary btn-pricing w-100 disabled" disabled>Đang sử dụng</button>
        </div>
      </div>

      <!-- Pro Version Card -->
      <div class="col-lg-5 col-md-6">
        <div class="pricing-card popular">
          <div class="popular-badge">Khuyên dùng</div>
          <h3>Phiên Bản PRO</h3>
          <div class="price text-primary">LIÊN HỆ MST</div>
          <p class="text-muted small">Giải pháp toàn diện nhất dành cho các chủ Website lớn.</p>
          <hr />
          <ul class="features-list">
            <li>
              <i class="fas fa-star text-warning mt-1"></i>
              <strong>Hệ thống Public API:</strong>
              Mở cổng tra cứu cho bên thứ 3, hỗ trợ bán KEY API tích hợp.
            </li>
            <li>
              <i class="fas fa-star text-warning mt-1"></i>
              <strong>Telegram Hub:</strong>
              Duyệt bài, từ chối hoặc nhận thông báo tức thì qua Bot Telegram.
            </li>
            <li>
              <i class="fas fa-star text-warning mt-1"></i>
              <strong>Auto Push Channel:</strong>
              Tự động đẩy bài viết đã duyệt lên Telegram Channel để kéo traffic.
            </li>
            <li>
              <i class="fas fa-star text-warning mt-1"></i>
              <strong>Hệ thống Tranh Chấp:</strong>
              Quy trình xử lý đối chất giữa người báo cáo và người bị báo cáo.
            </li>
            <li>
              <i class="fas fa-star text-warning mt-1"></i>
              <strong>Logs Audit & Activity:</strong>
              Theo dõi chi tiết lịch sử mọi thao tác của Admin và Moderator.
            </li>
            <li>
              <i class="fas fa-star text-warning mt-1"></i>
              <strong>Phân quyền Nâng cao:</strong>
              Tạo không giới hạn nhóm quyền (Admin, Mod, Editor, Support).
            </li>
            <li>
              <i class="fas fa-star text-warning mt-1"></i>
              <strong>Module SEO Max:</strong>
              Tối ưu hóa Schema.org, Sitemap tự động và cấu hình SEO chi tiết.
            </li>
            <li>
              <i class="fas fa-star text-warning mt-1"></i>
              <strong>Support VIP 24/7:</strong>
              Đội ngũ kỹ thuật hỗ trợ trực tiếp qua nhóm kín Zalo/Telegram.
            </li>
          </ul>

          <div class="d-grid gap-2">
            <a
              href="https://zalo.me/0812665001"
              target="_blank"
              class="btn btn-contact-zalo btn-pricing d-flex align-items-center justify-content-center"
            >
              <i class="fab fa-whatsapp me-2"></i>
              Liên hệ qua Zalo
            </a>
            <a
              href="https://www.facebook.com/mstsoftware.vn"
              target="_blank"
              class="btn btn-contact-fb btn-pricing d-flex align-items-center justify-content-center"
            >
              <i class="fab fa-facebook-messenger me-2"></i>
              Liên hệ qua Fanpage
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Note -->
    <div class="text-center mt-5">
      <p class="text-muted small">
        Sản phẩm được bảo hành và hỗ trợ vĩnh viễn bởi
        <strong>MST SOFTWARE</strong>
        .
      </p>
    </div>
  </div>
@endsection
