@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Quản lý người dùng",
            "subtitle" => "Quản lý tài khoản admin và moderator",
            "btnText" => "Thêm người dùng",
            "btnUrl" => route("admin.users.create"),
        ]
    )

    @if (session("success"))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session("success") }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session("error"))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session("error") }}
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
                            Xóa tài khoản đã chọn (
                            <span id="selected-count">0</span>
                            )
                        </button>
                    </div>
                </div>
            </div>

            {{-- Filter --}}
            <div class="card mb-0" id="filter_inputs">
                <div class="card-body pb-0">
                    <form method="GET" action="{{ route("admin.users.index") }}">
                        <div class="row">
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select name="role" class="select">
                                        <option value="">Tất cả vai trò</option>
                                        <option value="admin" {{ request("role") === "admin" ? "selected" : "" }}>
                                            Admin
                                        </option>
                                        <option
                                            value="moderator"
                                            {{ request("role") === "moderator" ? "selected" : "" }}
                                        >
                                            Moderator
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
                                        placeholder="Tên, username hoặc email..."
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
                                            {{ $user->id === 1 || $user->id === auth()->id() ? "disabled" : "" }}
                                        />
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->full_name ?? "—" }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role === "admin")
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
                                <td>{{ $user->created_at->format("d/m/Y") }}</td>
                                <td>
                                    <a class="me-3" href="{{ route("admin.users.edit", $user->id) }}">
                                        <img src="/assets/img/icons/edit.svg" alt="sửa" />
                                    </a>
                                    @if ($user->id !== auth()->id())
                                        <form
                                            action="{{ route("admin.users.destroy", $user->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Xác nhận xóa tài khoản {{ $user->username }}?');"
                                        >
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="border-0 bg-transparent p-0">
                                                <img src="/assets/img/icons/delete.svg" alt="xóa" />
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-muted py-4 text-center">Chưa có tài khoản nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $users->withQueryString()->links("pagination::simple-bootstrap-5") }}
            </div>
        </div>
    </div>
@endsection

@push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const selectAll = document.getElementById('select-all');
            const checkItems = document.querySelectorAll('.check-item:not(:disabled)');
            const bulkDeleteContainer = document.getElementById('bulk-delete-container');
            const selectedCountSpan = document.getElementById('selected-count');
            const btnBulkDelete = document.getElementById('btn-bulk-delete');

            function updateBulkDeleteUI() {
                const checkedCount = document.querySelectorAll('.check-item:checked:not(:disabled)').length;
                selectedCountSpan.textContent = checkedCount;

                if (checkedCount > 0) {
                    bulkDeleteContainer.style.display = 'inline-block';
                } else {
                    bulkDeleteContainer.style.display = 'none';
                    if (selectAll) selectAll.checked = false;
                }

                if (selectAll && checkItems.length > 0) {
                    if (checkedCount === checkItems.length) {
                        selectAll.checked = true;
                    } else {
                        selectAll.checked = false;
                    }
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
                    const selectedIds = Array.from(document.querySelectorAll('.check-item:checked:not(:disabled)')).map(
                        (cb) => cb.value,
                    );

                    if (selectedIds.length === 0) return;

                    Swal.fire({
                        title: 'Xóa hàng loạt tài khoản?',
                        text: `Bạn có chắc chắn muốn xóa ${selectedIds.length} tài khoản đã chọn? Hành động này không thể hoàn tác!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Có, xóa ngay!',
                        cancelButtonText: 'Hủy',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Gọi Ajax xóa
                            fetch('{{ route("admin.users.bulk-delete") }}', {
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
