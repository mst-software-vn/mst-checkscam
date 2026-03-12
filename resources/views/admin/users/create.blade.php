@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Thêm / Sửa Người dùng",
            "subtitle" => "Quản lý thông tin tài khoản truy cập hệ thống",
        ]
    )

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>
                                    Username
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" placeholder="Nhập username" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>
                                    Mật khẩu
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="password"
                                    class="form-control"
                                    placeholder="Để trống nếu không đổi mật khẩu"
                                />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>
                                    Họ và Tên
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" placeholder="Họ và tên hoặc Biệt danh" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>
                                    Email
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" class="form-control" placeholder="example@email.com" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>
                                    Vai trò (Role)
                                    <span class="text-danger">*</span>
                                </label>
                                <select class="select">
                                    <option>Bình thường (Member)</option>
                                    <option>Quản trị viên (Admin)</option>
                                    <option>Người kiểm duyệt (Moderator)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Trạng thái tài khoản</label>
                                <div class="status-toggle d-flex align-items-center mt-2">
                                    <input type="checkbox" id="user-status" class="check" checked />
                                    <label for="user-status" class="checktoggle">checkbox</label>
                                    <span class="ms-2">Đang hoạt động</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Image upload --}}
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label>Avatar / Ảnh đại diện cá nhân</label>
                        <div class="image-upload">
                            <input type="file" />
                            <div class="image-uploads">
                                <img src="/assets/img/icons/upload.svg" alt="img" />
                                <h4>Kéo thả file hoặc bấm vào đây</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <a href="javascript:void(0);" class="btn btn-submit me-2">Lưu tài khoản</a>
                    <a href="{{ route("admin.users.index") }}" class="btn btn-cancel">Hủy</a>
                </div>
            </div>
        </div>
    </div>
@endsection
