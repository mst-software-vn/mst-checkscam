@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Search Analytics",
            "subtitle" => "Thống kê lượt tra cứu từ người dùng",
        ]
    )

    {{-- Row 1: Thống kê tổng quan --}}
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="dash-widget">
                <div class="dash-widgetimg">
                    <span><img src="/assets/img/icons/dash1.svg" alt="img" /></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5><span class="counters" data-count="350000">0</span></h5>
                    <h6>Tổng lượt tra cứu</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="dash-widget dash1">
                <div class="dash-widgetimg">
                    <span><img src="/assets/img/icons/dash2.svg" alt="img" /></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>
                        <span class="counters" data-count="35">0</span>
                        %
                    </h5>
                    <h6>Tỷ lệ tìm thấy (Có báo cáo lừa đảo)</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span><img src="/assets/img/icons/dash3.svg" alt="img" /></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5><span class="counters" data-count="1250">0</span></h5>
                    <h6>Lượt search hôm nay</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Hot Targets --}}
        <div class="col-lg-5 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center pb-0">
                    <h4 class="card-title mb-0">Hot Targets (30 ngày qua)</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Từ khóa tra cứu</th>
                                    <th>Lượt search</th>
                                    <th>Tình trạng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>0912345678</td>
                                    <td>1,200</td>
                                    <td><span class="badges bg-lightred">Đã có báo cáo (5)</span></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>1234567890123</td>
                                    <td>950</td>
                                    <td><span class="badges bg-lightgreen">Sạch (0)</span></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>facebook.com/scammer</td>
                                    <td>845</td>
                                    <td><span class="badges bg-lightred">Đã có báo cáo (12)</span></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>0987654321</td>
                                    <td>620</td>
                                    <td><span class="badges bg-lightyellow">Chờ duyệt (1)</span></td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>game-bai-doi-thuong.net</td>
                                    <td>410</td>
                                    <td><span class="badges bg-lightred">Đã có báo cáo (8)</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- Lịch sử tra cứu gần nhất --}}
        <div class="col-lg-7 col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center pb-0">
                    <h4 class="card-title mb-0">Lịch sử tra cứu gần nhất</h4>
                    <div class="dropdown dropdown-action">
                        <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="feather-filter"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="javascript:void(0);">Tất cả</a>
                            <a class="dropdown-item" href="javascript:void(0);">Tìm thấy</a>
                            <a class="dropdown-item" href="javascript:void(0);">Không tìm thấy</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Thời gian</th>
                                    <th>Từ khóa (Query)</th>
                                    <th>Địa chỉ IP</th>
                                    <th>Kết quả</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Vừa xong</td>
                                    <td>0912345678</td>
                                    <td>113.160.xxx.xxx</td>
                                    <td><span class="badges bg-lightred">Tìm thấy (Scam)</span></td>
                                </tr>
                                <tr>
                                    <td>2 phút trước</td>
                                    <td>190345678902</td>
                                    <td>14.168.xxx.xxx</td>
                                    <td><span class="badges bg-lightgreen">Không tìm thấy</span></td>
                                </tr>
                                <tr>
                                    <td>5 phút trước</td>
                                    <td>facebook.com/nguoila</td>
                                    <td>27.72.xxx.xxx</td>
                                    <td><span class="badges bg-lightgreen">Không tìm thấy</span></td>
                                </tr>
                                <tr>
                                    <td>12 phút trước</td>
                                    <td>scam-site.com</td>
                                    <td>171.244.xxx.xxx</td>
                                    <td><span class="badges bg-lightred">Tìm thấy (Scam)</span></td>
                                </tr>
                                <tr>
                                    <td>15 phút trước</td>
                                    <td>0987654321</td>
                                    <td>115.79.xxx.xxx</td>
                                    <td><span class="badges bg-lightyellow">Chờ duyệt</span></td>
                                </tr>
                                <tr>
                                    <td>30 phút trước</td>
                                    <td>momo.vn/chuyen-tien</td>
                                    <td>125.212.xxx.xxx</td>
                                    <td><span class="badges bg-lightgreen">Không tìm thấy</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
