@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Danh sách bài viết",
            "subtitle" => "Quản lý các bài viết trên blog",
            "btnText" => "Thêm bài viết mới",
            "btnUrl" => route("admin.posts.create"),
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
                                            <option>Tất cả danh mục</option>
                                            <option>Cảnh báo lừa đảo</option>
                                            <option>Tin tức</option>
                                            <option>Kiến thức</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Tìm theo tiêu đề..." />
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
                            <th>Bài viết</th>
                            <th>Tác giả</th>
                            <th>Nổi bật</th>
                            <th>Lượt xem</th>
                            <th>Ngày tạo</th>
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
                                    <img src="/assets/img/product/product1.jpg" alt="product" />
                                </a>
                                <a href="javascript:void(0);">Cảnh báo thủ đoạn lừa đảo qua Telegram</a>
                            </td>
                            <td>Admin Tuan</td>
                            <td><span class="badges bg-lightgreen">Có</span></td>
                            <td>1,245</td>
                            <td>13/03/2026</td>
                            <td>
                                <a class="me-3" href="{{ route("admin.posts.create") }}">
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
                                    <img src="/assets/img/product/product2.jpg" alt="product" />
                                </a>
                                <a href="javascript:void(0);">Làm sao để nhận biết website giả mạo?</a>
                            </td>
                            <td>Mod Hieu</td>
                            <td><span class="badges bg-lightgrey">Không</span></td>
                            <td>850</td>
                            <td>10/03/2026</td>
                            <td>
                                <a class="me-3" href="{{ route("admin.posts.create") }}">
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
