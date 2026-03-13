@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Thêm / Sửa Quỹ Bảo Hiểm",
            "subtitle" => "Quản lý thông tin bảo hiểm của user",
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
                                    Họ tên User
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Nhập họ tên"
                                    value="Nguyễn Văn A"
                                />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>
                                    Username (Slug)
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="nguyen-van-a"
                                    value="nguyen-van-a"
                                />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>
                                    Số tiền đóng (VND)
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" placeholder="20,000,000" value="20000000" />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="select">
                                    <option>Hoạt động</option>
                                    <option>Hết hạn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>
                                    Ngày tham gia
                                    <span class="text-danger">*</span>
                                </label>
                                <div class="input-groupicon">
                                    <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker form-control" />
                                    <div class="addonset">
                                        <img src="/assets/img/icons/calendars.svg" alt="img" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Ngày hết hạn</label>
                                <div class="input-groupicon">
                                    <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker form-control" />
                                    <div class="addonset">
                                        <img src="/assets/img/icons/calendars.svg" alt="img" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Dynamic sections --}}
                    <h5 class="card-title mt-4">Thông tin liên hệ</h5>
                    <div class="row align-items-end mb-3">
                        <div class="col-lg-5">
                            <div class="form-group mb-0">
                                <label>Nền tảng (VD: Facebook, Zalo, SĐT)</label>
                                <input type="text" class="form-control" value="Facebook" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group mb-0">
                                <label>Giá trị (Link/Số)</label>
                                <input type="text" class="form-control" value="fb.com/nguyenvana" />
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm">
                                <i data-feather="trash-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="mb-4 text-end">
                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary">
                            <i data-feather="plus"></i>
                            Thêm liên hệ
                        </a>
                    </div>

                    <h5 class="card-title mt-4">Tài khoản thanh toán (Ngân hàng/Momo)</h5>
                    <div class="row align-items-end mb-3">
                        <div class="col-lg-4">
                            <div class="form-group mb-0">
                                <label>Ngân hàng/Ví</label>
                                <input type="text" class="form-control" value="Vietcombank" />
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group mb-0">
                                <label>Số tài khoản</label>
                                <input type="text" class="form-control" value="0987654321" />
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group mb-0">
                                <label>Chủ TK</label>
                                <input type="text" class="form-control" value="NGUYEN VAN A" />
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm">
                                <i data-feather="trash-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="mb-4 text-end">
                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary">
                            <i data-feather="plus"></i>
                            Thêm tài khoản
                        </a>
                    </div>

                    <h5 class="card-title mt-4">Dịch vụ cung cấp</h5>
                    <div class="row align-items-end mb-3">
                        <div class="col-lg-11">
                            <div class="form-group mb-0">
                                <label>Tên dịch vụ</label>
                                <input type="text" class="form-control" value="Tăng like Facebook, Tiktok" />
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm">
                                <i data-feather="trash-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="mb-4 text-end">
                        <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary">
                            <i data-feather="plus"></i>
                            Thêm dịch vụ
                        </a>
                    </div>
                </div>

                {{-- Image upload --}}
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label>
                            Avatar / Ảnh đại diện
                            <span class="text-danger">*</span>
                        </label>
                        <div class="image-upload">
                            <input type="file" />
                            <div class="image-uploads">
                                <img src="/assets/img/icons/upload.svg" alt="img" />
                                <h4>Kéo thả file hoặc bấm vào đây để tải lên</h4>
                            </div>
                        </div>
                    </div>
                    {{-- Preview image if exists --}}
                    <div class="product-list">
                        <ul class="row">
                            <li class="col-12 pt-3 text-center">
                                <h6>Mặc định sẽ lấy avatar từ tài khoản User nếu không upload.</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <a href="javascript:void(0);" class="btn btn-submit me-2">Lưu thay đổi</a>
                    <a href="{{ route("admin.insurances.index") }}" class="btn btn-cancel">Hủy</a>
                </div>
            </div>
        </div>
    </div>
@endsection
