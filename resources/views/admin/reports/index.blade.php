@extends('admin.layouts.master')
@section('title', 'Danh sách Tố cáo')
@section('content')
  @include(
    'admin.components.page-header',
    [
      'title' => 'Quản lý tố cáo',
      'subtitle' => 'Duyệt và quản lý các tố cáo lừa đảo',
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
          <div class="search-input">
            <a class="btn btn-searchset"><img src="/assets/img/icons/search-white.svg" alt="img" /></a>
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
          display: {{ request()->hasAny(['status', 'type', 'time_range', 'search']) ? 'block' : 'none' }};
          border: 1px solid #e2e8f0;
          border-radius: 12px;
          box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        "
      >
        <div class="card-body p-4">
          <form method="GET" action="{{ route('admin.reports.index') }}">
            <div class="row g-3 align-items-end">
              <div class="col-lg-3 col-md-6">
                <label class="form-label fw-bold small text-muted mb-2">Trạng thái tố cáo</label>
                <select name="status" class="form-select select2-basic">
                  <option value="">Tất cả trạng thái</option>
                  <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Chờ duyệt</option>
                  <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Đã duyệt</option>
                  <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Từ chối</option>
                </select>
              </div>
              <div class="col-lg-3 col-md-6">
                <label class="form-label fw-bold small text-muted mb-2">Phân loại</label>
                <select name="type" class="form-select select2-basic">
                  <option value="">Tất cả loại</option>
                  <option value="account" {{ request('type') == 'account' ? 'selected' : '' }}>
                    Tài khoản (STK/SĐT)
                  </option>
                  <option value="website" {{ request('type') == 'website' ? 'selected' : '' }}>Website (URL)</option>
                </select>
              </div>
              <div class="col-lg-2 col-md-6">
                <label class="form-label fw-bold small text-muted mb-2">Thời gian</label>
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
                  href="{{ route('admin.reports.index') }}"
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
              <th>Loại</th>
              <th>Đối tượng</th>
              <th>Người gửi</th>
              <th>Ảnh</th>
              <th>Trạng thái</th>
              <th>Ngày gửi</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($reports as $report)
              <tr>
                <td>
                  <label class="checkboxs">
                    <input type="checkbox" class="check-item" value="{{ $report->id }}" />
                    <span class="checkmarks"></span>
                  </label>
                </td>
                <td>
                  @if ($report->type === 'account')
                    <span class="badges" style="background: #e0f0ff; color: #1a6fb5">STK/SĐT</span>
                  @else
                    <span class="badges" style="background: #f0e0ff; color: #6a1ab5">Website</span>
                  @endif
                </td>
                <td>
                  <strong>{{ $report->target_id }}</strong>
                  @if ($report->target_name)
                    <br />
                    <small class="text-muted">{{ $report->target_name }}</small>
                  @endif

                  @if ($report->target_bank)
                    <br />
                    <small class="text-muted">{{ $report->target_bank }}</small>
                  @endif
                </td>
                <td>
                  {{ $report->reporter_name ?? '—' }}
                </td>
                <td>{{ count($report->evidence_images ?? []) }} ảnh</td>
                <td>
                  @if ($report->status === 'pending')
                    <span class="badges bg-lightyellow">Chờ duyệt</span>
                  @elseif ($report->status === 'approved')
                    <span class="badges bg-lightgreen">Đã duyệt</span>
                  @else
                    <span class="badges bg-lightred">Từ chối</span>
                  @endif
                </td>
                <td>{{ $report->created_at->format('d/m/Y') }}</td>
                <td>
                  <a class="me-3" href="{{ route('admin.reports.detail', $report->id) }}">
                    <img src="/assets/img/icons/eye.svg" alt="xem" />
                  </a>
                  <button
                    type="button"
                    class="btn-delete-single border-0 bg-transparent p-0"
                    data-id="{{ $report->id }}"
                  >
                    <img src="/assets/img/icons/delete.svg" alt="xóa" />
                  </button>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="8" class="text-muted py-4 text-center">Không có tố cáo nào.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>

      {{-- Pagination --}}
      <div class="mt-3">
        {{ $reports->withQueryString()->links('pagination::bootstrap-5') }}
      </div>
    </div>
  </div>

  {{-- ── Modal: Xác nhận Xóa Hàng Loạt ────────────────────────────────── --}}
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
                báo cáo
              </h5>
              <small class="text-muted">Hành động này sẽ xóa hoàn toàn dữ liệu</small>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body px-4 py-4">
          <div class="rounded-3 mb-3 p-3 text-center" style="background: #fff5f5; border: 1px solid #fee2e2">
            <i data-feather="alert-triangle" class="text-danger mb-2" style="width: 32px; height: 32px"></i>
            <p class="text-danger fw-bold mb-0">Cảnh báo quan trọng!</p>
          </div>
          <p class="text-muted mb-0" style="font-size: 14px">
            Bạn đang thực hiện xóa hàng loạt
            <strong>
              <span id="bulk-count-text">0</span>
              bản ghi
            </strong>
            cùng toàn bộ ảnh bằng chứng đi kèm. Hành động này
            <strong class="text-danger">không thể hoàn tác</strong>
            . Bạn có chắc chắn muốn tiếp tục?
          </p>
        </div>
        <div class="modal-footer gap-2 border-0 px-4 pt-0 pb-4">
          <button type="button" class="btn btn-cancel flex-fill" data-bs-dismiss="modal">Huỷ bỏ</button>
          <button type="button" class="btn btn-danger flex-fill" id="confirm-bulk-delete">
            <i data-feather="trash-2" class="me-1"></i>
            Xác nhận xóa ngay
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- ── Modal: Xác nhận Xóa Một Bản Ghi ────────────────────────────────── --}}
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
              <h5 class="modal-title fw-bold mb-0">
                Xóa báo cáo #
                <span id="single-report-id">0</span>
              </h5>
              <small class="text-muted">Dữ liệu sẽ được gỡ bỏ vĩnh viễn</small>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body px-4 py-4">
          <div class="rounded-3 mb-3 p-3 text-center" style="background: #fff5f5; border: 1px solid #fee2e2">
            <i data-feather="alert-triangle" class="text-danger mb-2" style="width: 32px; height: 32px"></i>
            <p class="text-danger fw-bold mb-0">Xác nhận xóa!</p>
          </div>
          <p class="text-muted mb-0" style="font-size: 14px">
            Bạn có chắc chắn muốn xóa bản ghi này? Toàn bộ thông tin báo cáo và ảnh minh chứng liên quan sẽ bị
            <strong class="text-danger">xóa vĩnh viễn</strong>
            .
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

  @push('scripts')
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        // --- Logic Checkbox & Bulk Delete UI ---
        const selectAll = document.getElementById('select-all');
        const checkItems = document.querySelectorAll('.check-item');
        const bulkDeleteContainer = document.getElementById('bulk-delete-container');
        const selectedCountSpan = document.getElementById('selected-count');
        const btnBulkDelete = document.getElementById('btn-bulk-delete');

        const bulkModal = new bootstrap.Modal(document.getElementById('modalBulkDestroy'));
        const bulkCountEl = document.getElementById('bulk-count');
        const bulkCountTextEl = document.getElementById('bulk-count-text');
        const confirmBulkDeleteBtn = document.getElementById('confirm-bulk-delete');

        function updateBulkDeleteUI() {
          const checkItemsCurrent = document.querySelectorAll('.check-item');
          const checkedItems = document.querySelectorAll('.check-item:checked');
          const checkedCount = checkedItems.length;
          selectedCountSpan.textContent = checkedCount;

          if (checkedCount > 0) {
            bulkDeleteContainer.style.display = 'inline-block';
          } else {
            bulkDeleteContainer.style.display = 'none';
            if (selectAll) selectAll.checked = false;
          }

          if (selectAll) {
            selectAll.checked = checkedCount === checkItemsCurrent.length && checkItemsCurrent.length > 0;
          }
        }

        // Dùng event delegation để đảm bảo checkbox hoạt động ổn định kể cả khi bảng thay đổi
        document.addEventListener('click', function (e) {
          // Xử lý Select All
          if (e.target && e.target.id === 'select-all') {
            const isChecked = e.target.checked;
            document.querySelectorAll('.check-item').forEach((item) => {
              item.checked = isChecked;
            });
            updateBulkDeleteUI();
          }

          // Xử lý từng Check Item
          if (e.target && e.target.classList.contains('check-item')) {
            updateBulkDeleteUI();
          }
        });

        if (btnBulkDelete) {
          btnBulkDelete.addEventListener('click', function () {
            const count = document.querySelectorAll('.check-item:checked').length;
            bulkCountEl.textContent = count;
            bulkCountTextEl.textContent = count;
            bulkModal.show();
          });
        }

        if (confirmBulkDeleteBtn) {
          confirmBulkDeleteBtn.addEventListener('click', function () {
            const selectedIds = Array.from(document.querySelectorAll('.check-item:checked')).map((cb) => cb.value);

            confirmBulkDeleteBtn.disabled = true;
            confirmBulkDeleteBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Đang xử lý...';

            // Thêm delay 1s cho mượt mà theo yêu cầu
            setTimeout(() => {
              fetch('{{ route('admin.reports.bulk-delete') }}', {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({
                  ids: selectedIds,
                }),
              })
                .then((response) => response.json())
                .then((data) => {
                  if (data.success) {
                    window.location.reload();
                  } else {
                    alert(data.message || 'Có lỗi xảy ra');
                    confirmBulkDeleteBtn.disabled = false;
                    confirmBulkDeleteBtn.innerHTML = '<i data-feather="trash-2" class="me-1"></i>Xác nhận xóa ngay';
                    feather.replace();
                  }
                })
                .catch((error) => {
                  console.error('Error:', error);
                  alert('Lỗi kết nối hệ thống');
                  confirmBulkDeleteBtn.disabled = false;
                  confirmBulkDeleteBtn.innerHTML = '<i data-feather="trash-2" class="me-1"></i>Xác nhận xóa ngay';
                  feather.replace();
                });
            }, 1000);
          });
        }

        // --- Logic Xóa Một Bản Ghi ---
        const singleModalEl = document.getElementById('modalDestroySingle');
        const singleModal = new bootstrap.Modal(singleModalEl);
        const singleReportIdSpan = document.getElementById('single-report-id');
        const confirmSingleDeleteBtn = document.getElementById('confirm-single-delete');
        let currentDeleteId = null;

        document.addEventListener('click', function (e) {
          const btn = e.target.closest('.btn-delete-single');
          if (btn) {
            currentDeleteId = btn.getAttribute('data-id');
            singleReportIdSpan.textContent = currentDeleteId;
            singleModal.show();
          }
        });

        if (confirmSingleDeleteBtn) {
          confirmSingleDeleteBtn.addEventListener('click', function () {
            if (!currentDeleteId) return;

            confirmSingleDeleteBtn.disabled = true;
            confirmSingleDeleteBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Đang xóa...';

            setTimeout(() => {
              fetch(`{{ url('admin/reports') }}/${currentDeleteId}`, {
                method: 'DELETE',
                headers: {
                  'X-CSRF-TOKEN': '{{ csrf_token() }}',
                  Accept: 'application/json',
                },
              })
                .then((response) => response.json())
                .then((data) => {
                  window.location.reload();
                })
                .catch((error) => {
                  console.error('Error:', error);
                  // Laravel redirect response handling (if not returning JSON)
                  window.location.reload();
                });
            }, 1000);
          });
        }
      });
    </script>
  @endpush
@endsection
