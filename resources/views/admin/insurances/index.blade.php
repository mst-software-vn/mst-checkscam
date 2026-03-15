@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Danh sách đóng bảo hiểm",
            "subtitle" => "Quản lý danh sách các user có đóng tiền bảo hiểm",
            "btnText" => "Thêm mới QBH",
            "btnUrl" => route("admin.insurances.create"),
        ]
    )

    @if (session("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
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
                            <i data-feather="trash-2" class="me-1"></i>
                            Xóa mục đã chọn (
                            <span id="selected-count">0</span>
                            )
                        </button>
                    </div>
                </div>
            </div>

            {{-- Filter --}}
            <div class="card mb-0" id="filter_inputs">
                <div class="card-body pb-0">
                    <form method="GET" action="{{ route("admin.insurances.index") }}">
                        <div class="row">
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select name="status" class="select">
                                        <option value="">Tất cả trạng thái</option>
                                        <option value="1" {{ request("status") === "1" ? "selected" : "" }}>
                                            Hoạt động
                                        </option>
                                        <option value="0" {{ request("status") === "0" ? "selected" : "" }}>
                                            Tạm dừng
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name="search"
                                        class="form-control"
                                        placeholder="Tên người dùng..."
                                        value="{{ request("search") }}"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-filters ms-auto">
                                        <img src="/assets/img/icons/search-whites.svg" alt="img" />
                                    </button>
                                </div>
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
                            <th>Thông tin user</th>
                            <th>Số tiền bảo hiểm</th>
                            <th>Ngày tham gia</th>
                            <th>Ngày hết hạn</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($insurances as $insurance)
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox" class="check-item" value="{{ $insurance->id }}" />
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a href="javascript:void(0);" class="product-img">
                                        <img
                                            src="{{ $insurance->avatar ? asset("storage/" . $insurance->avatar) : "/assets/img/customer/customer1.jpg" }}"
                                            alt="product"
                                        />
                                    </a>
                                    <a href="{{ route("admin.insurances.edit", $insurance->id) }}">
                                        {{ $insurance->full_name }}
                                    </a>
                                </td>
                                <td>{{ number_format($insurance->amount, 0, ",", ",") }} ₫</td>
                                <td>{{ $insurance->insurance_date->format("d/m/Y") }}</td>
                                <td>{{ $insurance->expired_at ? $insurance->expired_at->format("d/m/Y") : "—" }}</td>
                                <td>
                                    @if ($insurance->isExpired())
                                        <span class="badges bg-lightred">Đã hết hạn</span>
                                    @elseif ($insurance->isExpiringSoon())
                                        <span class="badges bg-lightyellow">Sắp hết hạn</span>
                                    @elseif (! $insurance->isActive())
                                        <span class="badges bg-lightgrey">Tạm dừng</span>
                                    @else
                                        <span class="badges bg-lightgreen">Hoạt động</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="me-3" href="{{ route("admin.insurances.edit", $insurance->id) }}">
                                        <img src="/assets/img/icons/edit.svg" alt="sửa" />
                                    </a>
                                    <form
                                        action="{{ route("admin.insurances.destroy", $insurance->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Xác nhận xóa {{ $insurance->full_name }}?');"
                                    >
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="border-0 bg-transparent p-0">
                                            <img src="/assets/img/icons/delete.svg" alt="xóa" />
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-muted py-4 text-center">
                                    Chưa có thành viên bảo hiểm nào.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $insurances->withQueryString()->links("pagination::simple-bootstrap-5") }}
            </div>
        </div>
    </div>
@endsection

@push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectAll = document.getElementById('select-all');
            const checkItems = document.querySelectorAll('.check-item');
            const bulkDeleteContainer = document.getElementById('bulk-delete-container');
            const selectedCountSpan = document.getElementById('selected-count');
            const btnBulkDelete = document.getElementById('btn-bulk-delete');

            function updateBulkDeleteUI() {
                const checkedCount = document.querySelectorAll('.check-item:checked').length;
                selectedCountSpan.textContent = checkedCount;

                if (checkedCount > 0) {
                    bulkDeleteContainer.style.display = 'inline-block';
                } else {
                    bulkDeleteContainer.style.display = 'none';
                    selectAll.checked = false;
                }

                if (checkedCount === checkItems.length && checkItems.length > 0) {
                    selectAll.checked = true;
                } else {
                    selectAll.checked = false;
                }
            }

            if (selectAll) {
                selectAll.addEventListener('change', function () {
                    checkItems.forEach((item) => {
                        item.checked = selectAll.checked;
                    });
                    updateBulkDeleteUI();
                });
            }

            checkItems.forEach((item) => {
                item.addEventListener('change', updateBulkDeleteUI);
            });

            if (btnBulkDelete) {
                btnBulkDelete.addEventListener('click', function () {
                    const selectedIds = Array.from(document.querySelectorAll('.check-item:checked')).map(
                        (cb) => cb.value,
                    );

                    if (selectedIds.length === 0) return;

                    Swal.fire({
                        title: 'Xóa hàng loạt?',
                        text: `Bạn có chắc chắn muốn xóa ${selectedIds.length} mục đã chọn? Hành động này không thể hoàn tác!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Có, xóa ngay!',
                        cancelButtonText: 'Hủy',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Gọi Ajax xóa
                            fetch('{{ route("admin.insurances.bulk-delete") }}', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({ ids: selectedIds }),
                            })
                                .then((response) => response.json())
                                .then((data) => {
                                    if (data.success) {
                                        Swal.fire('Đã xóa!', data.message, 'success').then(() => {
                                            window.location.reload();
                                        });
                                    } else {
                                        Swal.fire('Lỗi!', data.message || 'Đã có lỗi xảy ra.', 'error');
                                    }
                                })
                                .catch((error) => {
                                    Swal.fire('Lỗi!', 'Không thể thực hiện yêu cầu lúc này.', 'error');
                                });
                        }
                    });
                });
            }
        });
    </script>
@endpush
