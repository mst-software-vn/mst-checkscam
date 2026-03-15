@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Quản lý bình luận",
            "subtitle" => "Theo dõi và kiểm duyệt các bình luận trên hệ thống",
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
                </div>
            </div>

            {{-- Filter --}}
            <div class="card mb-0" id="filter_inputs">
                <div class="card-body pb-0">
                    <form method="GET" action="{{ route("admin.comments.index") }}">
                        <div class="row">
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name="report_id"
                                        class="form-control"
                                        placeholder="ID báo cáo..."
                                        value="{{ request("report_id") }}"
                                    />
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <input
                                        type="text"
                                        name="keyword"
                                        class="form-control"
                                        placeholder="Tên người gửi hoặc nội dung..."
                                        value="{{ request("keyword") }}"
                                    />
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select name="is_anonymous" class="select">
                                        <option value="">Tất cả</option>
                                        <option value="1" {{ request("is_anonymous") === "1" ? "selected" : "" }}>
                                            Ẩn danh
                                        </option>
                                        <option value="0" {{ request("is_anonymous") === "0" ? "selected" : "" }}>
                                            Có tên
                                        </option>
                                    </select>
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
                            <th>ID Báo cáo</th>
                            <th>Người bình luận</th>
                            <th style="width: 40%">Nội dung</th>
                            <th>Ngày bình luận</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($comments as $comment)
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox" />
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td>
                                    @if ($comment->report)
                                        <a
                                            href="{{ route("admin.reports.detail", $comment->report_id) }}"
                                            class="text-primary font-weight-bold"
                                        >
                                            #RPT{{ str_pad($comment->report_id, 3, "0", STR_PAD_LEFT) }}
                                        </a>
                                    @else
                                        <span class="text-muted">
                                            #RPT{{ str_pad($comment->report_id, 3, "0", STR_PAD_LEFT) }}
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($comment->is_anonymous)
                                        <span class="text-muted">Ẩn danh ({{ $comment->ip_address }})</span>
                                    @else
                                        {{ $comment->full_name }}
                                    @endif
                                </td>
                                <td>{{ Str::limit($comment->content, 120) }}</td>
                                <td>{{ $comment->created_at->format("d/m/Y") }}</td>
                                <td>
                                    <form
                                        action="{{ route("admin.comments.destroy", $comment->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Xác nhận xóa bình luận này?');"
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
                                <td colspan="6" class="text-muted py-4 text-center">Không có bình luận nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            <div class="mt-3">
                {{ $comments->withQueryString()->links("pagination::simple-bootstrap-5") }}
            </div>
        </div>
    </div>
@endsection
