@extends("admin.layouts.master")
@section("content")
@include("admin.components.page-header", [
"title" => "Chi tiết báo cáo #CS-" . $report->id,
"subtitle" => "Xem và xử lý báo cáo lừa đảo",
])

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif
@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<div class="row">
    {{-- Cột trái: Nội dung báo cáo --}}
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Thông tin đối tượng</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Loại đối tượng</label>
                            <p class="mb-0">
                                <strong>
                                    {{ $report->type === 'account' ? 'Tài khoản ngân hàng / SĐT' : 'Website / URL' }}
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
                            <p class="mb-0"><strong>{{ $report->target_name ?? '—' }}</strong></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ngân hàng</label>
                            <p class="mb-0"><strong>{{ $report->target_bank ?? '—' }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Phân loại lừa đảo</label>
                            <p class="mb-0"><strong>{{ $report->category ?? 'Chưa phân loại' }}</strong></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ngày gửi</label>
                            <p class="mb-0"><strong>{{ $report->created_at->format('d/m/Y H:i') }}</strong></p>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label>Nội dung mô tả</label>
                    <div class="bg-light rounded p-3">{{ $report->description }}</div>
                </div>

                {{-- Ảnh bằng chứng --}}
                <h5 class="card-title mt-4">Ảnh bằng chứng ({{ count($report->evidence_images ?? []) }})</h5>
                @if(!empty($report->evidence_images))
                <div class="row">
                    @foreach($report->evidence_images as $image)
                    <div class="col-md-3 mb-3">
                        <a href="{{ asset('storage/' . $image) }}" target="_blank">
                            <img src="{{ asset('storage/' . $image) }}" class="img-fluid rounded border"
                                style="height: 120px; width: 100%; object-fit: cover;" alt="Bằng chứng" />
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
                                    {{ $report->is_anonymous ? '— Ẩn danh —' : ($report->reporter_name ?? '—') }}
                                </strong>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Liên hệ</label>
                            <p class="mb-0">
                                <strong>
                                    {{ $report->is_anonymous ? '— Ẩn danh —' : ($report->reporter_contact ?: 'Không cung cấp') }}
                                </strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Cột phải: Thao tác --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Trạng thái hiện tại</h5>
                <p>
                    @if($report->status === 'pending')
                    <span class="badges bg-lightyellow">Chờ duyệt</span>
                    @elseif($report->status === 'approved')
                    <span class="badges bg-lightgreen">Đã duyệt</span>
                    @else
                    <span class="badges bg-lightred">Từ chối</span>
                    @endif
                </p>

                @if($report->rejection_reason)
                <div class="alert alert-warning p-2">
                    <small><strong>Lý do từ chối:</strong> {{ $report->rejection_reason }}</small>
                </div>
                @endif

                <hr />

                <h5 class="card-title">Thao tác kiểm duyệt</h5>

                {{-- Duyệt --}}
                @if($report->status !== 'approved')
                <form action="{{ route('admin.reports.approve', $report->id) }}" method="POST" class="mb-3">
                    @csrf
                    <div class="d-grid">
                        <button type="submit" class="btn btn-submit"
                            onclick="return confirm('Duyệt báo cáo #CS-{{ $report->id }}?')">
                            <i data-feather="check" class="me-1"></i> Duyệt báo cáo
                        </button>
                    </div>
                </form>
                @endif

                {{-- Từ chối --}}
                @if($report->status !== 'rejected')
                <form action="{{ route('admin.reports.reject', $report->id) }}" method="POST" class="mb-3">
                    @csrf
                    <div class="form-group mb-2">
                        <label>Lý do từ chối <span class="text-danger">*</span></label>
                        <textarea name="rejection_reason"
                            class="form-control @error('rejection_reason') is-invalid @enderror" rows="3"
                            placeholder="Nhập lý do từ chối...">{{ old('rejection_reason') }}</textarea>
                        @error('rejection_reason')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-cancel">
                            <i data-feather="x" class="me-1"></i> Từ chối
                        </button>
                    </div>
                </form>
                @endif

                <hr />

                {{-- Xóa --}}
                <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="d-grid">
                        <button type="submit" class="btn btn-danger"
                            onclick="return confirm('Xóa vĩnh viễn báo cáo #CS-{{ $report->id }}? Hành động không thể hoàn tác!')">
                            <i data-feather="trash-2" class="me-1"></i> Xóa báo cáo
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Lịch sử đối tượng --}}
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Lịch sử đối tượng</h5>
                <p class="text-muted mb-3">
                    <strong>{{ $report->target_id }}</strong> đã bị báo cáo
                    <strong class="text-danger">{{ $reportsCount }} lần</strong>
                </p>

                @if($relatedReports->isNotEmpty())
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Trạng thái</th>
                                <th>Ngày</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($relatedReports as $related)
                            <tr>
                                <td>
                                    <a
                                        href="{{ route('admin.reports.detail', $related->id) }}">#CS-{{ $related->id }}</a>
                                </td>
                                <td>
                                    @if($related->status === 'pending')
                                    <span class="badges bg-lightyellow">Chờ duyệt</span>
                                    @elseif($related->status === 'approved')
                                    <span class="badges bg-lightgreen">Đã duyệt</span>
                                    @else
                                    <span class="badges bg-lightred">Từ chối</span>
                                    @endif
                                </td>
                                <td>{{ $related->created_at->format('d/m/Y') }}</td>
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
@endsection