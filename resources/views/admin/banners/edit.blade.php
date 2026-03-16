@extends('admin.layouts.master')
@section('title', 'Chỉnh sửa Banner')
@section('content')
  @include(
    'admin.components.page-header',
    [
      'title' => 'Chỉnh sửa banner',
      'subtitle' => 'Cập nhật thông tin banner quảng cáo',
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

  <form method="POST" action="{{ route('admin.banners.update', $banner->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

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
                value="{{ old('title', $banner->title) }}"
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
                value="{{ old('redirect_url', $banner->redirect_url) }}"
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
                <option value="home_top" {{ old('position', $banner->position) === 'home_top' ? 'selected' : '' }}>
                  Trang chủ - Đầu trang
                </option>
                <option
                  value="home_between"
                  {{ old('position', $banner->position) === 'home_between' ? 'selected' : '' }}
                >
                  Trang chủ - Giữa nội dung
                </option>
                <option
                  value="home_sidebar"
                  {{ old('position', $banner->position) === 'home_sidebar' ? 'selected' : '' }}
                >
                  Trang chủ - Sidebar
                </option>
                <option value="scammer" {{ old('position', $banner->position) === 'scammer' ? 'selected' : '' }}>
                  Trang Scammer
                </option>
                <option value="blog" {{ old('position', $banner->position) === 'blog' ? 'selected' : '' }}>
                  Blog chi tiết
                </option>
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
                <option value="horizontal" {{ old('type', $banner->type) === 'horizontal' ? 'selected' : '' }}>
                  Ngang (Horizontal)
                </option>
                <option value="square" {{ old('type', $banner->type) === 'square' ? 'selected' : '' }}>
                  Vuông (Square)
                </option>
              </select>
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Thứ tự sắp xếp</label>
              <input
                type="number"
                name="sort_order"
                class="form-control"
                value="{{ old('sort_order', $banner->sort_order) }}"
                min="0"
              />
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
              <input
                type="date"
                name="start_date"
                class="form-control"
                value="{{ old('start_date', $banner->start_date?->format('Y-m-d')) }}"
              />
            </div>
          </div>
          <div class="col-lg-4 col-12">
            <div class="form-group">
              <label>Ngày kết thúc</label>
              <input
                type="date"
                name="end_date"
                class="form-control"
                value="{{ old('end_date', $banner->end_date?->format('Y-m-d')) }}"
              />
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
                  {{ old('status', $banner->status) ? 'checked' : '' }}
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
        <h5 class="card-title">Hình ảnh banner</h5>
        @if ($banner->image_path)
          <div class="mb-3">
            <img
              src="{{ Str::startsWith($banner->image_path, ['http://', 'https://']) ? $banner->image_path : asset('storage/' . $banner->image_path) }}"
              alt="{{ $banner->title }}"
              class="img-fluid rounded"
              style="max-height: 120px"
            />
          </div>
        @endif

        <div class="image-upload">
          <input type="file" name="image" accept="image/*" />
          <div class="image-uploads">
            <img src="/assets/img/icons/upload.svg" alt="img" />
            <h4>Thay đổi hình ảnh</h4>
          </div>
        </div>
        <p class="mt-2 text-muted small">Để trống nếu không muốn thay đổi hình ảnh.</p>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <button type="submit" class="btn btn-submit me-2">Cập nhật</button>
        <a href="{{ route('admin.banners.index') }}" class="btn btn-cancel">Hủy</a>
      </div>
    </div>
  </form>
@endsection
