@extends('admin.layouts.master')
@section('title', 'Nâng cấp MST CheckScam PRO')
@section('content')
  <div class="page-header">
    <div class="page-title">
      <h4>Nâng cấp hệ thống</h4>
      <h6>Mở khóa toàn bộ sức mạnh công cụ quản lý CheckScam</h6>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-xl-10">
      <div class="upgrade-wrapper animate__animated animate__fadeIn">
        <div class="row g-4 align-items-stretch">
          <!-- Free Tier -->
          <div class="col-md-6">
            <div class="card h-100 pricing-box border-0 shadow-sm">
              <div class="card-body p-4 d-flex flex-column">
                <div class="tier-icon mb-3">
                  <div class="icon-circle bg-light-soft text-navy">
                    <i data-feather="package"></i>
                  </div>
                </div>
                <h3 class="tier-name">Phiên bản Standard</h3>
                <div class="tier-price mb-4">
                  <span class="currency">VNĐ</span>
                  <span class="amount">0</span>
                  <span class="period">/ Vĩnh viễn</span>
                </div>

                <div class="features-list-wrapper flex-grow-1">
                  <p class="feature-group-title text-muted small text-uppercase fw-bold mb-3">Tính năng cốt lõi</p>
                  <ul class="feature-list list-unstyled mb-0">
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-success me-3"></i>
                      <span>Quản lý tố cáo (Duyệt/Xóa/Sửa)</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-success me-3"></i>
                      <span>Quản lý thành viên Quỹ bảo hiểm</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-success me-3"></i>
                      <span>Hệ thống Blog, Bài viết & Hastag</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-success me-3"></i>
                      <span>Dashboard & Search Analytics cơ bản</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-success me-3"></i>
                      <span>Quản lý Banner quảng cáo đa vị trí</span>
                    </li>
                    <li class="d-flex align-items-center mb-3 opacity-50">
                      <i class="fas fa-times-circle text-muted me-3"></i>
                      <span>Telegram Hub (Duyệt qua Bot)</span>
                    </li>
                    <li class="d-flex align-items-center mb-3 opacity-50">
                      <i class="fas fa-times-circle text-muted me-3"></i>
                      <span>Auto Bot & Channel Automation</span>
                    </li>
                  </ul>
                </div>

                <div class="mt-4 pt-4 border-top">
                  <button class="btn btn-light w-100 fw-bold py-3 disabled" style="cursor: default">
                    Bản hiện tại
                  </button>
                </div>
              </div>
            </div>
          </div>

          <!-- PRO Tier -->
          <div class="col-md-6">
            <div class="card h-100 pricing-box pro-tier border-0 shadow-lg">
              <div class="card-body p-4 d-flex flex-column text-white">
                <div class="d-flex justify-content-between align-items-start mb-3">
                  <div class="tier-icon">
                    <div class="icon-circle bg-amber-gradient text-white">
                      <i class="fas fa-crown"></i>
                    </div>
                  </div>
                  <span class="badge bg-amber text-dark fw-bold rounded-pill px-3">PREMIUM</span>
                </div>

                <h3 class="tier-name text-white">Phiên bản Ultimate PRO</h3>
                <div class="tier-price mb-4">
                  <span class="currency">Liên hệ</span>
                  <span class="amount text-amber">MST Software</span>
                  <span class="period text-white-50">/ License</span>
                </div>

                <div class="features-list-wrapper flex-grow-1">
                  <p class="feature-group-title text-amber-soft small text-uppercase fw-bold mb-3">
                    Đặc quyền tối thượng
                  </p>
                  <ul class="feature-list list-unstyled mb-0">
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-amber me-3 glow-amber"></i>
                      <span>
                        <strong>Telegram Hub:</strong>
                        Thao tác ngay trên ứng dụng Chat
                      </span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-amber me-3 glow-amber"></i>
                      <span>
                        <strong>Auto Bot & Channel:</strong>
                        Push bài tự động lên nhóm
                      </span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-amber me-3 glow-amber"></i>
                      <span>
                        <strong>Public API:</strong>
                        Xây dựng cổng tra cứu cho đối tác
                      </span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-amber me-3 glow-amber"></i>
                      <span>
                        <strong>Audit Logs:</strong>
                        Truy vết toàn bộ lịch sử quản trị
                      </span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-amber me-3 glow-amber"></i>
                      <span>Hệ thống quản lý Tranh chấp nâng cao</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-amber me-3 glow-amber"></i>
                      <span>Tự động tối ưu SEO Schema & Meta Tags sâu</span>
                    </li>
                    <li class="d-flex align-items-center mb-3">
                      <i class="fas fa-check-circle text-amber me-3 glow-amber"></i>
                      <span>Gỡ bỏ Trademark MST - Brand riêng 100%</span>
                    </li>
                  </ul>
                </div>

                <div class="mt-4 pt-4 border-top border-white-10">
                  <div class="row g-2">
                    <div class="col-6">
                      <a
                        href="https://zalo.me/0812665001"
                        target="_blank"
                        class="btn btn-amber w-100 fw-bold py-3 shadow-sm"
                      >
                        <i class="fas fa-comment-dots me-2"></i>
                        Zalo
                      </a>
                    </div>
                    <div class="col-6">
                      <a
                        href="https://www.facebook.com/mstsoftware.vn"
                        target="_blank"
                        class="btn btn-outline-light w-100 fw-bold py-3"
                      >
                        <i class="fab fa-facebook me-2"></i>
                        Fanpage
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Benefits Section -->
        <div class="row mt-5">
          <div class="col-md-4">
            <div class="text-center p-3">
              <div class="mb-3 text-amber fs-2"><i class="fas fa-shield-alt"></i></div>
              <h5 class="fw-bold">Bảo Mật Tuyệt Đối</h5>
              <p class="text-muted small">Cơ sở dữ liệu được mã hóa và bảo vệ bởi MST Security.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="text-center p-3">
              <div class="mb-3 text-amber fs-2"><i class="fas fa-sync"></i></div>
              <h5 class="fw-bold">Cập Nhật Trọn Đời</h5>
              <p class="text-muted small">Luôn được ưu tiên cập nhật các module mới nhất hàng tháng.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="text-center p-3">
              <div class="mb-3 text-amber fs-2"><i class="fas fa-headset"></i></div>
              <h5 class="fw-bold">Hỗ Trợ Ưu Tiên</h5>
              <p class="text-muted small">Nhóm hỗ trợ kỹ thuật riêng dành cho khách hàng PRO.</p>
            </div>
          </div>
        </div>

        <!-- Copyright -->
        <div class="text-center mt-5 mb-3">
          <p class="text-muted small">
            Phát triển bởi
            <a href="https://mstsoftware.vn" target="_blank" class="text-amber fw-bold text-decoration-none">
              MST SOFTWARE
            </a>
          </p>
        </div>
      </div>
    </div>
  </div>

  <style>
    /* Tổng thể Wrapper */
    .upgrade-wrapper {
      padding: 0 0 40px;
    }

    /* Style chung Card */
    .pricing-box {
      border-radius: 20px;
      transition: all 0.3s ease;
    }

    .pricing-box:hover {
      transform: translateY(-5px);
    }

    /* Icon Settings */
    .icon-circle {
      width: 54px;
      height: 54px;
      border-radius: 14px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
    }

    .bg-light-soft {
      background: #f4f7f9;
    }
    .bg-amber-gradient {
      background: linear-gradient(135deg, #ff9f43 0%, #ff6b00 100%);
      box-shadow: 0 5px 15px rgba(255, 159, 67, 0.3);
    }

    /* Typography */
    .tier-name {
      font-weight: 800;
      font-size: 22px;
      margin-bottom: 5px;
      color: #1b2850;
    }

    .tier-price {
      display: flex;
      align-items: baseline;
      gap: 5px;
    }

    .tier-price .currency {
      font-size: 14px;
      font-weight: 600;
      color: #637381;
    }

    .tier-price .amount {
      font-size: 32px;
      font-weight: 900;
      color: #1b2850;
    }

    .tier-price .period {
      font-size: 14px;
      color: #777;
    }

    /* Feature List Styling */
    .feature-list li span {
      font-size: 15px;
      font-weight: 500;
    }

    .text-amber {
      color: #ff9f43 !important;
    }
    .text-amber-soft {
      color: rgba(255, 159, 67, 0.8) !important;
    }
    .bg-amber {
      background-color: #ff9f43 !important;
    }
    .text-navy {
      color: #1b2850 !important;
    }
    .border-white-10 {
      border-color: rgba(255, 255, 255, 0.1) !important;
    }

    /* PRO Tier Special Styling */
    .pro-tier {
      background: #1b2850;
      background: linear-gradient(145deg, #1b2850 0%, #151d33 100%);
    }

    .glow-amber {
      filter: drop-shadow(0 0 3px rgba(255, 159, 67, 0.8));
    }

    .btn-amber {
      background-color: #ff9f43;
      color: #fff !important;
      border: none;
    }

    .btn-amber:hover {
      background-color: #ff8c00;
      transform: scale(1.02);
    }
  </style>
@endsection
