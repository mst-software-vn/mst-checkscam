<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="menu-title"><span>Chính</span></li>
        <li class="{{ request()->is('admin') && ! request()->is('admin/*') ? 'active' : '' }}">
          <a href="{{ route('admin.dashboard') }}">
            <img src="/assets/img/icons/dashboard.svg" alt="img" />
            <span>Dashboard</span>
          </a>
        </li>

        <li class="menu-title"><span>Quản lý</span></li>
        <li class="submenu">
          <a href="javascript:void(0);">
            <img src="/assets/img/icons/time.svg" alt="img" />
            <span>Tố cáo</span>
            <span class="menu-arrow"></span>
          </a>
          <ul>
            <li>
              <a
                href="{{ route('admin.reports.index') }}"
                class="{{ request()->routeIs('admin.reports.index') ? 'active' : '' }}"
              >
                Danh sách tố cáo
              </a>
            </li>
          </ul>
        </li>

        <li class="submenu">
          <a href="javascript:void(0);">
            <i data-feather="shield"></i>
            <span>Bảo hiểm</span>
            <span class="menu-arrow"></span>
          </a>
          <ul>
            <li>
              <a
                href="{{ route('admin.insurances.index') }}"
                class="{{ request()->routeIs('admin.insurances.index') ? 'active' : '' }}"
              >
                Danh sách
              </a>
            </li>
            <li>
              <a
                href="{{ route('admin.insurances.create') }}"
                class="{{ request()->routeIs('admin.insurances.create') ? 'active' : '' }}"
              >
                Thêm mới
              </a>
            </li>
          </ul>
        </li>

        <li class="submenu">
          <a href="javascript:void(0);">
            <img src="/assets/img/icons/users1.svg" alt="img" />
            <span>Users</span>
            <span class="menu-arrow"></span>
          </a>
          <ul>
            <li>
              <a
                href="{{ route('admin.users.index') }}"
                class="{{ request()->routeIs('admin.users.index') ? 'active' : '' }}"
              >
                Danh sách
              </a>
            </li>
            <li>
              <a
                href="{{ route('admin.users.create') }}"
                class="{{ request()->routeIs('admin.users.create') ? 'active' : '' }}"
              >
                Thêm mới
              </a>
            </li>
          </ul>
        </li>

        <li class="menu-title"><span>Nội dung</span></li>
        <li class="submenu">
          <a href="javascript:void(0);">
            <i data-feather="file-text"></i>
            <span>Bài viết</span>
            <span class="menu-arrow"></span>
          </a>
          <ul>
            <li>
              <a
                href="{{ route('admin.posts.index') }}"
                class="{{ request()->routeIs('admin.posts.index') ? 'active' : '' }}"
              >
                Danh sách
              </a>
            </li>
            <li>
              <a
                href="{{ route('admin.posts.create') }}"
                class="{{ request()->routeIs('admin.posts.create') ? 'active' : '' }}"
              >
                Thêm mới
              </a>
            </li>
          </ul>
        </li>
        <li class="{{ request()->is('admin/comments*') ? 'active' : '' }}">
          <a href="{{ route('admin.comments.index') }}">
            <i data-feather="message-square"></i>
            <span>Bình luận</span>
          </a>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);">
            <i data-feather="image"></i>
            <span>Quảng cáo</span>
            <span class="menu-arrow"></span>
          </a>
          <ul>
            <li>
              <a
                href="{{ route('admin.banners.index') }}"
                class="{{ request()->routeIs('admin.banners.index') ? 'active' : '' }}"
              >
                Danh sách
              </a>
            </li>
            <li>
              <a
                href="{{ route('admin.banners.create') }}"
                class="{{ request()->routeIs('admin.banners.create') ? 'active' : '' }}"
              >
                Thêm mới
              </a>
            </li>
          </ul>
        </li>

        <li class="menu-title">
          <span>TÍNH NĂNG PRO</span>
        </li>
        <style>
          .pro-feature-link span {
            display: flex !important;
            align-items: center !important;
            justify-content: space-between !important;
            width: 100%;
          }
          .pro-feature-link i.fa-crown {
            color: #ffca28;
            font-size: 10px;
            filter: drop-shadow(0 0 2px rgba(255, 202, 40, 0.4));
            margin-right: 5px;
          }
          .pro-feature-text {
            color: #ffb300 !important;
            font-weight: 600 !important;
          }
          body.dark-only .pro-feature-text {
            color: #ffd54f !important;
          }
        </style>
        <li>
          <a href="{{ route('admin.upgrade') }}" class="pro-feature-link">
            <i data-feather="zap"></i>
            <span>
              <span class="pro-feature-text">Telegram Hub</span>
              <i class="fas fa-crown"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.upgrade') }}" class="pro-feature-link">
            <i data-feather="share-2"></i>
            <span>
              <span class="pro-feature-text">Auto Bot & Channel</span>
              <i class="fas fa-crown"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.upgrade') }}" class="pro-feature-link">
            <i data-feather="code"></i>
            <span>
              <span class="pro-feature-text">Public API</span>
              <i class="fas fa-crown"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.upgrade') }}" class="pro-feature-link">
            <i data-feather="alert-triangle"></i>
            <span>
              <span class="pro-feature-text">Tranh chấp</span>
              <i class="fas fa-crown"></i>
            </span>
          </a>
        </li>
        <li>
          <a href="{{ route('admin.upgrade') }}" class="pro-feature-link">
            <i data-feather="activity"></i>
            <span>
              <span class="pro-feature-text">Logs Audit & Bảo mật</span>
              <i class="fas fa-crown"></i>
            </span>
          </a>
        </li>

        <li class="menu-title"><span>Hệ thống</span></li>
        <li class="{{ request()->is('admin/search-analytics*') ? 'active' : '' }}">
          <a href="{{ route('admin.search-analytics.index') }}">
            <i data-feather="bar-chart-2"></i>
            <span>Search Analytics</span>
          </a>
        </li>
        <li class="{{ request()->is('admin/settings*') ? 'active' : '' }}">
          <a href="{{ route('admin.settings.index') }}">
            <img src="/assets/img/icons/settings.svg" alt="img" />
            <span>Cài đặt</span>
          </a>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);">
            <img src="/assets/img/icons/support.svg" alt="img" />
            <span>Hỗ trợ sự cố</span>
            <span class="menu-arrow"></span>
          </a>
          <ul>
            <li><a href="https://fb.com/phamhoangtuanqn" target="_blank">Facebook</a></li>
            <li><a href="https://www.facebook.com/mstsoftware.vn" target="_blank">Fanpage</a></li>
            <li><a href="https://zalo.me/0812665001" target="_blank">Zalo</a></li>
          </ul>
        </li>
      </ul>

      <!-- Sidebar Upgrade Mini Banner -->
      <div class="sidebar-upgrade-banner">
        <h6>Bản Miễn Phí</h6>
        <p>Nâng cấp PRO để mở khóa toàn bộ tính năng & hỗ trợ.</p>
        <a href="{{ route('admin.upgrade') }}" class="btn-upgrade">Nâng cấp ngay</a>
      </div>
    </div>
  </div>
</div>
