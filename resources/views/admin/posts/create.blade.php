@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Thêm / Sửa Bài Viết",
            "subtitle" => "Quản lý nội dung bài viết blog",
        ]
    )

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="form-group">
                        <label>
                            Tiêu đề bài viết
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" placeholder="Nhập tiêu đề ấn tượng..." />
                    </div>
                    <div class="form-group">
                        <label>
                            Đường dẫn (Slug)
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" placeholder="canh-bao-thu-doan-lua-dao" />
                        <small class="text-muted">Slug URL. Sẽ tự động tạo từ tiêu đề nếu để trống.</small>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Danh mục</label>
                                <select class="select">
                                    <option>Cảnh báo lừa đảo</option>
                                    <option>Tin tức</option>
                                    <option>Kiến thức</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Tùy chọn hiển thị</label>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="status-toggle d-flex align-items-center me-4">
                                        <input type="checkbox" id="user1" class="check" checked />
                                        <label for="user1" class="checktoggle">checkbox</label>
                                        <span class="ms-2">Hiển thị (Active)</span>
                                    </div>
                                    <div class="status-toggle d-flex align-items-center">
                                        <input type="checkbox" id="user2" class="check" />
                                        <label for="user2" class="checktoggle">checkbox</label>
                                        <span class="ms-2">Bài nổi bật</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>
                            Mô tả ngắn
                            <span class="text-danger">*</span>
                        </label>
                        <textarea
                            class="form-control"
                            rows="3"
                            placeholder="Đoạn văn tóm tắt nội dung bài viết..."
                        ></textarea>
                    </div>

                    <div class="form-group">
                        <label>
                            Nội dung bài viết
                            <span class="text-danger">*</span>
                        </label>
                        <textarea
                            class="form-control"
                            rows="15"
                            placeholder="Soạn thảo nội dung ở đây... (Cần tích hợp CKEditor/TinyMCE sau này)"
                        ></textarea>
                    </div>

                    <div class="form-group">
                        <label>Thẻ (Tags) - Ngăn cách bởi dấu phẩy</label>
                        <input type="text" class="form-control" placeholder="Lừa đảo, Cảnh báo, Telegram..." />
                    </div>
                </div>

                {{-- Image upload --}}
                <div class="col-lg-4 col-sm-12">
                    <div class="form-group">
                        <label>
                            Ảnh bìa (Thumbnail)
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
                                <h6>Kích thước khuyến nghị: 800x600px, dung lượng < 2MB.</h6>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <a href="javascript:void(0);" class="btn btn-submit me-2">Lưu bài viết</a>
                    <a href="{{ route("admin.posts.index") }}" class="btn btn-cancel">Hủy</a>
                </div>
            </div>
        </div>
    </div>
@endsection
