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
                                    <img
                                        src="{{ isset($post) && $post->thumbnail ? asset("storage/" . $post->thumbnail) : "" }}"
                                        alt="thumbnail preview"
                                        id="avatarPreview"
                                        class="img-fluid rounded"
                                        style="
                                            max-height: 250px;
                                            cursor: zoom-in;
                                            border: 2px dashed #ff9f43;
                                            padding: 5px;
                                            transition: all 0.3s;
                                        "
                                        title="Click để phóng to ảnh"
                                    />
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            Bấm vào ảnh trên để xem lớn. Bấm vào khu vực
                                            <b>Tải lên</b>
                                            bên trên nếu muốn thay đổi ảnh khác.
                                        </small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <hr />
                    <div class="row">
                        <div class="col-lg-12 text-end">
                            <a href="{{ route("admin.posts.index") }}" class="btn btn-cancel me-2">Hủy bỏ</a>
                            <button type="submit" id="btnSubmit" class="btn btn-submit">Lưu bài viết</button>
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
        document.addEventListener('DOMContentLoaded', function() {
            // --- Logic: Lightbox for Thumbnail ---
            const lbStyle = `
                <style>
                    #post-lightbox {
                        display: none;
                        position: fixed;
                        inset: 0;
                        z-index: 9999;
                        background: rgba(0, 0, 0, .9);
                        align-items: center;
                        justify-content: center;
                        cursor: zoom-out;
                    }
                    #post-lightbox.active { display: flex; }
                    #post-lightbox img {
                        max-width: 90vw;
                        max-height: 90vh;
                        border-radius: 8px;
                        box-shadow: 0 0 20px rgba(0,0,0,.5);
                    }
                    #post-lightbox .lb-close {
                        position: absolute;
                        top: 20px;
                        right: 20px;
                        color: #fff;
                        font-size: 30px;
                        cursor: pointer;
                        background: none;
                        border: none;
                    }
                </style>
            `;
            document.head.insertAdjacentHTML('beforeend', lbStyle);

            const lbHtml = `
                <div id="post-lightbox">
                    <button class="lb-close">&times;</button>
                    <img src="" alt="preview" />
                </div>
            `;
            document.body.insertAdjacentHTML('beforeend', lbHtml);

            const lb = document.getElementById('post-lightbox');
            const lbImg = lb.querySelector('img');

            const avatarPreview = document.getElementById('avatarPreview');
            if (avatarPreview) {
                avatarPreview.addEventListener('click', function() {
                    lbImg.src = this.src;
                    lb.classList.add('active');
                    document.body.style.overflow = 'hidden';
                });
            }

            lb.addEventListener('click', function() {
                lb.classList.remove('active');
                document.body.style.overflow = '';
            });

            // --- Logic: Thumbnail Preview & Persistence ---
            const avatarInput = document.getElementById('avatarInput');
            const previewContainer = document.getElementById('imagePreviewContainer');
            const imgElem = document.getElementById('avatarPreview');
            const storageKey = 'post_thumbnail_preview';

            // Restore from session storage if validation failed
            @if ($errors->any())
                const savedPreview = sessionStorage.getItem(storageKey);
                if (savedPreview) {
                    if (imgElem) imgElem.src = savedPreview;
                    if (previewContainer) previewContainer.style.display = 'block';
                }
            @else
                // Clear storage if no errors (fresh load)
                sessionStorage.removeItem(storageKey);
            @endif

            if (avatarInput) {
                avatarInput.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            const base64 = e.target.result;
                            if (imgElem) imgElem.src = base64;
                            if (previewContainer) previewContainer.style.display = 'block';
                            // Save to session storage
                            sessionStorage.setItem(storageKey, base64);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }

            // Clear storage on cancel
            document.querySelector('.btn-cancel').addEventListener('click', () => sessionStorage.removeItem(
                storageKey));

            // --- Logic: Confirm Modal + AJAX + Spinner delay 1s ---
            const form = document.getElementById('postForm');
            if (form) {
                form.addEventListener('submit', function(e) {
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
                            const originalText = btnSubmit.innerHTML;

                            btnSubmit.disabled = true;
                            btnSubmit.innerHTML =
                                '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Đang xử lý...';

                            setTimeout(() => {
                                const formData = new FormData(form);

                                $.ajax({
                                    url: form.action,
                                    method: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    headers: {
                                        'X-Requested-With': 'XMLHttpRequest'
                                    },
                                    success: function(res) {
                                        if (res.success) {
                                            sessionStorage.removeItem(
                                                storageKey);
                                            Swal.fire({
                                                title: 'Thành công!',
                                                text: res.message,
                                                icon: 'success',
                                                timer: 1500,
                                                showConfirmButton: false
                                            }).then(() => {
                                                window.location.href =
                                                    res.redirect;
                                            });
                                        }
                                    },
                                    error: function(xhr) {
                                        btnSubmit.disabled = false;
                                        btnSubmit.innerHTML = originalText;

                                        if (xhr.status === 422) {
                                            const errors = xhr.responseJSON
                                                .errors;
                                            let errorMsg = '';
                                            Object.values(errors).forEach(
                                                err => {
                                                    errorMsg +=
                                                        `• ${err[0]}<br>`;
                                                });

                                            Swal.fire({
                                                title: 'Lỗi nhập liệu',
                                                html: `<div class="text-start">${errorMsg}</div>`,
                                                icon: 'error',
                                                confirmButtonColor: '#ff9f43'
                                            });
                                        } else {
                                            Swal.fire({
                                                title: 'Lỗi!',
                                                text: 'Có lỗi xảy ra, vui lòng thử lại sau.',
                                                icon: 'error',
                                                confirmButtonColor: '#ff9f43'
                                            });
                                        }
                                    }
                                });
                            }, 1000);
                        }
                    });
                });
            }
        });
    </script>
@endpush
