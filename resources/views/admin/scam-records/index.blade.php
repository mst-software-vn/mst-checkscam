@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Scam Records",
            "subtitle" => "Quản lý danh sách các đối tượng lừa đảo bị blacklist",
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
                <div class="wordset">
                    <ul>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf">
                                <img src="/assets/img/icons/pdf.svg" alt="img" />
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel">
                                <img src="/assets/img/icons/excel.svg" alt="img" />
                            </a>
                        </li>
                        <li>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="print">
                                <img src="/assets/img/icons/printer.svg" alt="img" />
                            </a>
                        </li>
                    </ul>
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
                                        <select class="select">
                                            <option>Tất cả loại</option>
                                            <option>Tài khoản (STK/SĐT)</option>
                                            <option>Website (URL)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nhập Target ID / Tên..." />
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
                            <th>Target ID</th>
                            <th>Tên đối tượng</th>
                            <th>Loại</th>
                            <th>Bị tố cáo</th>
                            <th>Tổng thiệt hại</th>
                            <th>Cập nhật lần cuối</th>
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
                            <td>1234567890</td>
                            <td>Nguyễn Văn A</td>
                            <td>STK - Vietcombank</td>
                            <td><span class="badges bg-lightred">5 lần</span></td>
                            <td>25,000,000 ₫</td>
                            <td>13/03/2026</td>
                            <td>
                                <a class="me-3" href="javascript:void(0);">
                                    <img src="/assets/img/icons/eye.svg" alt="img" />
                                </a>
                                <a
                                    class="confirm-text"
                                    href="javascript:void(0);"
                                    data-bs-toggle="tooltip"
                                    title="Gỡ khỏi Blacklist"
                                >
                                    <i data-feather="user-check" class="text-success"></i>
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
                            <td>0912345678</td>
                            <td>Trần Thị B</td>
                            <td>SĐT vi phạm</td>
                            <td><span class="badges bg-lightyellow">2 lần</span></td>
                            <td>4,500,000 ₫</td>
                            <td>12/03/2026</td>
                            <td>
                                <a class="me-3" href="javascript:void(0);">
                                    <img src="/assets/img/icons/eye.svg" alt="img" />
                                </a>
                                <a
                                    class="confirm-text"
                                    href="javascript:void(0);"
                                    data-bs-toggle="tooltip"
                                    title="Gỡ khỏi Blacklist"
                                >
                                    <i data-feather="user-check" class="text-success"></i>
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
                            <td>scam-site.com</td>
                            <td>(Website ẩn danh)</td>
                            <td>Website lừa đảo</td>
                            <td><span class="badges bg-lightred">8 lần</span></td>
                            <td>120,000,000 ₫</td>
                            <td>10/03/2026</td>
                            <td>
                                <a class="me-3" href="javascript:void(0);">
                                    <img src="/assets/img/icons/eye.svg" alt="img" />
                                </a>
                                <a
                                    class="confirm-text"
                                    href="javascript:void(0);"
                                    data-bs-toggle="tooltip"
                                    title="Gỡ khỏi Blacklist"
                                >
                                    <i data-feather="user-check" class="text-success"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
