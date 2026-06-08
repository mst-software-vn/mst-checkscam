@extends('admin.layouts.master')

@section('title', 'Khu Mua Bán – Bài đăng bị ẩn')

@section('content')
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Bài đăng bị ẩn</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="content">
    <div class="container-fluid">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fa-solid fa-eye-slash me-2 text-danger"></i>
            Danh sách bài đăng bị ẩn do report ({{ $posts->total() }} bài)
          </h3>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
              <thead class="table-light">
                <tr>
                  <th width="40">#</th>
                  <th>Người đăng</th>
                  <th>Danh mục</th>
                  <th>Nội dung</th>
                  <th width="80" class="text-center">Reports</th>
                  <th width="130">Ngày đăng</th>
                  <th width="100">Thao tác</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($posts as $post)
                  <tr>
                    <td class="text-muted">{{ $post->id }}</td>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <img
                          src="{{ $post->user->avatar_url }}"
                          class="rounded-circle"
                          width="32"
                          height="32"
                          alt=""
                        />
                        <div>
                          <div class="fw-semibold text-sm">{{ $post->user->full_name ?? $post->user->username }}</div>
                          <div class="text-muted" style="font-size: 11px">{{ $post->user->email }}</div>
                        </div>
                      </div>
                    </td>
                    <td><span class="badge bg-secondary">{{ $post->category }}</span></td>
                    <td>
                      <p class="mb-0 text-sm" style="max-width: 320px">{{ Str::limit($post->content, 120) }}</p>
                    </td>
                    <td class="text-center">
                      <span class="badge bg-danger">{{ $post->report_count }}</span>
                    </td>
                    <td class="text-muted text-sm">{{ $post->created_at->format('d/m/Y H:i') }}</td>
                    <td>
                      <form
                        action="{{ route('admin.newfeed.unhide', $post) }}"
                        method="POST"
                        onsubmit="return confirm('Bỏ ẩn bài đăng này?');"
                      >
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-sm btn-outline-success">
                          <i class="fa-solid fa-eye me-1"></i>
                          Bỏ ẩn
                        </button>
                      </form>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="7" class="text-center text-muted py-4">Không có bài đăng nào bị ẩn.</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
        @if ($posts->hasPages())
          <div class="card-footer">
            {{ $posts->links() }}
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection
