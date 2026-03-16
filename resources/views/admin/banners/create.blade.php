@extends('admin.layouts.master')
@section('title', 'Thêm Banner mới')
@section('content')
  @include(
    'admin.components.page-header',
    [
      'title' => 'Thêm banner mới',
      'subtitle' => 'Tạo banner quảng cáo hiển thị trên website',
    ]
  )

  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <ul class="mb-0">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <form method="POST" action="{{ route('admin.banners.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Thông tin banner</h5>
        <div class="row">
          <div class="col-lg-6 col-12">
            <div class="form-group">
              <label>
                Tên banner
                <span class="text-danger">*</span>
              </label>
              <input
                type="text"
                name="title"
                class="form-control"
                placeholder="VD: Vietnix Hosting Banner"
                value="{{ old('title') }}"
                required
              />
            </div>
          </div>
          <div class="col-lg-6 col-12">
            <div class="form-group">
              <label>Link chuyển hướng</label>
              <input
                type="url"
                name="redirect_url"
                class="form-control"
                placeholder="https://..."
                value="{{ old('redirect_url') }}"
              />
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>
                Vị trí hiển thị
                <span class="text-danger">*</span>
              </label>
              <select name="position" class="form-select" required>
                <option value="home_top" {{ old('position') === 'home_top' ? 'selected' : '' }}>
                  Trang chủ - Đầu trang
                </option>
                <option value="home_between" {{ old('position') === 'home_between' ? 'selected' : '' }}>
                  Trang chủ - Giữa nội dung
                </option>
                <option value="home_sidebar" {{ old('position') === 'home_sidebar' ? 'selected' : '' }}>
                  Trang chủ - Sidebar
                </option>
                <option value="scammer" {{ old('position') === 'scammer' ? 'selected' : '' }}>Trang Scammer</option>
                <option value="blog" {{ old('position') === 'blog' ? 'selected' : '' }}>Blog chi tiết</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>
                Loại banner
                <span class="text-danger">*</span>
              </label>
              <select name="type" class="form-select" required>
                <option value="horizontal" {{ old('type') === 'horizontal' ? 'selected' : '' }}>
                  Ngang (Horizontal)
                </option>
                <option value="square" {{ old('type') === 'square' ? 'selected' : '' }}>Vuông (Square)</option>
              </select>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Thứ tự sắp xếp</label>
              <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" min="0" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Thời gian & Trạng thái</h5>
        <div class="row">
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Ngày bắt đầu</label>
              <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}" />
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Ngày kết thúc</label>
              <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}" />
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>&nbsp;</label>
              <div class="status-toggle d-flex align-items-center">
                <input
                  type="checkbox"
                  name="status"
                  id="status"
                  class="check"
                  value="1"
                  {{ old('status', '1') ? 'checked' : '' }}
                />
                <label for="status" class="checktoggle"></label>
                <span class="ms-2 mb-2">Kích hoạt</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">
          Hình ảnh banner
          <span class="text-danger">*</span>
        </h5>
        <div class="image-upload">
          <input type="file" name="image" accept="image/*" required />
          <div class="image-uploads">
            <img src="/assets/img/icons/upload.svg" alt="img" />
            <h4>Tải hình ảnh banner</h4>
          </div>
        </div>
        <p class="mt-2 text-muted small">
          Định dạng: JPEG, PNG, GIF, WebP. Tối đa: 5MB.
          <br />
          Kích thước đề xuất: Ngang 950x80px, Vuông 300x300px.
        </p>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <button type="submit" class="btn btn-submit me-2">Tạo banner</button>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-cancel">Hủy</a>
      </div>
    </div>
  </form>
@endsection
