@extends("admin.layouts.master")
@section("content")
    {{-- Row 1: Cần xử lý ngay --}}
    <div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget">
                <div class="dash-widgetimg">
                    <span><img src="/assets/img/icons/dash1.svg" alt="img" /></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5><span class="counters" data-count="12">0</span></h5>
                    <h6>Báo cáo chờ duyệt</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget dash1">
                <div class="dash-widgetimg">
                    <span><img src="/assets/img/icons/dash2.svg" alt="img" /></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5><span class="counters" data-count="1250">0</span></h5>
                    <h6>Lượt tra cứu hôm nay</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span><img src="/assets/img/icons/dash3.svg" alt="img" /></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>
                        <span class="counters" data-count="350000000">0</span>
                        ₫
                    </h5>
                    <h6>Quỹ bảo hiểm</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="dash-widget dash3">
                <div class="dash-widgetimg">
                    <span><img src="/assets/img/icons/dash4.svg" alt="img" /></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>
                        <span class="counters" data-count="2500000000">0</span>
                        ₫
                    </h5>
                    <h6>Tổng thiệt hại</h6>
                </div>
            </div>
        </div>
    </div>

    {{-- Row 2: Thống kê tổng quan --}}
    <div class="row">
        <div class="col-lg-3 col-sm-6 d-flex col-12">
            <div class="dash-count">
                <div class="dash-counts">
                    <h4>156</h4>
                    <h5>Đối tượng Scam</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="alert-triangle"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex col-12">
            <div class="dash-count das1">
                <div class="dash-counts">
                    <h4>423</h4>
                    <h5>Tổng báo cáo</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="file-text"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex col-12">
            <div class="dash-count das2">
                <div class="dash-counts">
                    <h4>1,205</h4>
                    <h5>Tổng bình luận</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="message-square"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex col-12">
            <div class="dash-count das3">
                <div class="dash-counts">
                    <h4>38</h4>
                    <h5>Bài viết</h5>
                </div>
                <div class="dash-imgs">
                    <i data-feather="edit"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Row 3: Chart + Top tra cứu --}}
    <div class="row">
        <div class="col-lg-7 col-sm-12 d-flex col-12">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between align-items-center pb-0">
                    <h5 class="card-title mb-0">Lượt tra cứu theo tuần</h5>
                    <div class="graph-sets">
                        <ul>
                            <li><span>Tìm thấy</span></li>
                            <li><span>Không tìm thấy</span></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div id="sales_charts"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-sm-12 d-flex col-12">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between align-items-center pb-0">
                    <h4 class="card-title mb-0">Top 5 tra cứu hôm nay</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive dataview">
                        <table class="datatable table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Từ khóa</th>
                                    <th>Lượt</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>0912345678</td>
                                    <td>52</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>1234567890123</td>
                                    <td>38</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>facebook.com/scammer01</td>
                                    <td>25</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>0987654321</td>
                                    <td>19</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>9876543210987</td>
                                    <td>14</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Row 4: Báo cáo gần nhất --}}
    <div class="card mb-0">
        <div class="card-body">
            <h4 class="card-title">Báo cáo gần nhất</h4>
            <div class="table-responsive dataview">
                <table class="datatable table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Loại</th>
                            <th>Đối tượng</th>
                            <th>Người gửi</th>
                            <th>Thiệt hại</th>
                            <th>Trạng thái</th>
                            <th>Ngày gửi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#RPT001</td>
                            <td>STK</td>
                            <td>1234567890 — Nguyễn Văn A</td>
                            <td>Ẩn danh</td>
                            <td>5,000,000 ₫</td>
                            <td><span class="badges bg-lightyellow">Chờ duyệt</span></td>
                            <td>13/03/2026</td>
                        </tr>
                        <tr>
                            <td>#RPT002</td>
                            <td>SĐT</td>
                            <td>0912345678</td>
                            <td>Trần Thị B</td>
                            <td>2,000,000 ₫</td>
                            <td><span class="badges bg-lightgreen">Đã duyệt</span></td>
                            <td>12/03/2026</td>
                        </tr>
                        <tr>
                            <td>#RPT003</td>
                            <td>Website</td>
                            <td>scam-site.com</td>
                            <td>Lê Văn C</td>
                            <td>10,000,000 ₫</td>
                            <td><span class="badges bg-lightyellow">Chờ duyệt</span></td>
                            <td>12/03/2026</td>
                        </tr>
                        <tr>
                            <td>#RPT004</td>
                            <td>STK</td>
                            <td>9876543210 — Phạm Thị D</td>
                            <td>Ẩn danh</td>
                            <td>15,000,000 ₫</td>
                            <td><span class="badges bg-lightred">Từ chối</span></td>
                            <td>11/03/2026</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
