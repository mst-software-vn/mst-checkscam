@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Chi tiết báo cáo #CS-" . $report->id,
            "subtitle" => "Xem và xử lý báo cáo lừa đảo",
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

    <div class="row">
        {{-- Cột trái: Nội dung báo cáo --}}
        <div class="col-lg" style="flex: 0 0 62.5%; max-width: 62.5%">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Thông tin đối tượng</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Loại đối tượng</label>
                                <p class="mb-0">
                                    <strong>
                                        {{ $report->type === "account" ? "Tài khoản ngân hàng / SĐT" : "Website / URL" }}
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>STK / SĐT / URL</label>
                                <p class="mb-0"><strong class="text-danger">{{ $report->target_id }}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên chủ tài khoản</label>
                                <p class="mb-0"><strong>{{ $report->target_name ?? "—" }}</strong></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngân hàng</label>
                                <p class="mb-0"><strong>{{ $report->target_bank ?? "—" }}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phân loại lừa đảo</label>
                                <p class="mb-0"><strong>{{ $report->category ?? "Chưa phân loại" }}</strong></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngày gửi</label>
                                <p class="mb-0"><strong>{{ $report->created_at->format("d/m/Y H:i") }}</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nội dung mô tả</label>
                        <div class="bg-light rounded p-3">{{ $report->description }}</div>
                    </div>

                    {{-- Ảnh bằng chứng --}}
                    <h5 class="card-title mt-4">Ảnh bằng chứng ({{ count($report->evidence_images ?? []) }})</h5>
                    @if (! empty($report->evidence_images))
                        <div class="row">
                            @foreach ($report->evidence_images as $image)
                                <div class="col-md-3 mb-3">
                                    <a href="{{ asset("storage/" . $image) }}" target="_blank">
                                        <img
                                            src="{{ asset("storage/" . $image) }}"
                                            class="img-fluid rounded border"
                                            style="height: 120px; width: 100%; object-fit: cover"
                                            alt="Bằng chứng"
                                        />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">Không có ảnh bằng chứng.</p>
                    @endif

                    {{-- Thông tin người gửi --}}
                    <h5 class="card-title mt-4">Thông tin người gửi</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <p class="mb-0">
                                    <strong>
                                        {{ $report->is_anonymous ? "— Ẩn danh —" : $report->reporter_name ?? "—" }}
                                    </strong>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Liên hệ</label>
                                <p class="mb-0">
                                    <strong>
                                        {{ $report->is_anonymous ? "— Ẩn danh —" : ($report->reporter_contact ?: "Không cung cấp") }}
                                    </strong>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Cột phải: Thao tác --}}
        <div class="col-lg" style="flex: 0 0 37.5%; max-width: 37.5%">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Trạng thái hiện tại</h5>
                    <p>
                        @if ($report->status === "pending")
                            <span class="badges bg-lightyellow">Chờ duyệt</span>
                        @elseif ($report->status === "approved")
                            <span class="badges bg-lightgreen">Đã duyệt</span>
                        @else
                            <span class="badges bg-lightred">Từ chối</span>
                        @endif
                    </p>

                    @if ($report->rejection_reason)
                        <div class="alert alert-warning p-2">
                            <small>
                                <strong>Lý do từ chối:</strong>
                                {{ $report->rejection_reason }}
                            </small>
                        </div>
                    @endif

                    <hr />

                    <h5 class="card-title">Thao tác kiểm duyệt</h5>

                    @if ($report->status === "pending")
                        {{-- Nút mở modal Duyệt --}}
                        <button
                            type="button"
                            class="btn btn-success mb-3 w-100 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#modalApprove"
                        >
                            <i data-feather="check" class="me-1"></i>
                            Duyệt báo cáo
                        </button>

                        {{-- Nút mở modal Từ chối --}}
                        <button
                            type="button"
                            class="btn btn-cancel mb-3 w-100 py-2"
                            data-bs-toggle="modal"
                            data-bs-target="#modalReject"
                        >
                            <i data-feather="x" class="me-1"></i>
                            Từ chối báo cáo
                        </button>
                    @else
                        <div class="alert alert-secondary mb-3 p-2">
                            <small>
                                <i data-feather="lock" class="me-1" style="width: 14px"></i>
                                Báo cáo này đã được xử lý. Không thể thay đổi trạng thái kiểm duyệt.
                            </small>
                        </div>
                    @endif

                    <hr />

                    {{-- Xóa — luôn hiển thị --}}
                    <button
                        type="button"
                        class="btn btn-danger w-100"
                        data-bs-toggle="modal"
                        data-bs-target="#modalDestroy"
                    >
                        <i data-feather="trash-2" class="me-1"></i>
                        Xóa báo cáo
                    </button>
                </div>
            </div>

            {{-- Lịch sử kiểm duyệt --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lịch sử kiểm duyệt</h5>

                    @if ($moderationLogs->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table-sm table">
                                <thead>
                                    <tr>
                                        <th>Admin</th>
                                        <th>Hành động</th>
                                        <th>Lý do</th>
                                        <th>Thời gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($moderationLogs as $log)
                                        <tr>
                                            <td>{{ $log->admin->name ?? "—" }}</td>
                                            <td>
                                                @if ($log->action === "approved")
                                                    <span class="badges bg-lightgreen">Đã duyệt</span>
                                                @else
                                                    <span class="badges bg-lightred">Từ chối</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($log->action === "rejected" && $log->reason)
                                                    <small class="text-muted">{{ $log->reason }}</small>
                                                @else
                                                    <span class="text-muted">—</span>
                                                @endif
                                            </td>
                                            <td><small>{{ $log->created_at->format("d/m/Y H:i") }}</small></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted mb-0">Chưa có lịch sử kiểm duyệt.</p>
                    @endif
                </div>
            </div>

            {{-- Lịch sử đối tượng --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lịch sử đối tượng</h5>
                    <p class="text-muted mb-3">
                        <strong>{{ $report->target_name }}</strong>
                        đã bị báo cáo
                        <strong class="text-danger">{{ $reportsCount }} lần</strong>
                    </p>

                    @if ($relatedReports->isNotEmpty())
                        <div class="table-responsive">
                            <table class="table-sm table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Trạng thái</th>
                                        <th>Ngày</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($relatedReports as $related)
                                        <tr>
                                            <td>
                                                <a href="{{ route("admin.reports.detail", $related->id) }}">
                                                    #CS-{{ $related->id }}
                                                </a>
                                            </td>
                                            <td>
                                                @if ($related->status === "pending")
                                                    <span class="badges bg-lightyellow">Chờ duyệt</span>
                                                @elseif ($related->status === "approved")
                                                    <span class="badges bg-lightgreen">Đã duyệt</span>
                                                @else
                                                    <span class="badges bg-lightred">Từ chối</span>
                                                @endif
                                            </td>
                                            <td>{{ $related->created_at->format("d/m/Y") }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">Không có báo cáo liên quan khác.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- ── Modal: Xác nhận Duyệt ──────────────────────────────────── --}}
    <div class="modal fade" id="modalApprove" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden">
                <div
                    class="modal-header border-0 pb-0"
                    style="background: linear-gradient(135deg, #f0fdf4 0%, #fff 100%)"
                >
                    <div class="d-flex align-items-center w-100 gap-3 px-1 pt-1">
                        <div
                            class="d-flex align-items-center justify-content-center rounded-circle bg-success bg-opacity-10"
                            style="width: 44px; height: 44px; flex-shrink: 0"
                        >
                            <i data-feather="check-circle" style="width: 22px; height: 22px; color: #16a34a"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0">Xác nhận duyệt báo cáo</h5>
                            <small class="text-muted">Mã vụ việc: #CS-{{ $report->id }}</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body px-4 py-3">
                    <div class="rounded-3 mb-3 p-3" style="background: #f8fafc; border: 1px solid #e2e8f0">
                        <div class="d-flex justify-content-between mb-2">
                            <small class="text-muted fw-bold text-uppercase" style="letter-spacing: 0.05em">
                                Đối tượng
                            </small>
                            <small class="text-muted fw-bold text-uppercase" style="letter-spacing: 0.05em">Loại</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="text-danger">{{ $report->target_id }}</strong>
                            <span class="badge" style="background: #e0f0ff; color: #1a6fb5; font-size: 11px">
                                {{ $report->type === "account" ? "STK/SĐT" : "Website" }}
                            </span>
                        </div>
                        @if ($report->target_name)
                            <small class="text-muted d-block mt-1">{{ $report->target_name }}</small>
                        @endif
                    </div>
                    <p class="text-muted mb-0" style="font-size: 13px">
                        Sau khi duyệt, báo cáo sẽ
                        <strong>hiển thị công khai</strong>
                        trên hệ thống và
                        <strong>không thể hoàn tác</strong>
                        . Hãy chắc chắn bạn đã xem xét kỹ nội dung và bằng chứng.
                    </p>
                </div>

                <div class="modal-footer gap-2 border-0 px-4 pt-0 pb-4">
                    <button type="button" class="btn btn-cancel flex-fill" data-bs-dismiss="modal">Huỷ bỏ</button>
                    <form action="{{ route("admin.reports.approve", $report->id) }}" method="POST" class="flex-fill">
                        @csrf
                        <button type="submit" class="btn btn-success w-100">
                            <i data-feather="check" class="me-1"></i>
                            Xác nhận duyệt
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Modal: Xác nhận Từ chối ────────────────────────────────── --}}
    <div class="modal fade" id="modalReject" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden">
                <div
                    class="modal-header border-0 pb-0"
                    style="background: linear-gradient(135deg, #fff5f5 0%, #fff 100%)"
                >
                    <div class="d-flex align-items-center w-100 gap-3 px-1 pt-1">
                        <div
                            class="d-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10"
                            style="width: 44px; height: 44px; flex-shrink: 0"
                        >
                            <i data-feather="x-circle" style="width: 22px; height: 22px; color: #dc2626"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0">Từ chối báo cáo</h5>
                            <small class="text-muted">Mã vụ việc: #CS-{{ $report->id }}</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form action="{{ route("admin.reports.reject", $report->id) }}" method="POST">
                    @csrf
                    <div class="modal-body px-4 py-3">
                        <div class="rounded-3 mb-3 p-3" style="background: #f8fafc; border: 1px solid #e2e8f0">
                            <div class="d-flex justify-content-between mb-2">
                                <small class="text-muted fw-bold text-uppercase" style="letter-spacing: 0.05em">
                                    Đối tượng
                                </small>
                                <small class="text-muted fw-bold text-uppercase" style="letter-spacing: 0.05em">
                                    Loại
                                </small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <strong class="text-danger">{{ $report->target_id }}</strong>
                                <span class="badge" style="background: #e0f0ff; color: #1a6fb5; font-size: 11px">
                                    {{ $report->type === "account" ? "STK/SĐT" : "Website" }}
                                </span>
                            </div>
                            @if ($report->target_name)
                                <small class="text-muted d-block mt-1">{{ $report->target_name }}</small>
                            @endif
                        </div>

                        <div class="form-group mb-0">
                            <label class="fw-bold mb-1" style="font-size: 13px">
                                Lý do từ chối
                                <span class="text-danger">*</span>
                            </label>
                            <textarea
                                name="rejection_reason"
                                class="form-control @error("rejection_reason") is-invalid @enderror"
                                rows="3"
                                placeholder="Mô tả lý do từ chối để người dùng hiểu và có thể gửi lại đúng hơn..."
                                style="resize: none; font-size: 13px"
                            >
{{ old("rejection_reason") }}</textarea
                            >
                            @error("rejection_reason")
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                            <small class="text-muted d-block mt-1">Lý do này sẽ được lưu vào lịch sử kiểm duyệt.</small>
                        </div>
                    </div>

                    <div class="modal-footer gap-2 border-0 px-4 pt-0 pb-4">
                        <button type="button" class="btn btn-cancel flex-fill" data-bs-dismiss="modal">Huỷ bỏ</button>
                        <button type="submit" class="btn btn-danger flex-fill">
                            <i data-feather="x" class="me-1"></i>
                            Xác nhận từ chối
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ── Modal: Xác nhận Xóa ────────────────────────────────────── --}}
    <div class="modal fade" id="modalDestroy" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 16px; border: none; overflow: hidden">
                <div
                    class="modal-header border-0 pb-0"
                    style="background: linear-gradient(135deg, #fff5f5 0%, #fff 100%)"
                >
                    <div class="d-flex align-items-center w-100 gap-3 px-1 pt-1">
                        <div
                            class="d-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10"
                            style="width: 44px; height: 44px; flex-shrink: 0"
                        >
                            <i data-feather="trash-2" style="width: 22px; height: 22px; color: #dc2626"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0">Xóa báo cáo vĩnh viễn</h5>
                            <small class="text-muted">Mã vụ việc: #CS-{{ $report->id }}</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body px-4 py-3">
                    <div class="rounded-3 mb-3 p-3" style="background: #f8fafc; border: 1px solid #e2e8f0">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong class="text-danger">{{ $report->target_id }}</strong>
                            <span class="badge" style="background: #e0f0ff; color: #1a6fb5; font-size: 11px">
                                {{ $report->type === "account" ? "STK/SĐT" : "Website" }}
                            </span>
                        </div>
                        @if ($report->target_name)
                            <small class="text-muted d-block mt-1">{{ $report->target_name }}</small>
                        @endif
                    </div>
                    <p class="text-muted mb-0" style="font-size: 13px">
                        Toàn bộ dữ liệu bao gồm
                        <strong>ảnh bằng chứng</strong>
                        và
                        <strong>lịch sử kiểm duyệt</strong>
                        sẽ bị xóa vĩnh viễn. Hành động này
                        <strong class="text-danger">không thể hoàn tác</strong>
                        .
                    </p>
                </div>

                <div class="modal-footer gap-2 border-0 px-4 pt-0 pb-4">
                    <button type="button" class="btn btn-cancel flex-fill" data-bs-dismiss="modal">Huỷ bỏ</button>
                    <form action="{{ route("admin.reports.destroy", $report->id) }}" method="POST" class="flex-fill">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger w-100">
                            <i data-feather="trash-2" class="me-1"></i>
                            Xác nhận xóa
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Auto-reopen modal Từ chối nếu có validation error --}}
    @if ($errors->has("rejection_reason"))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                new bootstrap.Modal(document.getElementById('modalReject')).show();
            });
        </script>
    @endif
@endsection
