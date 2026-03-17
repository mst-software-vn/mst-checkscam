@extends('admin.layouts.master')
@section('title', 'Thêm Người dùng mới')
@section('content')
  @include(
    'admin.components.page-header',
    [
      'title' => isset($user) ? 'Sửa Người dùng' : 'Thêm Người dùng',
      'subtitle' => 'Quản lý thông tin tài khoản truy cập hệ thống',
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
        enctype="multipart/form-data"
        action="{{ isset($user) ? route('admin.users.update', $user->id) : route('admin.users.store') }}"
      >
        @csrf
        @if (isset($user))
          @method('PUT')
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
                    value="{{ old('username', $user->username ?? '') }}"
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
                        : 'Nhập mật khẩu'
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
                    value="{{ old('full_name', $user->full_name ?? '') }}"
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
                    value="{{ old('email', $user->email ?? '') }}"
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
                    <option value="">Vai trò</option>
                    <option value="admin">Admin</option>
                    <option value="moderator">Moderator - Bản PRO</option>
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
                      {{ old('status', $user->status ?? 1) ? 'checked' : '' }}
                    />
                    <label for="user-status" class="checktoggle"></label>
                    <span class="ms-2 mb-2">Đang hoạt động</span>
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
              <div id="imagePreviewContainer">
                @if (isset($user) && $user->avatar)
                  <div
                    class="image-preview-item mt-2 position-relative d-inline-block border rounded p-1 existing-image"
                  >
                    <img
                      src="{{ asset('storage/' . $user->avatar) }}"
                      alt="avatar"
                      style="max-height: 150px; max-width: 100%; display: block"
                      class="rounded shadow-sm"
                    />
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>

        <hr />
        <div class="row">
          <div class="col-lg-12">
            <button type="submit" id="btnSubmit" class="btn btn-submit me-2">Lưu tài khoản</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-cancel">Hủy</a>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // --- Image Preview ---
      if (typeof initImagePreview === 'function') {
        initImagePreview('avatarInput', 'imagePreviewContainer');
      }

      // --- Logic: Confirm Modal + Submit ---
      const form = document.getElementById('userForm');
      if (form) {
        form.addEventListener('submit', function (e) {
          e.preventDefault();

          Swal.fire({
            title: 'Xác nhận lưu?',
            text: 'Bạn có chắc chắn muốn lưu thông tin này?',
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
                '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Đang xử lý...';

              form.submit();
            }
          });
        });
      }
    });
  </script>
@endpush
