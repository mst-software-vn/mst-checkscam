@extends('admin.layouts.master')
@section('content')
  @include(
    'admin.components.page-header',
    [
      'title' => 'Cài đặt hệ thống',
      'subtitle' => 'Thiết lập thông tin chung cho website',
    ]
  )

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
    @csrf

    {{-- SEO & Thông tin website --}}
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">SEO & Thông tin website</h5>
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="form-group">
              <label>Tiêu đề website (Title)</label>
              <input
                type="text"
                name="site_title"
                class="form-control"
                placeholder="CheckScam.vn — Tra cứu lừa đảo"
                value="{{ $settings['site_title'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="form-group">
              <label>SEO Keywords</label>
              <input
                type="text"
                name="seo_keywords"
                class="form-control"
                placeholder="checkscam, lừa đảo, scam, kiểm tra..."
                value="{{ $settings['seo_keywords'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-12 col-12">
            <div class="form-group">
              <label>Mô tả Website (Meta Description)</label>
              <textarea name="site_description" class="form-control" rows="3" placeholder="Mô tả ngắn gọn cho SEO...">
        {{ $settings['site_description'] ?? '' }}</textarea
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    {{-- Thông tin liên hệ --}}
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Thông tin liên hệ</h5>
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="form-group">
              <label>Hotline</label>
              <input
                type="text"
                name="hotline"
                class="form-control"
                placeholder="0923.xxx.xxx"
                value="{{ $settings['hotline'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="form-group">
              <label>Email hỗ trợ</label>
              <input
                type="text"
                name="support_email"
                class="form-control"
                placeholder="support@checkscam.vn"
                value="{{ $settings['support_email'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Link Zalo</label>
              <input
                type="text"
                name="zalo_link"
                class="form-control"
                placeholder="https://zalo.me/..."
                value="{{ $settings['zalo_link'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Link Facebook</label>
              <input
                type="text"
                name="facebook_link"
                class="form-control"
                placeholder="https://facebook.com/..."
                value="{{ $settings['facebook_link'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Link Telegram</label>
              <input
                type="text"
                name="telegram_link"
                class="form-control"
                placeholder="https://t.me/..."
                value="{{ $settings['telegram_link'] ?? '' }}"
              />
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Toggle Modules --}}
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Bật / Tắt chức năng</h5>
        <div class="row">
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <div class="status-toggle d-flex align-items-center">
                <input
                  type="checkbox"
                  name="enable_insurance"
                  id="enable_insurance"
                  class="check"
                  value="1"
                  {{ ($settings['enable_insurance'] ?? '1') === '1' ? 'checked' : '' }}
                />
                <label for="enable_insurance" class="checktoggle"></label>
                <span class="ms-2 mb-2">Module Bảo hiểm</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <div class="status-toggle d-flex align-items-center">
                <input
                  type="checkbox"
                  name="enable_comments"
                  id="enable_comments"
                  class="check"
                  value="1"
                  {{ ($settings['enable_comments'] ?? '1') === '1' ? 'checked' : '' }}
                />
                <label for="enable_comments" class="checktoggle"></label>
                <span class="ms-2 mb-2">Bình luận</span>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <div class="status-toggle d-flex align-items-center">
                <input
                  type="checkbox"
                  name="maintenance_mode"
                  id="maintenance_mode"
                  class="check"
                  value="1"
                  {{ ($settings['maintenance_mode'] ?? '0') === '1' ? 'checked' : '' }}
                />
                <label for="maintenance_mode" class="checktoggle"></label>
                <span class="ms-2 mb-2">Chế độ bảo trì</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Upload logo / favicon / OG --}}
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Logo & Hình ảnh</h5>
        <div class="row">
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Logo website</label>
              <div class="image-upload">
                <input type="file" name="logo" />
                <div class="image-uploads">
                  <img src="/assets/img/icons/upload.svg" alt="img" />
                  <h4>Tải Logo</h4>
                </div>
              </div>
              @if (! empty($settings['logo']))
                <div class="mt-2 text-center">
                  <img
                    src="{{ asset('storage/' . $settings['logo']) }}"
                    alt="logo"
                    class="img-fluid"
                    style="max-height: 60px"
                  />
                </div>
              @endif
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Favicon</label>
              <div class="image-upload">
                <input type="file" name="favicon" />
                <div class="image-uploads">
                  <img src="/assets/img/icons/upload.svg" alt="img" />
                  <h4>Tải Favicon</h4>
                </div>
              </div>
              @if (! empty($settings['favicon']))
                <div class="mt-2 text-center">
                  <img
                    src="{{ asset('storage/' . $settings['favicon']) }}"
                    alt="favicon"
                    class="img-fluid"
                    style="max-height: 40px"
                  />
                </div>
              @endif
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>OG Image (ảnh share)</label>
              <div class="image-upload">
                <input type="file" name="og_image" />
                <div class="image-uploads">
                  <img src="/assets/img/icons/upload.svg" alt="img" />
                  <h4>Tải OG Image</h4>
                </div>
              </div>
              @if (! empty($settings['og_image']))
                <div class="mt-2 text-center">
                  <img
                    src="{{ asset('storage/' . $settings['og_image']) }}"
                    alt="og"
                    class="img-fluid"
                    style="max-height: 80px"
                  />
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Header Scripts --}}
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Script tùy chỉnh (Header)</h5>
        <div class="form-group">
          <label>Chèn mã vào &lt;head&gt; (VD: Google Analytics, Facebook Pixel...)</label>
          <textarea name="header_scripts" class="form-control" rows="5" placeholder="<!-- Google tag (gtag.js) -->">
        {{ $settings['header_scripts'] ?? '' }}</textarea
          >
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <button type="submit" class="btn btn-submit me-2">Lưu cài đặt</button>
      </div>
    </div>
  </form>
@endsection
