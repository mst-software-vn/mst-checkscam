@extends("admin.layouts.master")
@section("content")
@include(
"admin.components.page-header",
[
"title" => "Quản lý bình luận",
"subtitle" => "Theo dõi và kiểm duyệt các bình luận trên hệ thống",
]
)

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
                <div class="row">
                    <div class="col-lg-12 col-sm-12">
                        <div class="row">
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="form-control"
                                        placeholder="Tìm ID báo cáo hoặc tên người gửi..." />
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto">
                                        <img src="/assets/img/icons/search-whites.svg" alt="img" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox" />
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>
                            <a href="{{ route("admin.reports.detail", 1) }}" class="text-primary font-weight-bold">
                                #RPT001
                            </a>
                        </td>
                        <td>Ẩn danh (192.168.1.1)</td>
                        <td>Tôi cũng bị lừa giống hệt như thế này, mọi người cẩn thận nhé...</td>
                        <td>13/03/2026</td>
                        <td>
                            <a class="confirm-text" href="javascript:void(0);">
                                <img src="/assets/img/icons/delete.svg" alt="img" />
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label class="checkboxs">
                                <input type="checkbox" />
                                <span class="checkmarks"></span>
                            </label>
                        </td>
                        <td>
                            <a href="{{ route("admin.reports.detail", 5) }}" class="text-primary font-weight-bold">
                                #RPT005
                            </a>
                        </td>
                        <td>Hiếu PC</td>
                        <td>Số tài khoản này đã lừa hơn 100 người rồi, khuyên can gì nữa.</td>
                        <td>10/03/2026</td>
                        <td>
                            <a class="confirm-text" href="javascript:void(0);">
                                <img src="/assets/img/icons/delete.svg" alt="img" />
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection