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
                    <h5><span class="counters" data-count="{{ $metrics["pending_reports"] }}">0</span></h5>
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
                    <h5><span class="counters" data-count="{{ $metrics["searches_today"] }}">0</span></h5>
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
                        <span class="counters" data-count="{{ (int) $metrics["insurance_fund"] }}">0</span>
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
                        <span class="counters" data-count="{{ (int) $metrics["total_damage"] }}">0</span>
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
                    <h4>{{ number_format($metrics["total_scammers"]) }}</h4>
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
                    <h4>{{ number_format($metrics["total_reports"]) }}</h4>
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
                    <h4>{{ number_format($metrics["total_comments"]) }}</h4>
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
                    <h4>{{ number_format($metrics["total_posts"]) }}</h4>
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Từ khóa</th>
                                    <th>Lượt</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($topSearches as $index => $search)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $search->search_query }}</td>
                                        <td>{{ number_format($search->count) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-muted text-center">Chưa có dữ liệu hôm nay.</td>
                                    </tr>
                                @endforelse
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
                <table class="table">
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
                        @forelse ($latestReports as $report)
                            <tr>
                                <td>#RPT{{ str_pad($report->id, 3, "0", STR_PAD_LEFT) }}</td>
                                <td>{{ $report->type === "account" ? "STK" : "Website" }}</td>
                                <td>
                                    {{ $report->target_id }}
                                    @if ($report->target_name)
                                        — {{ $report->target_name }}
                                    @endif
                                </td>
                                <td>{{ $report->is_anonymous ? "Ẩn danh" : $report->reporter_name }}</td>
                                <td>
                                    {{ $report->damage_amount ? number_format($report->damage_amount, 0, ",", ",") . " ₫" : "—" }}
                                </td>
                                <td>
                                    @if ($report->status === "pending")
                                        <span class="badges bg-lightyellow">Chờ duyệt</span>
                                    @elseif ($report->status === "approved")
                                        <span class="badges bg-lightgreen">Đã duyệt</span>
                                    @else
                                        <span class="badges bg-lightred">Từ chối</span>
                                    @endif
                                </td>
                                <td>{{ $report->created_at->format("d/m/Y") }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-muted text-center">Chưa có báo cáo nào.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @push("scripts")
        <script>
            $(document).ready(function () {
                if ($('#sales_charts').length > 0) {
                    const weeklyStats = @json($weeklyStats);

                    // Hủy biểu đồ cũ nếu nó được khởi tạo bởi chart-data.js
                    // Thường thì ApexCharts sẽ ghi đè nếu render lại vào cùng 1 selector
                    // nhưng để chắc chắn ta có thể clear nội dung
                    $('#sales_charts').empty();

                    const options = {
                        series: [
                            {
                                name: 'Tìm thấy',
                                data: weeklyStats.found,
                            },
                            {
                                name: 'Không tìm thấy',
                                data: weeklyStats.not_found,
                            },
                        ],
                        colors: ['#28C76F', '#EA5455'],
                        chart: {
                            type: 'bar',
                            height: 300,
                            stacked: true,
                            zoom: {
                                enabled: false,
                            },
                            toolbar: {
                                show: false,
                            },
                        },
                        responsive: [
                            {
                                breakpoint: 280,
                                options: {
                                    legend: {
                                        position: 'bottom',
                                        offsetY: 0,
                                    },
                                },
                            },
                        ],
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: '35%',
                                borderRadius: 5,
                                dataLabels: {
                                    total: {
                                        enabled: false,
                                    },
                                },
                            },
                        },
                        xaxis: {
                            categories: weeklyStats.labels,
                        },
                        legend: {
                            show: false,
                        },
                        fill: {
                            opacity: 1,
                        },
                        tooltip: {
                            y: {
                                formatter: function (val) {
                                    return val + ' lượt';
                                },
                            },
                        },
                    };

                    const chart = new ApexCharts(document.querySelector('#sales_charts'), options);
                    chart.render();
                }
            });
        </script>
    @endpush
@endsection
