@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => isset($user) ? "Sửa Người dùng" : "Thêm Người dùng",
            "subtitle" => "Quản lý thông tin tài khoản truy cập hệ thống",
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
                id="userForm"
                action="{{
                    isset($user)
                        ? route("admin.users.update", $user->id)
                        : route("admin.users.store")
                }}"
            >
                @csrf
                @if (isset($user))
                    @method("PUT")
                @endif

                <div class="row">
                    <div class="col-lg-8 col-sm-12">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>
                                        Username
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="username"
                                        class="form-control"
                                        placeholder="Nhập username"
                                        value="{{ old("username", $user->username ?? "") }}"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>
                                        Mật khẩu
                                        @unless (isset($user))
                                            <span class="text-danger">*</span>
                                        @endunless
                                    </label>
                                    <input
                                        type="text"
                                        name="password"
                                        class="form-control"
                                        placeholder="{{
                                            isset($user)
                                                ? "
                                                                                Để trống nếu không đổi mật khẩu"
                                                : "Nhập mật khẩu"
                                        }}"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>
                                        Họ và Tên
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        name="full_name"
                                        class="form-control"
                                        placeholder="Họ và tên hoặc Biệt danh"
                                        value="{{
                                            old("full_name", $user->full_name ?? "")
                                        }}"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>
                                        Email
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="example@email.com"
                                        value="{{ old("email", $user->email ?? "") }}"
                                    />
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>
                                        Vai trò (Role)
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select name="role" class="select">
                                        <option
                                            value="moderator"
                                            {{
                                                old("role", $user->role ?? "moderator") === "moderator" ? "selected" : ""
                                            }}
                                        >
                                            Người kiểm duyệt (Moderator)
                                        </option>
                                        <option
                                            value="admin"
                                            {{
                                                old("role", $user->role ?? "moderator") === "admin" ? "selected" : ""
                                            }}
                                        >
                                            Quản trị viên (Admin)
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Trạng thái tài khoản</label>
                                    <div class="status-toggle d-flex align-items-center mt-2">
                                        <input
                                            type="checkbox"
                                            name="status"
                                            id="user-status"
                                            class="check"
                                            value="1"
                                            {{ old("status", $user->status ?? 1) ? "checked" : "" }}
                                        />
                                        <label for="user-status" class="checktoggle"></label>
                                        <span class="ms-2">Đang hoạt động</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Image upload --}}
                    <div class="col-lg-4 col-sm-12">
                        <div class="form-group">
                            <label>Avatar / Ảnh đại diện</label>
                            <div class="image-upload">
                                <input type="file" name="avatar" id="avatarInput" accept="image/*" />
                                <div class="image-uploads">
                                    <img src="/assets/img/icons/upload.svg" alt="img" />
                                    <h4>Kéo thả file hoặc bấm vào đây để tải lên</h4>
                                </div>
                            </div>
                        </div>

                        <div
                            class="product-list"
                            id="imagePreviewContainer"
                            style="{{ isset($user) && $user->avatar ? "" : " display: none;" }}"
                        >
                            <ul class="row">
                                <li class="col-12 pt-1 text-center">
                                    <img
                                        src="{{ isset($user) && $user->avatar ? asset(" storage/" . $user->avatar) : "" }}"
                                        alt="avatar"
                                        id="avatarPreview"
                                        class="img-fluid rounded"
                                        style="
                                            max-height: 200px;
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
                </div>

                <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <button type="submit" id="btnSubmit" class="btn btn-submit me-2">Lưu tài khoản</button>
                        <a href="{{ route("admin.users.index") }}" class="btn btn-cancel">Hủy</a>
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
                // --- Logic: Lightbox (Zoom) ---
                const lbStyle = `
                        <style>
                            #user-lightbox {
                                display: none;
                                position: fixed;
                                inset: 0;
                                z-index: 9999;
                                background: rgba(0, 0, 0, .9);
                                align-items: center;
                                justify-content: center;
                                cursor: zoom-out;
                            }
                            #user-lightbox.active { display: flex; }
                            #user-lightbox img {
                                max-width: 90vw;
                                max-height: 90vh;
                                border-radius: 8px;
                                box-shadow: 0 0 20px rgba(0,0,0,.5);
                            }
                            #user-lightbox .lb-close {
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
                        <div id="user-lightbox">
                            <button class="lb-close">&times;</button>
                            <img src="" alt="preview" />
                        </div>
                    `;
                document.body.insertAdjacentHTML('beforeend', lbHtml);

                const lb = document.getElementById('user-lightbox');
                const lbImg = lb.querySelector('img');

                const previewImg = document.getElementById('avatarPreview');
                if (previewImg) {
                    previewImg.addEventListener('click', function () {
                        lbImg.src = this.src;
                        lb.classList.add('active');
                        document.body.style.overflow = 'hidden';
                    });
                }

                lb.addEventListener('click', function () {
                    lb.classList.remove('active');
                    document.body.style.overflow = '';
                });

                // --- Logic: Thumbnail Preview & Persistence ---
                const avatarInput = document.getElementById('avatarInput');
                const previewContainer = document.getElementById('imagePreviewContainer');
                const imgElem = document.getElementById('avatarPreview');
                const storageKey = 'user_avatar_preview';

                // Restore from session storage if page was reloaded (not ideal for avatar but helpful for UX)
                // Clear storage if fresh load
                @unless($errors -> any())
                sessionStorage.removeItem(storageKey);
                @endunless

                if (avatarInput) {
                    avatarInput.addEventListener('change', function (e) {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function (e) {
                                const base64 = e.target.result;
                                if (imgElem) imgElem.src = base64;
                                if (previewContainer) previewContainer.style.display = 'block';
                                sessionStorage.setItem(storageKey, base64);
                            };
                            reader.readAsDataURL(file);
                        }
                    });
                }

                // --- Logic: Confirm Modal + AJax Submit + Spinner ---
                const form = document.getElementById('userForm');
                if (form) {
                    form.addEventListener('submit', function (e) {
                        e.preventDefault();

                        Swal.fire({
                            title: 'Xác nhận lưu?',
                            text: 'Bạn có chắc chắn muốn lưu thông tin tài khoản này?',
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
                                        success: function (res) {
                                            if (res.success) {
                                                sessionStorage.removeItem(storageKey);
                                                Swal.fire({
                                                    title: 'Thành công!',
                                                    text: res.message,
                                                    icon: 'success',
                                                    timer: 1500,
                                                    showConfirmButton: false
                                                }).then(() => {
                                                    window.location.href = res.redirect;
                                                });
                                            }
                                        },
                                        error: function (xhr) {
                                            btnSubmit.disabled = false;
                                            btnSubmit.innerHTML = originalText;

                                            if (xhr.status === 422) {
                                                const errors = xhr.responseJSON.errors;
                                                let errorMsg = '';
                                                Object.values(errors).forEach(err => {
                                                    errorMsg += `• ${err[0]}<br>`;
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
