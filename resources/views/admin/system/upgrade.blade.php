@extends('admin.layouts.master')
@section('title', 'Nâng cấp phiên bản Pro - MST CheckScam')

@section('content')
  <style>
    .upgrade-wrapper {
      padding: 2rem 0;
      background:
        radial-gradient(circle at top right, rgba(0, 102, 255, 0.05), transparent),
        radial-gradient(circle at bottom left, rgba(0, 102, 255, 0.05), transparent);
    }
    .upgrade-header {
      margin-bottom: 4rem;
    }
    .upgrade-header h2 {
      font-weight: 800;
      font-size: 2.5rem;
      background: linear-gradient(135deg, #1a1a1a 0%, #4a4a4a 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 1rem;
    }
    .pricing-container {
      max-width: 1140px;
      margin: 0 auto;
    }
    .pricing-card {
      background: #fff;
      border-radius: 24px;
      padding: 3rem 2rem;
      height: 100%;
      position: relative;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      border: 1px solid rgba(0, 0, 0, 0.05);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02);
      display: flex;
      flex-direction: column;
    }
    .pricing-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0, 102, 255, 0.08);
    }
    .pricing-card.free {
      background: #fafafa;
    }
    .pricing-card.pro {
      background: #1a1a1a;
      color: #fff;
      border: none;
    }
    .pricing-card.pro::before {
      content: '';
      position: absolute;
      inset: 0;
      border-radius: 24px;
      padding: 2px;
      background: linear-gradient(135deg, #0066ff, #00f2fe);
      -webkit-mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);
      mask:
        linear-gradient(#fff 0 0) content-box,
        linear-gradient(#fff 0 0);
      -webkit-mask-composite: xor;
      mask-composite: exclude;
    }
    .card-header-label {
      font-size: 0.75rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 1rem;
      display: block;
    }
    .free .card-header-label {
      color: #666;
    }
    .pro .card-header-label {
      color: #0066ff;
    }

    .price-value {
      font-size: 2.5rem;
      font-weight: 800;
      margin-bottom: 1.5rem;
      line-height: 1;
    }
    .pro .price-value {
      background: linear-gradient(135deg, #fff 0%, #aaa 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .feature-group-title {
      font-size: 0.8rem;
      font-weight: 700;
      text-transform: uppercase;
      color: #999;
      margin: 2rem 0 1rem;
      letter-spacing: 0.5px;
    }

    .features-list {
      list-style: none;
      padding: 0;
      margin: 0;
      flex-grow: 1;
    }
    .feature-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      margin-bottom: 12px;
      font-size: 0.95rem;
    }
    .feature-item i {
      font-size: 1rem;
      margin-top: 3px;
    }
    .free .feature-item i {
      color: #22c55e;
    }
    .pro .feature-item i {
      color: #0066ff;
    }
    .feature-item.locked {
      color: #999;
    }
    .feature-item.locked i {
      color: #ddd;
    }

    .btn-action {
      margin-top: 3rem;
      padding: 1.2rem;
      border-radius: 16px;
      font-weight: 700;
      font-size: 1rem;
      transition: all 0.3s ease;
      text-decoration: none;
      text-align: center;
      display: block;
    }
    .btn-current {
      background: #eee;
      color: #777;
      cursor: default;
    }
    .btn-upgrade-pro {
      background: linear-gradient(135deg, #0066ff, #00a2ff);
      color: #fff;
      box-shadow: 0 10px 20px rgba(0, 102, 255, 0.2);
    }
    .btn-upgrade-pro:hover {
      transform: scale(1.02);
      box-shadow: 0 15px 30px rgba(0, 102, 255, 0.3);
      color: #fff;
    }

    .popular-tag {
      position: absolute;
      top: -15px;
      right: 30px;
      background: linear-gradient(135deg, #0066ff, #00f2fe);
      color: #fff;
      padding: 6px 16px;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 700;
      box-shadow: 0 8px 15px rgba(0, 102, 255, 0.2);
    }

    @media (max-width: 991px) {
      .upgrade-header h2 {
        font-size: 2rem;
      }
      .pricing-card {
        padding: 2rem 1.5rem;
      }
    }
  </style>

  <div class="upgrade-wrapper">
    <div class="container animate__animated animate__fadeIn">
      <!-- Header -->
      <div class="upgrade-header text-center">
        <span class="badge bg-soft-primary text-primary px-3 py-2 mb-3">HỆ THỐNG MST CHECKS CAM V1.0</span>
        <h2>Nâng Tầm Trải Nghiệm Với Bản PRO</h2>
        <p class="text-muted mx-auto" style="max-width: 600px">
          Sẵn sàng mở rộng quy mô kinh doanh? Bản PRO cung cấp mọi công cụ tự động hóa và bảo mật mạnh mẽ nhất từ MST
          Software.
        </p>
      </div>

      <div class="pricing-container row gy-4 px-2">
        <!-- FREE CARD -->
        <div class="col-lg-6">
          <div class="pricing-card free">
            <span class="card-header-label">Standard Edition</span>
            <div class="price-value">Miễn Phí</div>
            <p class="text-muted">Cấu trúc cốt lõi để vận hành website CheckScam cơ bản.</p>

            <div class="feature-group-title">Quản lý cốt lõi</div>
            <ul class="features-list">
              <li class="feature-item">
                <i class="fas fa-check-circle"></i>
                <span>Tra cứu vạn năng (STK, SĐT, Facebook)</span>
              </li>
              <li class="feature-item">
                <i class="fas fa-check-circle"></i>
                <span>Gửi tố cáo & Quản trị Media cơ bản</span>
              </li>
              <li class="feature-item">
                <i class="fas fa-check-circle"></i>
                <span>CMS: Quản lý Bài viết & Bình luận</span>
              </li>
              <li class="feature-item">
                <i class="fas fa-check-circle"></i>
                <span>Dashboard thống kê & Search Analytics</span>
              </li>

              <div class="feature-group-title text-danger">Giới hạn phiên bản</div>
              <li class="feature-item locked">
                <i class="fas fa-lock"></i>
                <span>Telegram Admin Bot (Duyệt qua tin nhắn)</span>
              </li>
              <li class="feature-item locked">
                <i class="fas fa-lock"></i>
                <span>Hệ thống Public API (Bán Key cho bên thứ 3)</span>
              </li>
              <li class="feature-item locked">
                <i class="fas fa-lock"></i>
                <span>Auto-push Telegram Channel (Tạo traffic tự động)</span>
              </li>
              <li class="feature-item locked">
                <i class="fas fa-lock"></i>
                <span>Hệ thống Tranh Chấp & Đối chất chuyên nghiệp</span>
              </li>
            </ul>

            <div class="btn-action btn-current">Bạn đang sử dụng phiên bản này</div>
          </div>
        </div>

        <!-- PRO CARD -->
        <div class="col-lg-6">
          <div class="pricing-card pro">
            <div class="popular-tag">KHUYÊN DÙNG</div>
            <span class="card-header-label">Professional Edition</span>
            <div class="price-value">Liên Hệ</div>
            <p class="text-gray-400">Giải pháp toàn diện tối ưu hóa lợi nhuận và vận hành tự động.</p>

            <div class="feature-group-title">Đặc quyền PRO</div>
            <ul class="features-list">
              <li class="feature-item">
                <i class="fas fa-plus-circle"></i>
                <span>
                  <strong>Public API:</strong>
                  Tích hợp cổng thanh toán bán Key API
                </span>
              </li>
              <li class="feature-item">
                <i class="fas fa-plus-circle"></i>
                <span>
                  <strong>Telegram Control:</strong>
                  Duyệt báo cáo ngay trên điện thoại
                </span>
              </li>
              <li class="feature-item">
                <i class="fas fa-plus-circle"></i>
                <span>
                  <strong>Viral Automation:</strong>
                  Tự động đẩy bài lên Channel cộng đồng
                </span>
              </li>
              <li class="feature-item">
                <i class="fas fa-plus-circle"></i>
                <span>
                  <strong>Dispute Module:</strong>
                  Xử lý khiếu nại oan sai chuẩn quy trình
                </span>
              </li>
              <li class="feature-item">
                <i class="fas fa-plus-circle"></i>
                <span>
                  <strong>Audit Security:</strong>
                  Truy vết 100% lịch sử thao tác Admin
                </span>
              </li>
              <li class="feature-item">
                <i class="fas fa-plus-circle"></i>
                <span>
                  <strong>Advanced SEO:</strong>
                  Tự động tối ưu Schema.org & Meta Tags sâu
                </span>
              </li>
              <li class="feature-item">
                <i class="fas fa-plus-circle"></i>
                <span>
                  <strong>Gỡ Bỏ Trademark:</strong>
                  Tùy chỉnh thông tin Footer riêng biệt
                </span>
              </li>
              <li class="feature-item">
                <i class="fas fa-plus-circle"></i>
                <span>
                  <strong>Support VIP:</strong>
                  Nhóm hỗ trợ riêng ưu tiên 24/7
                </span>
              </li>
            </ul>

            <a href="https://zalo.me/0812665001" target="_blank" class="btn-action btn-upgrade-pro">
              Kết nối với MST Software ngay
            </a>
          </div>
        </div>
      </div>

      <!-- Trust Badges -->
      <div class="row mt-5 pt-4 text-center justify-content-center opacity-75">
        <div class="col-md-2 col-4 mb-3">
          <div class="p-2 border rounded-4">
            <i class="fas fa-shield-alt d-block mb-1 text-primary"></i>
            <span class="small font-weight-bold">Bảo Mật</span>
          </div>
        </div>
        <div class="col-md-2 col-4 mb-3">
          <div class="p-2 border rounded-4">
            <i class="fas fa-sync d-block mb-1 text-primary"></i>
            <span class="small font-weight-bold">Cập Nhật</span>
          </div>
        </div>
        <div class="col-md-2 col-4 mb-3">
          <div class="p-2 border rounded-4">
            <i class="fas fa-headset d-block mb-1 text-primary"></i>
            <span class="small font-weight-bold">Hỗ Trợ</span>
          </div>
        </div>
      </div>

      <div class="text-center mt-5">
        <p class="text-muted small mb-0">
          Thiết kế bởi
          <a href="https://mstsoftware.vn" target="_blank" class="text-primary text-decoration-none">MST SOFTWARE</a>
        </p>
      </div>
    </div>
  </div>
@endsection
