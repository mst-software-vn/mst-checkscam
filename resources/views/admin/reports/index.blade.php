@extends("admin.layouts.master")
@section("content")
@include("admin.components.page-header", [
"title" => "Quản lý báo cáo",
"subtitle" => "Duyệt và quản lý các báo cáo lừa đảo",
])

@if(session('success'))
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
            </div>
        </div>

        {{-- Filter --}}
        <div class="card mb-0" id="filter_inputs">
            <div class="card-body pb-0">
                <form method="GET" action="{{ route('admin.reports.index') }}">
                    <div class="row">
                        <div class="col-lg col-sm-6 col-12">
                            <div class="form-group">
                                <select name="status" class="select">
                                    <option value="">Tất cả trạng thái</option>
                                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Chờ
                                        duyệt</option>
                                    <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Đã
                                        duyệt</option>
                                    <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Từ
                                        chối</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg col-sm-6 col-12">
                            <div class="form-group">
                                <select name="type" class="select">
                                    <option value="">Tất cả loại</option>
                                    <option value="account" {{ request('type') == 'account' ? 'selected' : '' }}>Tài
                                        khoản (STK/SĐT)</option>
                                    <option value="website" {{ request('type') == 'website' ? 'selected' : '' }}>Website
                                        (URL)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control" placeholder="Tìm STK, tên..."
                                    value="{{ request('search') }}" />
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
                    @forelse($reports as $report)
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox" />
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>
                            @if($report->type === 'account')
                            <span class="badges" style="background:#e0f0ff; color:#1a6fb5;">STK/SĐT</span>
                            @else
                            <span class="badges" style="background:#f0e0ff; color:#6a1ab5;">Website</span>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $report->target_id }}</strong>
                            @if($report->target_name)
                            <br><small class="text-muted">{{ $report->target_name }}</small>
                            @endif
                            @if($report->target_bank)
                            <br><small class="text-muted">{{ $report->target_bank }}</small>
                            @endif
                        </td>
                        <td>
                            @if($report->is_anonymous)
                            <span class="text-muted">Ẩn danh</span>
                            @else
                            {{ $report->reporter_name ?? '—' }}
                            @endif
                        </td>
                        <td>{{ count($report->evidence_images ?? []) }} ảnh</td>
                        <td>
                            @if($report->status === 'pending')
                            <span class="badges bg-lightyellow">Chờ duyệt</span>
                            @elseif($report->status === 'approved')
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
                            <form action="{{ route('admin.reports.destroy', $report->id) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Xác nhận xóa báo cáo #{{ $report->id }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="border-0 bg-transparent p-0">
                                    <img src="/assets/img/icons/delete.svg" alt="xóa" />
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted py-4">Không có báo cáo nào.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-3">
            {{ $reports->withQueryString()->links('pagination::simple-bootstrap-5') }}
        </div>
    </div>
</div>
@endsection