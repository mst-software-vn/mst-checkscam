@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => isset($post) ? "Sửa Bài Viết" : "Thêm Bài Viết",
            "subtitle" => "Quản lý nội dung bài viết blog",
        ]
    )

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form
                method="POST"
                id="postForm"
                action="{{ isset($post) ? route("admin.posts.update", $post->id) : route("admin.posts.store") }}"
                enctype="multipart/form-data"
            >
                @csrf
                @if (isset($post))
                    @method("PUT")
                @endif

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="form-group">
                            <label>
                                Tiêu đề bài viết
                                <span class="text-danger">*</span>
                            </label>
                            <input
                                type="text"
                                name="title"
                                class="form-control"
                                placeholder="Nhập tiêu đề ấn tượng..."
                                value="{{ old("title", $post->title ?? "") }}"
                            />
                        </div>

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Tùy chọn hiển thị</label>
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="status-toggle d-flex align-items-center">
                                            <input
                                                type="checkbox"
                                                name="is_featured"
                                                id="is_featured"
                                                class="check"
                                                value="1"
                                                {{ old("is_featured", $post->is_featured ?? false) ? "checked" : "" }}
                                            />
                                            <label for="is_featured" class="checktoggle">checkbox</label>
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
                                name="description"
                                class="form-control"
                                rows="3"
                                placeholder="Đoạn văn tóm tắt nội dung bài viết..."
                            >
{{ old("description", $post->description ?? "") }}</textarea
                            >
                        </div>

                        <div class="form-group">
                            <label>
                                Nội dung bài viết
                                <span class="text-danger">*</span>
                            </label>
                            <textarea
                                name="content"
                                id="editor"
                                class="form-control"
                                rows="15"
                                placeholder="Soạn thảo nội dung ở đây..."
                            >
{{ old("content", $post->content ?? "") }}</textarea
                            >
                        </div>

                        <div class="form-group">
                            <label>Thẻ (Tags) - Ngăn cách bởi dấu phẩy</label>
                            <input
                                type="text"
                                name="hashtags"
                                class="form-control"
                                placeholder="Lừa đảo, Cảnh báo, Telegram..."
                                value="{{ old("hashtags", $post->hashtags ?? "") }}"
                            />
                        </div>
                    </div>

                    {{-- Image upload --}}
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label>
                                Thumbnail / Ảnh đại diện
                                @unless (isset($post))
                                    <span class="text-danger">*</span>
                                @endunless
                            </label>
                            <div class="image-upload">
                                <input type="file" name="thumbnail" id="avatarInput" accept="image/*" />
                                <div class="image-uploads">
                                    <img src="/assets/img/icons/upload.svg" alt="img" />
                                    <h4>Kéo thả file hoặc bấm vào đây để tải lên</h4>
                                </div>
                            </div>
                        </div>

                        <div
                            class="product-list"
                            id="imagePreviewContainer"
                            style="{{ isset($post) && $post->thumbnail ? "" : "display: none;" }}"
                        >
                            <ul class="row">
                                <li class="col-12 pt-3 text-center">
                                    <a
                                        href="{{ isset($post) && $post->thumbnail ? asset("storage/" . $post->thumbnail) : "#" }}"
                                        id="lightboxLink"
                                        target="_blank"
                                        title="Click để xem ảnh lớn"
                                    >
                                        <img
                                            src="{{ isset($post) && $post->thumbnail ? asset("storage/" . $post->thumbnail) : "" }}"
                                            alt="thumbnail preview"
                                            id="avatarPreview"
                                            class="img-fluid rounded"
                                            style="
                                                max-height: 200px;
                                                cursor: pointer;
                                                border: 1px solid #ddd;
                                                padding: 5px;
                                            "
                                        />
                                    </a>
                                </li>
                            </ul>
                        </div>

                        @if (! isset($post) || ! $post->thumbnail)
                            <div class="product-list" id="defaultTextContainer">
                                <ul class="row">
                                    <li class="col-12 pt-3 text-center">
                                        <h6>Chưa có ảnh nào được chọn.</h6>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>

                    <hr />
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" id="btnSubmit" class="btn btn-submit me-2">Lưu bài viết</button>
                            <a href="{{ route("admin.posts.index") }}" class="btn btn-cancel">Hủy</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push("scripts")
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- Logic: Thumbnail Preview ---
            const avatarInput = document.getElementById('avatarInput');
            if (avatarInput) {
                avatarInput.addEventListener('change', function (e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function (e) {
                            const previewContainer = document.getElementById('imagePreviewContainer');
                            const defaultText = document.getElementById('defaultTextContainer');
                            const imgElem = document.getElementById('avatarPreview');
                            const lbLink = document.getElementById('lightboxLink');

                            if (imgElem) imgElem.src = e.target.result;
                            if (lbLink) lbLink.href = e.target.result;
                            if (previewContainer) previewContainer.style.display = 'block';
                            if (defaultText) defaultText.style.display = 'none';
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // --- Logic: Confirm Modal + Spinner delay 1s ---
            const form = document.getElementById('postForm');
            if (form) {
                form.addEventListener('submit', function (e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Xác nhận!',
                        text: 'Lưu thay đổi bài viết này?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#ff9f43',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý',
                        cancelButtonText: 'Hủy',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            const btnSubmit = document.getElementById('btnSubmit');
                            btnSubmit.disabled = true;
                            btnSubmit.innerHTML =
                                '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Đang lưu...';

                            setTimeout(() => {
                                form.submit();
                            }, 1000);
                        }
                    });
                });
            }
        });
    </script>
@endpush
