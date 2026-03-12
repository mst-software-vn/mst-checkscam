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
                                            <option>Tất cả trạng thái</option>
                                            <option>Hoạt động</option>
                                            <option>Hết hạn</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Tên người dùng..." />
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
                            <th>Thông tin user</th>
                            <th>Số tiền bảo hiểm</th>
                            <th>Ngày tham gia</th>
                            <th>Ngày hết hạn</th>
                            <th>Trạng thái</th>
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
                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img src="/assets/img/customer/customer1.jpg" alt="product" />
                                </a>
                                <a href="javascript:void(0);">Nguyen Van A</a>
                            </td>
                            <td>10,000,000 ₫</td>
                            <td>01/01/2026</td>
                            <td>01/01/2027</td>
                            <td><span class="badges bg-lightgreen">Hoạt động</span></td>
                            <td>
                                <a class="me-3" href="{{ route("admin.insurances.create") }}">
                                    <img src="/assets/img/icons/edit.svg" alt="img" />
                                </a>
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
                            <td class="productimgname">
                                <a href="javascript:void(0);" class="product-img">
                                    <img src="/assets/img/customer/customer2.jpg" alt="product" />
                                </a>
                                <a href="javascript:void(0);">Tran Thi B</a>
                            </td>
                            <td>5,000,000 ₫</td>
                            <td>15/05/2025</td>
                            <td>15/05/2026</td>
                            <td><span class="badges bg-lightred">Hết hạn</span></td>
                            <td>
                                <a class="me-3" href="{{ route("admin.insurances.create") }}">
                                    <img src="/assets/img/icons/edit.svg" alt="img" />
                                </a>
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
