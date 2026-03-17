@extends('admin.layouts.master')
@section('title', 'Quản lý người dùng')
@section('content')
  <style>
    .dataTables_paginate,
    .dataTables_info,
    .dataTables_length {
      display: none !important;
    }

    .action-disabled {
      cursor: not-allowed !important;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      position: relative;
      opacity: 0.6;
    }

    .action-disabled img {
      filter: grayscale(1);
      pointer-events: none;
    }

    .action-disabled .slash-overlay {
      position: absolute;
      color: #ef4444;
      font-size: 16px;
      pointer-events: none;
      font-weight: bold;
      display: flex;
      align-items: center;
      justify-content: center;
      transform: rotate(-10deg);
    }
  </style>
  @include(
    'admin.components.page-header',
    [
      'title' => 'Quản lý người dùng',
      'subtitle' => 'Quản lý tài khoản admin và moderator',
      'btnText' => 'Thêm người dùng',
      'btnUrl' => route('admin.users.create'),
    ]
  )

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
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
          <div class="search-input">
            <a class="btn btn-searchset"><img src="/assets/img/icons/search-white.svg" alt="img" /></a>
          </div>

          <div class="d-none ms-3" id="user-bulk-delete-container">
            <button type="button" class="btn btn-danger" id="btn-bulk-delete">
              <img
                src="/assets/img/icons/delete-2.svg"
                alt="img"
                class="me-1"
                style="width: 18px; filter: brightness(0) invert(1)"
              />
              Xóa tài khoản đã chọn (
              <span id="user-selected-count">0</span>
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
          display: {{ request()->hasAny(['role', 'status', 'time_range', 'search']) ? 'block' : 'none' }};
          border: 1px solid #e2e8f0;
          border-radius: 12px;
          box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        "
      >
        <div class="card-body p-4">
          <form method="GET" action="{{ route('admin.users.index') }}">
            <div class="row g-3 align-items-end">
              <div class="col-lg-3 col-md-6">
                <label class="form-label fw-bold small text-muted mb-2">Vai trò</label>
                <select name="role" class="form-select select2-basic">
                  <option value="">Tất cả vai trò</option>
                  <option value="admin" {{ request('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                  <option value="moderator" {{ request('role') === 'moderator' ? 'selected' : '' }}>Moderator</option>
                </select>
              </div>
              <div class="col-lg-3 col-md-6">
                <label class="form-label fw-bold small text-muted mb-2">Trạng thái</label>
                <select name="status" class="form-select select2-basic">
                  <option value="">Tất cả trạng thái</option>
                  <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Hoạt động</option>
                  <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Vô hiệu</option>
                </select>
              </div>
              <div class="col-lg-2 col-md-6">
                <label class="form-label fw-bold small text-muted mb-2">Thời gian tạo</label>
                <select name="time_range" class="form-select select2-basic">
                  <option value="">Tất cả thời gian</option>
                  <option value="today" {{ request('time_range') == 'today' ? 'selected' : '' }}>Hôm nay</option>
                  <option value="3_days" {{ request('time_range') == '3_days' ? 'selected' : '' }}>
                    3 ngày gần đây
                  </option>
                  <option value="7_days" {{ request('time_range') == '7_days' ? 'selected' : '' }}>
                    7 ngày gần đây
                  </option>
                  <option value="1_month" {{ request('time_range') == '1_month' ? 'selected' : '' }}>
                    1 tháng nay
                  </option>
                </select>
              </div>
              <div class="col-lg-1 col-md-6">
                <a
                  href="{{ route('admin.users.index') }}"
                  class="btn btn-light d-flex align-items-center justify-content-center w-100 py-2"
                  style="height: 40px; border: 1px solid #d1d5db; color: #4b5563"
                  title="Xoá bộ lọc"
                >
                  <i data-feather="rotate-ccw" style="width: 16px"></i>
                </a>
              </div>
              <div class="col-lg-1 col-md-6">
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
              <th>Avatar</th>
              <th>Username</th>
              <th>Họ Tên</th>
              <th>Email</th>
              <th>Vai trò</th>
              <th>Trạng thái</th>
              <th>Ngày tạo</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($users as $user)
              <tr>
                <td>
                  <label class="checkboxs">
                    <input
                      type="checkbox"
                      class="check-item"
                      value="{{ $user->id }}"
                      {{ $user->id == 1 || $user->id == auth()->id() ? 'disabled' : '' }}
                    />
                    <span class="checkmarks"></span>
                  </label>
                </td>
                <td>
                  <div class="productimgname">
                    <a href="javascript:void(0);" class="product-img">
                      @if ($user->avatar)
                        <img
                          src="{{ asset('storage/' . $user->avatar) }}"
                          alt="avatar"
                          class="rounded-circle"
                          style="width: 40px; height: 40px"
                        />
                      @else
                        <div
                          class="d-flex align-items-center justify-content-center border rounded-circle"
                          style="width: 40px; height: 40px; background: #f8fafc; color: #ff9f43; font-weight: bold"
                        >
                          {{ strtoupper(substr($user->username, 0, 1)) }}
                        </div>
                      @endif
                    </a>
                  </div>
                </td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->full_name ?? '-' }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @if ($user->role === 'admin')
                    <span class="badges bg-lightred">Admin</span>
                  @else
                    <span class="badges bg-lightgreen">Moderator</span>
                  @endif
                </td>
                <td>
                  @if ($user->status)
                    <span class="badges bg-lightgreen">Hoạt động</span>
                  @else
                    <span class="badges bg-lightgrey">Vô hiệu</span>
                  @endif
                </td>
                <td>{{ $user->created_at->format('d/m/Y') }}</td>
                <td>
                  <a class="me-3" href="{{ route('admin.users.edit', $user->id) }}">
                    <img src="/assets/img/icons/edit.svg" alt="sửa" />
                  </a>

                  @if ($user->id != 1 && $user->id != auth()->id())
                    <button
                      type="button"
                      class="btn-delete-single border-0 bg-transparent p-0"
                      data-id="{{ $user->id }}"
                      data-username="{{ $user->username }}"
                    >
                      <img src="/assets/img/icons/delete.svg" alt="xóa" />
                    </button>
                  @else
                    <span class="action-disabled" title="Tài khoản này được bảo vệ, không thể xóa">
                      <img src="/assets/img/icons/delete.svg" alt="xóa" />
                      <i class="fas fa-slash slash-overlay"></i>
                    </span>
                  @endif
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="9" class="text-muted py-4 text-center">Chưa có tài khoản nào.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- Pagination --}}
      <div class="mt-3">
        {{ $users->withQueryString()->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // --- Logic Checkbox & Bulk Delete UI ---
      function updateBulkDeleteUI() {
        const $container = $('#user-bulk-delete-container');
        const $count = $('#user-selected-count');
        const $checkItems = $('.check-item:not(:disabled)');
        const checkedCount = $('.check-item:checked').length;

        if ($count.length) $count.text(checkedCount);

        if (checkedCount > 0) {
          $container.removeClass('d-none').addClass('d-inline-block');
          $container.attr('style', 'display: inline-block !important; margin-left: 1rem;');
        } else {
          $container.addClass('d-none').removeClass('d-inline-block');
          $container.attr('style', 'display: none !important');
          $('#select-all').prop('checked', false);
        }

        if ($('#select-all').length) {
          // Chỉ check "Select All" nếu toàn bộ số lượng checkbox (không bị disable) đều được chọn
          $('#select-all').prop('checked', checkedCount === $checkItems.length && $checkItems.length > 0);
        }
      }

      // Khởi tạo trạng thái ban đầu
      updateBulkDeleteUI();

      // Dùng jQuery event delegation để ổn định và bắt kịp DataTables
      $(document).on('change', '#select-all', function () {
        const isChecked = $(this).is(':checked');
        $('.check-item:not(:disabled)').prop('checked', isChecked);
        updateBulkDeleteUI();
      });

      $(document).on('change click', '.check-item', function () {
        updateBulkDeleteUI();
      });

      // --- Logic Xóa Hàng Loạt với SweetAlert2 ---
      $(document).on('click', '#btn-bulk-delete', function () {
        const selectedIds = $('.check-item:checked')
          .map(function () {
            return $(this).val();
          })
          .get();
        const count = selectedIds.length;

        Swal.fire({
          title: 'Xóa hàng loạt?',
          text: `Bạn có chắc chắn muốn xóa ${count} tài khoản đã chọn? Hành động này không thể hoàn tác!`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#ff9f43',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý xóa',
          cancelButtonText: 'Hủy',
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              title: 'Đang xử lý...',
              allowOutsideClick: false,
              didOpen: () => {
                Swal.showLoading();
              },
            });

            fetch('{{ route('admin.users.bulk-delete') }}', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest',
              },
              body: JSON.stringify({
                ids: selectedIds,
              }),
            })
              .then((response) => response.json())
              .then((data) => {
                if (data.success) {
                  Swal.fire({
                    title: 'Thành công!',
                    text: data.message,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false,
                  }).then(() => {
                    window.location.reload();
                  });
                } else {
                  Swal.fire('Lỗi!', data.message || 'Có lỗi xảy ra', 'error');
                }
              })
              .catch((error) => {
                Swal.fire('Lỗi!', 'Lỗi kết nối hệ thống', 'error');
              });
          }
        });
      });

      // --- Logic Xóa Một Bản Ghi với SweetAlert2 ---
      $(document).on('click', '.btn-delete-single', function () {
        const userId = $(this).data('id');
        const username = $(this).data('username');

        Swal.fire({
          title: 'Xác nhận xóa?',
          html: `Bạn có chắc chắn muốn xóa tài khoản <strong>${username}</strong> (ID: #${userId})?`,
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#ff9f43',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý xóa',
          cancelButtonText: 'Hủy',
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire({
              title: 'Đang xóa...',
              allowOutsideClick: false,
              didOpen: () => {
                Swal.showLoading();
              },
            });

            fetch(`{{ url('admin/users') }}/${userId}`, {
              method: 'DELETE',
              headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
              },
            })
              .then((response) => response.json())
              .then((data) => {
                if (data.success) {
                  Swal.fire({
                    title: 'Thành công!',
                    text: data.message,
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false,
                  }).then(() => {
                    window.location.reload();
                  });
                } else {
                  Swal.fire('Lỗi!', data.message || 'Có lỗi xảy ra', 'error');
                }
              })
              .catch((error) => {
                Swal.fire('Lỗi!', 'Lỗi khi thực hiện xóa', 'error');
              });
          }
        });
      });
    });
  </script>
@endpush
