@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Chi tiết báo cáo #" . $id,
            "subtitle" => "Xem và xử lý báo cáo lừa đảo",
        ]
    )

    <div class="row">
        {{-- Cột trái: Nội dung báo cáo --}}
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Thông tin báo cáo</h5>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Loại đối tượng</label>
                                <p class="mb-0"><strong>Tài khoản ngân hàng (STK)</strong></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Giá trị</label>
                                <p class="mb-0"><strong>1234567890</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tên chủ tài khoản</label>
                                <p class="mb-0"><strong>Nguyễn Văn A</strong></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ngân hàng</label>
                                <p class="mb-0"><strong>Vietcombank</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Số tiền thiệt hại</label>
                                <p class="mb-0"><strong class="text-danger">5,000,000 ₫</strong></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phân loại</label>
                                <p class="mb-0"><strong>Giả mạo ngân hàng</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Nội dung mô tả</label>
                        <div class="bg-light rounded p-3">
                            Tôi bị lừa chuyển khoản 5 triệu đồng vào số tài khoản 1234567890 tại Vietcombank. Đối tượng
                            liên hệ qua Facebook, giả danh nhân viên ngân hàng, yêu cầu chuyển khoản để xác thực tài
                            khoản. Sau khi chuyển tiền, đối tượng chặn liên lạc và không thể liên hệ được nữa.
                        </div>
                    </div>

                    <h5 class="card-title mt-4">Ảnh bằng chứng</h5>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="bg-light rounded p-4 text-center">
                                <i data-feather="image" style="width: 48px; height: 48px; color: #ccc"></i>
                                <p class="text-muted mt-2 mb-0">evidence_01.jpg</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="bg-light rounded p-4 text-center">
                                <i data-feather="image" style="width: 48px; height: 48px; color: #ccc"></i>
                                <p class="text-muted mt-2 mb-0">evidence_02.jpg</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="bg-light rounded p-4 text-center">
                                <i data-feather="image" style="width: 48px; height: 48px; color: #ccc"></i>
                                <p class="text-muted mt-2 mb-0">evidence_03.jpg</p>
                            </div>
                        </div>
                    </div>

                    <h5 class="card-title mt-4">Thông tin người gửi</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <p class="mb-0"><strong>Ẩn danh</strong></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Liên hệ</label>
                                <p class="mb-0"><strong>— Ẩn danh —</strong></p>
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
                    <h5 class="card-title">Trạng thái</h5>
                    <p><span class="badges bg-lightyellow">Chờ duyệt</span></p>

                    <hr />

                    <h5 class="card-title">Thao tác</h5>
                    <div class="d-grid mb-3 gap-2">
                        <a href="javascript:void(0);" class="btn btn-submit">
                            <i data-feather="check" class="me-1"></i>
                            Duyệt báo cáo
                        </a>
                    </div>
                    <div class="form-group mb-3">
                        <label>Lý do từ chối</label>
                        <textarea class="form-control" rows="3" placeholder="Nhập lý do từ chối..."></textarea>
                    </div>
                    <div class="d-grid mb-3 gap-2">
                        <a href="javascript:void(0);" class="btn btn-cancel">
                            <i data-feather="x" class="me-1"></i>
                            Từ chối
                        </a>
                    </div>
                    <hr />
                    <div class="d-grid gap-2">
                        <a href="javascript:void(0);" class="btn btn-danger">
                            <i data-feather="trash-2" class="me-1"></i>
                            Xóa báo cáo
                        </a>
                    </div>

                    <hr />

                    <h5 class="card-title">Ghi chú nội bộ</h5>
                    <div class="form-group">
                        <textarea class="form-control" rows="3" placeholder="Ghi chú chỉ Admin/Mod thấy..."></textarea>
                    </div>
                </div>
            </div>

            {{-- Lịch sử đối tượng --}}
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Lịch sử đối tượng</h5>
                    <p class="text-muted mb-2">
                        Đối tượng
                        <strong>1234567890</strong>
                        đã bị báo cáo
                        <strong>3 lần</strong>
                    </p>
                    <p class="text-muted mb-3">
                        Được tra cứu
                        <strong>45 lần</strong>
                        trong 30 ngày qua
                    </p>

                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#RPT001</td>
                                    <td><span class="badges bg-lightyellow">Chờ duyệt</span></td>
                                    <td>13/03</td>
                                </tr>
                                <tr>
                                    <td>#RPT008</td>
                                    <td><span class="badges bg-lightred">Từ chối</span></td>
                                    <td>01/03</td>
                                </tr>
                                <tr>
                                    <td>#RPT015</td>
                                    <td><span class="badges bg-lightgreen">Đã duyệt</span></td>
                                    <td>15/02</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
