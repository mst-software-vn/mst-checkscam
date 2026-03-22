@extends('admin.layouts.master')
@section('title', 'Cài đặt Hệ thống')
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
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Tiêu đề website (Title)</label>
              <input
                type="text"
                name="site_title"
                class="form-control"
                placeholder="CheckScam.vn - Tra cứu lừa đảo"
                value="{{ $settings['site_title'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-4 col-12">
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
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Tác giả (Author)</label>
              <input
                type="text"
                name="site_author"
                class="form-control"
                placeholder="MST SOFTWARE"
                value="{{ $settings['site_author'] ?? '' }}"
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

    {{-- Thông báo & Cảnh báo --}}
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-warning">
          <i class="fas fa-bullhorn me-2"></i>
          Thông báo & Cảnh báo (Popup Home)
        </h5>
        <div class="row">
          <div class="col-12">
            <div class="form-group">
              <label>Nội dung thông báo (Hỗ trợ HTML)</label>
              <textarea
                name="site_notification_text"
                class="form-control"
                rows="3"
                placeholder="Nhập nội dung hiển thị trong popup cảnh báo..."
              >
{{ $settings['site_notification_text'] ?? '' }}</textarea
              >
              <small class="text-muted">
                Dùng thẻ &lt;span class="bg-cs_blue/10 text-cs_blue rounded px-1.5 font-bold uppercase
                italic"&gt;...&lt;/span&gt; để làm nổi bật từ khóa.
              </small>
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
          {{-- Header light --}}
          <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
              <label>Logo Header (Light)</label>
              <div class="image-upload">
                <input type="file" name="logo_header_light" id="input_logo_header_light" />
                <div class="image-uploads">
                  <img src="/assets/img/icons/upload.svg" alt="img" />
                  <h4>Tải lên</h4>
                </div>
              </div>
              <div id="preview_logo_header_light"></div>
              @if (! empty($settings['logo_header_light']))
                <div class="bg-gray-100 mt-2 rounded p-2 text-center existing-image">
                  <img
                    src="{{ asset('uploads/' . $settings['logo_header_light']) }}"
                    alt="logo"
                    class="img-fluid"
                    style="max-height: 50px"
                  />
                </div>
              @endif
            </div>
          </div>
          {{-- Header dark --}}
          <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
              <label>Logo Header (Dark)</label>
              <div class="image-upload">
                <input type="file" name="logo_header_dark" id="input_logo_header_dark" />
                <div class="image-uploads">
                  <img src="/assets/img/icons/upload.svg" alt="img" />
                  <h4>Tải lên</h4>
                </div>
              </div>
              <div id="preview_logo_header_dark"></div>
              @if (! empty($settings['logo_header_dark']))
                <div class="mt-2 rounded bg-dark p-2 text-center existing-image">
                  <img
                    src="{{ asset('uploads/' . $settings['logo_header_dark']) }}"
                    alt="logo"
                    class="img-fluid"
                    style="max-height: 50px"
                  />
                </div>
              @endif
            </div>
          </div>
          {{-- Footer light --}}
          <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
              <label>Logo Footer (Light)</label>
              <div class="image-upload">
                <input type="file" name="logo_footer_light" id="input_logo_footer_light" />
                <div class="image-uploads">
                  <img src="/assets/img/icons/upload.svg" alt="img" />
                  <h4>Tải lên</h4>
                </div>
              </div>
              <div id="preview_logo_footer_light"></div>
              @if (! empty($settings['logo_footer_light']))
                <div class="bg-gray-100 mt-2 rounded p-2 text-center existing-image">
                  <img
                    src="{{ asset('uploads/' . $settings['logo_footer_light']) }}"
                    alt="logo"
                    class="img-fluid"
                    style="max-height: 50px"
                  />
                </div>
              @endif
            </div>
          </div>
          {{-- Footer dark --}}
          <div class="col-lg-3 col-sm-6 col-12">
            <div class="form-group">
              <label>Logo Footer (Dark)</label>
              <div class="image-upload">
                <input type="file" name="logo_footer_dark" id="input_logo_footer_dark" />
                <div class="image-uploads">
                  <img src="/assets/img/icons/upload.svg" alt="img" />
                  <h4>Tải lên</h4>
                </div>
              </div>
              <div id="preview_logo_footer_dark"></div>
              @if (! empty($settings['logo_footer_dark']))
                <div class="mt-2 rounded bg-dark p-2 text-center existing-image">
                  <img
                    src="{{ asset('uploads/' . $settings['logo_footer_dark']) }}"
                    alt="logo"
                    class="img-fluid"
                    style="max-height: 50px"
                  />
                </div>
              @endif
            </div>
          </div>

          <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
              <label>Favicon</label>
              <div class="image-upload">
                <input type="file" name="favicon" id="input_favicon" />
                <div class="image-uploads">
                  <img src="/assets/img/icons/upload.svg" alt="img" />
                  <h4>Tải Favicon</h4>
                </div>
              </div>
              <div id="preview_favicon"></div>
              @if (! empty($settings['favicon']))
                <div class="mt-2 text-center existing-image">
                  <img
                    src="{{ asset('uploads/' . $settings['favicon']) }}"
                    alt="favicon"
                    class="img-fluid"
                    style="max-height: 40px"
                  />
                </div>
              @endif
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
              <label>OG Image (ảnh share)</label>
              <div class="image-upload">
                <input type="file" name="og_image" id="input_og_image" />
                <div class="image-uploads">
                  <img src="/assets/img/icons/upload.svg" alt="img" />
                  <h4>Tải OG Image</h4>
                </div>
              </div>
              <div id="preview_og_image"></div>
              @if (! empty($settings['og_image']))
                <div class="mt-2 text-center existing-image">
                  <img
                    src="{{ asset('uploads/' . $settings['og_image']) }}"
                    alt="og"
                    class="img-fluid"
                    style="max-height: 80px"
                  />
                </div>
              @endif
            </div>
          </div>
          {{-- Old Logo website (keep for compatibility or remove if not needed) --}}
          <div class="col-lg-4 col-sm-6 col-12">
            <div class="form-group">
              <label>Logo website (Mặc định)</label>
              <div class="image-upload">
                <input type="file" name="logo" id="input_logo" />
                <div class="image-uploads">
                  <img src="/assets/img/icons/upload.svg" alt="img" />
                  <h4>Tải Logo</h4>
                </div>
              </div>
              <div id="preview_logo"></div>
              @if (! empty($settings['logo']))
                <div class="mt-2 text-center border p-2 rounded existing-image">
                  <img
                    src="{{ asset('uploads/' . $settings['logo']) }}"
                    alt="logo"
                    class="img-fluid"
                    style="max-height: 60px"
                  />
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- SEO Nâng cao --}}
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-primary">
          <i class="fas fa-search-plus me-2"></i>
          Cấu hình SEO Nâng cao
        </h5>
        <div class="row">
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Google Site Verification</label>
              <input
                type="text"
                name="google_site_verification"
                class="form-control"
                placeholder="Mã xác minh Google Search Console"
                value="{{ $settings['google_site_verification'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Bing Site Verification</label>
              <input
                type="text"
                name="bing_site_verification"
                class="form-control"
                placeholder="Mã xác minh Bing Webmaster Tools"
                value="{{ $settings['bing_site_verification'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Trạng thái Index (Robots)</label>
              <select name="site_index" class="form-control">
                <option
                  value="index, follow"
                  {{ ($settings['site_index'] ?? '') == 'index, follow' ? 'selected' : '' }}
                >
                  Index, Follow (Khuyên dùng)
                </option>
                <option
                  value="noindex, follow"
                  {{ ($settings['site_index'] ?? '') == 'noindex, follow' ? 'selected' : '' }}
                >
                  Noindex, Follow
                </option>
                <option
                  value="noindex, nofollow"
                  {{ ($settings['site_index'] ?? '') == 'noindex, nofollow' ? 'selected' : '' }}
                >
                  Noindex, Nofollow (Bảo trì)
                </option>
              </select>
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="form-group">
              <label>OG Site Name (Facebook)</label>
              <input
                type="text"
                name="og_site_name"
                class="form-control"
                placeholder="CheckScam.vn"
                value="{{ $settings['og_site_name'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="form-group">
              <label>Twitter Username (X)</label>
              <input
                type="text"
                name="twitter_username"
                class="form-control"
                placeholder="@checkscam_vn"
                value="{{ $settings['twitter_username'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-12 col-12">
            <div class="form-group">
              <label>Meta Extra (Thẻ meta bổ sung)</label>
              <textarea
                name="meta_extra"
                class="form-control"
                rows="2"
                placeholder='<meta name="example" content="value">'
              >
{{ $settings['meta_extra'] ?? '' }}</textarea
              >
            </div>
          </div>
        </div>

        <hr class="my-4" />
        <h6 class="fw-bold mb-3">
          <i class="fas fa-sitemap me-2"></i>
          Schema.org Organization (Dữ liệu có cấu trúc)
        </h6>
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="form-group">
              <label>Tên tổ chức</label>
              <input
                type="text"
                name="schema_organization_name"
                class="form-control"
                value="{{ $settings['schema_organization_name'] ?? '' }}"
              />
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="form-group">
              <label>URL Logo Organization</label>
              <input
                type="text"
                name="schema_organization_logo"
                class="form-control"
                value="{{ $settings['schema_organization_logo'] ?? '' }}"
              />
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Header Scripts --}}
    <div class="card">
      <div class="card-body">
        <h5 class="card-title text-danger">
          <i class="fas fa-code me-2"></i>
          Script tùy chỉnh (Header)
        </h5>
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

@push('scripts')
  <script>
    $(document).ready(function () {
      initImagePreview('input_logo_header_light', 'preview_logo_header_light');
      initImagePreview('input_logo_header_dark', 'preview_logo_header_dark');
      initImagePreview('input_logo_footer_light', 'preview_logo_footer_light');
      initImagePreview('input_logo_footer_dark', 'preview_logo_footer_dark');
      initImagePreview('input_favicon', 'preview_favicon');
      initImagePreview('input_og_image', 'preview_og_image');
      initImagePreview('input_logo', 'preview_logo');
    });
  </script>
@endpush
