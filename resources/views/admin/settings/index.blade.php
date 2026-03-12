@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Cài đặt chung",
            "subtitle" => "Quản lý các cấu hình hệ thống CheckScam",
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
                                    Tên Website (Site Title)
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Tên Website"
                                    value="CheckScam - Hệ Thống Cảnh Báo Lừa Đảo"
                                />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>
                                    Site Description
                                    <span class="text-danger">*</span>
                                </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Mô tả website"
                                    value="Tra cứu và báo cáo số điện thoại, tài khoản ngân hàng lừa đảo"
                                />
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label>Từ khóa SEO (Keywords)</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Từ khóa 1, Từ khóa 2"
                                    value="check scam, lừa đảo, số điện thoại lừa đảo, trang web scam"
                                />
                            </div>
                        </div>
                    </div>

                    <h5 class="card-title mt-4">Thông tin liên hệ</h5>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Hotline CSKH</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Số điện thoại"
                                    value="0987654321"
                                />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Email hỗ trợ</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Email"
                                    value="support@checkscam.com"
                                />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Zalo hỗ trợ (Link hoặc SĐT)</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Link Zalo"
                                    value="zalo.me/0987654321"
                                />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Link Fanpage Facebook</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Link Facebook"
                                    value="facebook.com/checkscam.vn"
                                />
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Link Group Telegram</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    placeholder="Link Telegram"
                                    value="t.me/checkscam_group"
                                />
                            </div>
                        </div>
                    </div>

                    <h5 class="card-title mt-4">Module hệ thống</h5>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tính năng quỹ bảo hiểm</label>
                                <div class="status-toggle d-flex align-items-center mt-2">
                                    <input type="checkbox" id="insurance" class="check" checked />
                                    <label for="insurance" class="checktoggle">checkbox</label>
                                    <span class="ms-2">Bật</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tính năng bình luận (Báo cáo/Bài viết)</label>
                                <div class="status-toggle d-flex align-items-center mt-2">
                                    <input type="checkbox" id="comment" class="check" checked />
                                    <label for="comment" class="checktoggle">checkbox</label>
                                    <span class="ms-2">Bật</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Chế độ bảo trì</label>
                                <div class="status-toggle d-flex align-items-center mt-2">
                                    <input type="checkbox" id="maintenance" class="check" />
                                    <label for="maintenance" class="checktoggle">checkbox</label>
                                    <span class="ms-2">Tắt</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <label>Đoạn mã Header (Scripts/Analytics)</label>
                        <textarea
                            class="form-control"
                            rows="5"
                            placeholder="Dán mã Google Analytics, Facebook Pixel vào đây..."
                        ></textarea>
                    </div>
                </div>

                {{-- Image upload --}}
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label>Logo Website (Header)</label>
                        <div class="image-upload">
                            <input type="file" />
                            <div class="image-uploads">
                                <img src="/assets/img/icons/upload.svg" alt="img" />
                                <h4>Kéo thả file Logo hoặc bấm chọn</h4>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label>Favicon (Biểu tượng tab)</label>
                        <div class="image-upload">
                            <input type="file" />
                            <div class="image-uploads">
                                <img src="/assets/img/icons/upload.svg" alt="img" />
                                <h4>Kéo thả file Favicon hoặc bấm chọn</h4>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label>Ảnh mặc định khi chia sẻ link (OG Image)</label>
                        <div class="image-upload">
                            <input type="file" />
                            <div class="image-uploads">
                                <img src="/assets/img/icons/upload.svg" alt="img" />
                                <h4>Kéo thả file Cover hoặc bấm chọn</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <a href="javascript:void(0);" class="btn btn-submit me-2">Lưu cài đặt</a>
                </div>
            </div>
        </div>
    </div>
@endsection
