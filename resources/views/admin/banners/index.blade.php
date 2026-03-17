@extends('admin.layouts.master')
@section('title', 'Danh sách Banner quảng cáo')
@section('content')
  @include(
    'admin.components.page-header',
    [
      'title' => 'Quản lý Banner Quảng cáo',
      'subtitle' => 'Quản lý banner hiển thị trên website',
      'btnText' => 'Thêm banner',
      'btnUrl' => route('admin.banners.create'),
    ]
  )

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  <div class="card">
    <div class="card-body">
      <div class="table-top">
        <div class="search-set">
          <div class="search-path">
            <a class="btn btn-filter" id="filter_search">
              <img src="/assets/img/icons/filter.svg" alt="img" />
              <span><img src="/assets/img/icons/closes.svg" alt="img" /></span>
            </a>
          </div>
          <div class="ms-3" style="display: none" id="bulk-delete-container">
            <button type="button" class="btn btn-danger" id="btn-bulk-delete">
              <img
                src="/assets/img/icons/delete-2.svg"
                alt="img"
                class="me-1"
                style="width: 18px; filter: brightness(0) invert(1)"
              />
              Xóa mục đã chọn (
              <span id="selected-count">0</span>
              )
            </button>
          </div>
        </div>
      </div>

      {{-- Filter Section --}}
      <div
        class="card mb-3"
        id="filter_inputs"
        style="
          display: {{ request()->hasAny(['position', 'status']) ? 'block' : 'none' }};
          border: 1px solid #e2e8f0;
          border-radius: 12px;
          box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        "
      >
        <div class="card-body p-4">
          <form method="GET" action="{{ route('admin.banners.index') }}">
            <div class="row g-3 align-items-end">
              <div class="col-lg-3 col-md-6">
                <label class="form-label fw-bold small text-muted mb-2">Vị trí</label>
                <select name="position" class="form-select">
                  <option value="">Tất cả</option>
                  <option value="home_top" {{ request('position') === 'home_top' ? 'selected' : '' }}>
                    Trang chủ - Đầu trang
                  </option>
                  <option value="home_between" {{ request('position') === 'home_between' ? 'selected' : '' }}>
                    Trang chủ - Giữa nội dung
                  </option>
                  <option value="home_sidebar" {{ request('position') === 'home_sidebar' ? 'selected' : '' }}>
                    Trang chủ - Sidebar
                  </option>
                  <option value="scammer" {{ request('position') === 'scammer' ? 'selected' : '' }}>
                    Trang Scammer
                  </option>
                  <option value="blog" {{ request('position') === 'blog' ? 'selected' : '' }}>Blog chi tiết</option>
                </select>
              </div>
              <div class="col-lg-3 col-md-6">
                <label class="form-label fw-bold small text-muted mb-2">Trạng thái</label>
                <select name="status" class="form-select">
                  <option value="">Tất cả</option>
                  <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Đang chạy</option>
                  <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Tạm dừng</option>
                </select>
              </div>
              <div class="col-lg-1 col-md-3 col-6">
                <a
                  href="{{ route('admin.banners.index') }}"
                  class="btn btn-light d-flex align-items-center justify-content-center w-100 py-2"
                  style="height: 40px; border: 1px solid #d1d5db; color: #4b5563"
                  title="Xoá bộ lọc"
                >
                  <i data-feather="rotate-ccw" style="width: 16px"></i>
                </a>
              </div>
              <div class="col-lg-1 col-md-3 col-6">
                <button
                  type="submit"
                  class="btn btn-primary d-flex align-items-center justify-content-center w-100 py-2"
                  style="height: 40px; background: #ff9f43; border-color: #ff9f43"
                  title="Lọc dữ liệu"
                >
                  <i data-feather="filter" style="width: 16px"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

      {{-- Table --}}
      <div class="table-responsive">
        <table class="datanew table">
          <thead>
            <tr>
              <th>
                <label class="checkboxs">
                  <input type="checkbox" id="select-all" />
                  <span class="checkmarks"></span>
                </label>
              </th>
              <th>Banner</th>
              <th>Vị trí</th>
              <th>Loại</th>
              <th>Thời gian</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($banners as $banner)
              <tr>
                <td>
                  <label class="checkboxs">
                    <input type="checkbox" class="check-item" value="{{ $banner->id }}" />
                    <span class="checkmarks"></span>
                  </label>
                </td>
                <td class="productimgname">
                  <a href="{{ route('admin.banners.edit', $banner->id) }}" class="product-img">
                    <img
                      src="{{ Str::startsWith($banner->image_path, ['http://', 'https://']) ? $banner->image_path : asset('storage/' . $banner->image_path) }}"
                      alt="{{ $banner->title }}"
                    />
                  </a>
                  <a href="{{ route('admin.banners.edit', $banner->id) }}">
                    {{ Str::limit($banner->title, 40) }}
                  </a>
                </td>
                <td>
                  @php
                    $positionLabels = [
                      'home_top' => 'Trang chủ - Top',
                      'home_between' => 'Trang chủ - Giữa',
                      'home_sidebar' => 'Sidebar',
                      'scammer' => 'Trang Scammer',
                      'blog' => 'Blog',
                    ];
                  @endphp

                  <span class="badges bg-lightgrey">
                    {{ $positionLabels[$banner->position] ?? $banner->position }}
                  </span>
                </td>
                <td>
                  <span class="badges {{ $banner->type === 'horizontal' ? 'bg-lightblue' : 'bg-lightyellow' }}">
                    {{ $banner->type === 'horizontal' ? 'Ngang' : 'Vuông' }}
                  </span>
                </td>
                <td>
                  @if ($banner->start_date || $banner->end_date)
                    <small>
                      {{ $banner->start_date?->format('d/m/Y') ?? '-' }}
                      →
                      {{ $banner->end_date?->format('d/m/Y') ?? '∞' }}
                    </small>
                  @else
                    <small class="text-muted">Không giới hạn</small>
                  @endif
                </td>
                <td>
                  <div class="status-toggle d-flex justify-content-center align-items-center">
                    <form method="POST" action="{{ route('admin.banners.toggle', $banner->id) }}">
                      @csrf
                      <input
                        type="checkbox"
                        class="check"
                        id="status_{{ $banner->id }}"
                        {{ $banner->status ? 'checked' : '' }}
                        onchange="this.form.submit()"
                      />
                      <label for="status_{{ $banner->id }}" class="checktoggle"></label>
                    </form>
                  </div>
                </td>
                <td>
                  <a class="me-3" href="{{ route('admin.banners.edit', $banner->id) }}">
                    <img src="/assets/img/icons/edit.svg" alt="sửa" />
                  </a>
                  <button
                    type="button"
                    class="btn-delete-single border-0 bg-transparent p-0"
                    data-id="{{ $banner->id }}"
                    data-name="{{ $banner->title }}"
                  >
                    <img src="/assets/img/icons/delete.svg" alt="xóa" />
                  </button>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="7" class="text-muted py-4 text-center">Chưa có banner nào.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- Pagination --}}
      <div class="mt-3">
        {{ $banners->withQueryString()->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>

  {{-- Modal: Xóa Hàng Loạt --}}
  <div class="modal fade" id="modalBulkDestroy" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden">
        <div class="modal-header border-0 pb-0" style="background: linear-gradient(135deg, #fff5f5 0%, #fff 100%)">
          <div class="d-flex align-items-center w-100 gap-3 px-1 pt-1">
            <div
              class="d-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10"
              style="width: 44px; height: 44px; flex-shrink: 0"
            >
              <i data-feather="trash-2" style="width: 22px; height: 22px; color: #dc2626"></i>
            </div>
            <div>
              <h5 class="modal-title fw-bold mb-0">
                Xóa hàng loạt
                <span id="bulk-count">0</span>
                banner
              </h5>
              <small class="text-muted">Hành động này sẽ xóa hoàn toàn dữ liệu</small>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body px-4 py-4">
          <p class="text-muted mb-0" style="font-size: 14px">
            Bạn đang thực hiện xóa
            <strong>
              <span id="bulk-count-text">0</span>
              banner
            </strong>
            . Hành động này
            <strong class="text-danger">không thể hoàn tác</strong>
            .
          </p>
        </div>
        <div class="modal-footer gap-2 border-0 px-4 pt-0 pb-4">
          <button type="button" class="btn btn-cancel flex-fill" data-bs-dismiss="modal">Huỷ bỏ</button>
          <button type="button" class="btn btn-danger flex-fill" id="confirm-bulk-delete">
            <i data-feather="trash-2" class="me-1"></i>
            Xác nhận xóa
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- Modal: Xóa Một Banner --}}
  <div class="modal fade" id="modalDestroySingle" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden">
        <div class="modal-header border-0 pb-0" style="background: linear-gradient(135deg, #fff5f5 0%, #fff 100%)">
          <div class="d-flex align-items-center w-100 gap-3 px-1 pt-1">
            <div
              class="d-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10"
              style="width: 44px; height: 44px; flex-shrink: 0"
            >
              <i data-feather="trash-2" style="width: 22px; height: 22px; color: #dc2626"></i>
            </div>
            <div>
              <h5 class="modal-title fw-bold mb-0">Xóa banner</h5>
              <small class="text-muted">Dữ liệu sẽ được gỡ bỏ vĩnh viễn</small>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body px-4 py-4">
          <p class="text-muted mb-0" style="font-size: 14px">
            Bạn có chắc chắn muốn xóa banner:
            <strong id="single-banner-title"></strong>
            ?
          </p>
        </div>
        <div class="modal-footer gap-2 border-0 px-4 pt-0 pb-4">
          <button type="button" class="btn btn-cancel flex-fill" data-bs-dismiss="modal">Huỷ bỏ</button>
          <button type="button" class="btn btn-danger flex-fill" id="confirm-single-delete">
            <i data-feather="trash-2" class="me-1"></i>
            Xác nhận xóa
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const selectAll = document.getElementById('select-all');
      const bulkDeleteContainer = document.getElementById('bulk-delete-container');
      const selectedCountSpan = document.getElementById('selected-count');
      const btnBulkDelete = document.getElementById('btn-bulk-delete');
      const bulkModalEl = document.getElementById('modalBulkDestroy');
      const bulkModal = new bootstrap.Modal(bulkModalEl);
      const confirmBulkDeleteBtn = document.getElementById('confirm-bulk-delete');

      function updateBulkDeleteUI() {
        const checkItems = document.querySelectorAll('.check-item');
        const checkedItems = document.querySelectorAll('.check-item:checked');
        selectedCountSpan.textContent = checkedItems.length;
        bulkDeleteContainer.style.display = checkedItems.length > 0 ? 'inline-block' : 'none';
        if (selectAll) selectAll.checked = checkedItems.length === checkItems.length && checkItems.length > 0;
      }

      document.addEventListener('click', function (e) {
        if (e.target && e.target.id === 'select-all') {
          document.querySelectorAll('.check-item').forEach((item) => (item.checked = e.target.checked));
          updateBulkDeleteUI();
        }
        if (e.target && e.target.classList.contains('check-item')) updateBulkDeleteUI();
      });

      if (btnBulkDelete) {
        btnBulkDelete.addEventListener('click', function () {
          const count = document.querySelectorAll('.check-item:checked').length;
          document.getElementById('bulk-count').textContent = count;
          document.getElementById('bulk-count-text').textContent = count;
          bulkModal.show();
        });
      }

      if (confirmBulkDeleteBtn) {
        confirmBulkDeleteBtn.addEventListener('click', function () {
          const selectedIds = Array.from(document.querySelectorAll('.check-item:checked')).map((cb) => cb.value);
          confirmBulkDeleteBtn.disabled = true;
          confirmBulkDeleteBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Đang xử lý...';
          fetch('{{ route('admin.banners.bulk-delete') }}', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            body: JSON.stringify({ ids: selectedIds }),
          })
            .then(() => window.location.reload())
            .catch(() => window.location.reload());
        });
      }

      // Single delete
      const singleModal = new bootstrap.Modal(document.getElementById('modalDestroySingle'));
      let currentDeleteId = null;
      document.addEventListener('click', function (e) {
        const btn = e.target.closest('.btn-delete-single');
        if (btn) {
          currentDeleteId = btn.getAttribute('data-id');
          document.getElementById('single-banner-title').textContent = btn.getAttribute('data-name');
          singleModal.show();
        }
      });

      document.getElementById('confirm-single-delete')?.addEventListener('click', function () {
        if (!currentDeleteId) return;
        this.disabled = true;
        this.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Đang xóa...';
        fetch(`{{ url('admin/banners') }}/${currentDeleteId}`, {
          method: 'DELETE',
          headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', Accept: 'application/json' },
        })
          .then(() => window.location.reload())
          .catch(() => window.location.reload());
      });
    });
  </script>
@endpush
