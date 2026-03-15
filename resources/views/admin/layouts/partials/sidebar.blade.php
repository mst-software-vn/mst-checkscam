<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="{{ request()->is("admin") && ! request()->is("admin/*") ? "active" : "" }}">
                    <a href="{{ route("admin.dashboard") }}">
                        <img src="/assets/img/icons/dashboard.svg" alt="img" />
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="submenu {{ request()->is("admin/reports*") ? "active" : "" }}">
                    <a href="javascript:void(0);">
                        <img src="/assets/img/icons/time.svg" alt="img" />
                        <span>Báo cáo</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a
                                href="{{ route("admin.reports.index") }}"
                                class="{{ request()->routeIs("admin.reports.index") ? "active" : "" }}"
                            >
                                Danh sách báo cáo
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu {{ request()->is("admin/insurances*") ? "active" : "" }}">
                    <a href="javascript:void(0);">
                        <i data-feather="shield"></i>
                        <span>Bảo hiểm</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a
                                href="{{ route("admin.insurances.index") }}"
                                class="{{ request()->routeIs("admin.insurances.index") ? "active" : "" }}"
                            >
                                Danh sách
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route("admin.insurances.create") }}"
                                class="{{ request()->routeIs("admin.insurances.create") ? "active" : "" }}"
                            >
                                Thêm mới
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="submenu {{ request()->is("admin/posts*") ? "active" : "" }}">
                    <a href="javascript:void(0);">
                        <i data-feather="file-text"></i>
                        <span>Bài viết</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a
                                href="{{ route("admin.posts.index") }}"
                                class="{{ request()->routeIs("admin.posts.index") ? "active" : "" }}"
                            >
                                Danh sách
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route("admin.posts.create") }}"
                                class="{{ request()->routeIs("admin.posts.create") ? "active" : "" }}"
                            >
                                Thêm mới
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is("admin/comments*") ? "active" : "" }}">
                    <a href="{{ route("admin.comments.index") }}">
                        <i data-feather="message-square"></i>
                        <span>Bình luận</span>
                    </a>
                </li>
                <li class="{{ request()->is("admin/search-analytics*") ? "active" : "" }}">
                    <a href="{{ route("admin.search-analytics.index") }}">
                        <i data-feather="bar-chart-2"></i>
                        <span>Search Analytics</span>
                    </a>
                </li>
                <li class="submenu {{ request()->is("admin/users*") ? "active" : "" }}">
                    <a href="javascript:void(0);">
                        <img src="/assets/img/icons/users1.svg" alt="img" />
                        <span>Users</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a
                                href="{{ route("admin.users.index") }}"
                                class="{{ request()->routeIs("admin.users.index") ? "active" : "" }}"
                            >
                                Danh sách
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route("admin.users.create") }}"
                                class="{{ request()->routeIs("admin.users.create") ? "active" : "" }}"
                            >
                                Thêm mới
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is("admin/settings*") ? "active" : "" }}">
                    <a href="{{ route("admin.settings.index") }}">
                        <img src="/assets/img/icons/settings.svg" alt="img" />
                        <span>Cài đặt</span>
                    </a>
                </li>

                <li class="menu-title mt-3"><span>Tính năng mở rộng</span></li>
                <li>
                    <a href="javascript:void(0);" onclick="alert('Tính năng đang phát triển!')">
                        <i data-feather="code"></i>
                        <span>
                            Quản lý API
                            <small class="text-muted">(Soon)</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" onclick="alert('Tính năng đang phát triển!')">
                        <i data-feather="alert-triangle"></i>
                        <span>
                            Quản lý Khiếu nại
                            <small class="text-muted">(Soon)</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" onclick="alert('Tính năng đang phát triển!')">
                        <i data-feather="shield-off"></i>
                        <span>
                            Blacklist / Cảnh báo
                            <small class="text-muted">(Soon)</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" onclick="alert('Tính năng đang phát triển!')">
                        <i data-feather="activity"></i>
                        <span>
                            System Logs
                            <small class="text-muted">(Soon)</small>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
