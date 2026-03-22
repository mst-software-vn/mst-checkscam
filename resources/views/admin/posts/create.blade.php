@extends('admin.layouts.master')
@section('title', 'Thêm Bài Viết')
@section('content')
  @include(
    'admin.components.page-header',
    [
      'title' => isset($post) ? 'Sửa Bài Viết' : 'Thêm Bài Viết',
      'subtitle' => 'Quản lý nội dung bài viết blog',
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
        action="{{ isset($post) ? route('admin.posts.update', $post->id) : route('admin.posts.store') }}"
        enctype="multipart/form-data"
      >
        @csrf
        @if (isset($post))
          @method('PUT')
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
                value="{{ old('title', $post->title ?? '') }}"
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
                        {{ old('is_featured', $post->is_featured ?? false) ? 'checked' : '' }}
                      />
                      <label for="is_featured" class="checktoggle"></label>
                      <span class="ms-2 mb-2">Bài nổi bật</span>
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
{{ old('description', $post->description ?? '') }}</textarea
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
                class="form-control editor"
                rows="15"
                placeholder="Soạn thảo nội dung ở đây..."
              >
    {{ old('content', $post->content ?? '') }}</textarea
              >
            </div>

            <div class="form-group">
              <label>Thẻ (Tags) - Ngăn cách bởi dấu phẩy</label>
              <input
                type="text"
                name="hashtags"
                class="form-control"
                placeholder="Lừa đảo, Cảnh báo, Telegram..."
                value="{{ old('hashtags', $post->hashtags ?? '') }}"
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
              <div id="imagePreviewContainer">
                @if (isset($post) && $post->thumbnail)
                  <div
                    class="image-preview-item mt-2 position-relative d-inline-block border rounded p-1 existing-image"
                  >
                    <img
                      src="{{ asset('uploads/' . $post->thumbnail) }}"
                      alt="thumbnail"
                      style="max-height: 150px; max-width: 100%; display: block"
                      class="rounded shadow-sm"
                    />
                  </div>
                @endif
              </div>
            </div>
          </div>

          <hr />
          <div class="row">
            <div class="col-lg-12 text-end">
              <a href="{{ route('admin.posts.index') }}" class="btn btn-cancel me-2">Hủy bỏ</a>
              <button type="submit" id="btnSubmit" class="btn btn-submit">Lưu bài viết</button>
            </div>
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
                '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Đang xử lý...';

              form.submit();
            }
          });
        });
      }
    });
  </script>
@endpush
