@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Quản lý người dùng",
            "subtitle" => "Danh sách các tài khoản Admin/User trên hệ thống",
            "btnText" => "Thêm User mới",
            "btnUrl" => route("admin.users.create"),
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
                                        <select class="select">
                                            <option>Tất cả Role</option>
                                            <option>Admin</option>
                                            <option>Moderator</option>
                                            <option>Thành viên</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Tên, username, email..." />
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
                            <th>Họ tên</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Vai trò (Role)</th>
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
                                    <img src="/assets/img/customer/profile2.jpg" alt="product" />
                                </a>
                                <a href="javascript:void(0);">Nguyen Van Admin</a>
                            </td>
                            <td>admin_master</td>
                            <td>admin@checkscam.com</td>
                            <td><span class="badges bg-lightgreen">Admin</span></td>
                            <td><span class="badges bg-lightgreen">Hoạt động</span></td>
                            <td>
                                <a class="me-3" href="{{ route("admin.users.create") }}">
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
                                    <img src="/assets/img/customer/profile1.jpg" alt="product" />
                                </a>
                                <a href="javascript:void(0);">Tran Thi Mod</a>
                            </td>
                            <td>mod_vietnam</td>
                            <td>mod@checkscam.com</td>
                            <td><span class="badges bg-lightyellow">Moderator</span></td>
                            <td><span class="badges bg-lightgreen">Hoạt động</span></td>
                            <td>
                                <a class="me-3" href="{{ route("admin.users.create") }}">
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
                                    <img src="/assets/img/customer/customer1.jpg" alt="product" />
                                </a>
                                <a href="javascript:void(0);">Le Van User</a>
                            </td>
                            <td>user_normal</td>
                            <td>user@gmail.com</td>
                            <td><span class="badges bg-lightgrey">Thành viên</span></td>
                            <td><span class="badges bg-lightred">Khóa</span></td>
                            <td>
                                <a class="me-3" href="{{ route("admin.users.create") }}">
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
