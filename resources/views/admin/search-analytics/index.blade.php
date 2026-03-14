@extends("admin.layouts.master")
@section("content")
    @include(
        "admin.components.page-header",
        [
            "title" => "Search Analytics",
            "subtitle" => "Thống kê lượt tra cứu và từ khóa phổ biến",
        ]
    )

    {{-- Row: Summary Cards --}}
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="dash-widget">
                <div class="dash-widgetimg">
                    <span><img src="/assets/img/icons/dash2.svg" alt="img" /></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5><span class="counters" data-count="{{ $totalSearches }}">0</span></h5>
                    <h6>Tổng lượt tra cứu</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="dash-widget dash1">
                <div class="dash-widgetimg">
                    <span><img src="/assets/img/icons/dash1.svg" alt="img" /></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5><span class="counters" data-count="{{ $searchesToday }}">0</span></h5>
                    <h6>Lượt tra cứu hôm nay</h6>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12">
            <div class="dash-widget dash2">
                <div class="dash-widgetimg">
                    <span><img src="/assets/img/icons/dash3.svg" alt="img" /></span>
                </div>
                <div class="dash-widgetcontent">
                    <h5>{{ $foundRate }}%</h5>
                    <h6>Tỷ lệ tìm thấy scammer</h6>
                </div>
            </div>
        </div>
    </div>

    {{-- Hot Targets --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Đối tượng được tìm nhiều nhất (30 ngày)</h5>
            <div class="table-responsive">
                <table class="datanew table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Từ khoá / STK / SĐT</th>
                            <th>Lượt tra cứu</th>
                            <th>Số báo cáo (đã duyệt)</th>
                            <th>Đang chờ duyệt</th>
                            <th>Mức độ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hotTargets as $index => $target)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><strong>{{ $target->search_query }}</strong></td>
                                <td>{{ number_format($target->search_count) }}</td>
                                <td>{{ $target->report_count }}</td>
                                <td>
                                    @if ($target->pending_count > 0)
                                        <span class="badges bg-lightyellow">{{ $target->pending_count }} chờ</span>
                                    @else
                                        <span class="text-muted">0</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($target->report_count >= 5)
                                        <span class="badges bg-lightred">Rất nguy hiểm</span>
                                    @elseif ($target->report_count >= 2)
                                        <span class="badges bg-lightyellow">Cần chú ý</span>
                                    @elseif ($target->report_count >= 1)
                                        <span class="badges bg-lightgreen">Có báo cáo</span>
                                    @else
                                        <span class="text-muted">Chưa có</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-muted py-4 text-center">Chưa có dữ liệu tra cứu.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Recent Searches --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Lịch sử tra cứu gần nhất</h5>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Thời gian</th>
                            <th>Từ khoá</th>
                            <th>IP</th>
                            <th>Kết quả</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($recentSearches as $search)
                            <tr>
                                <td>{{ $search->created_at->format("d/m/Y H:i") }}</td>
                                <td><strong>{{ $search->search_query }}</strong></td>
                                <td>{{ $search->ip_address ?? "—" }}</td>
                                <td>
                                    @if ($search->is_found)
                                        <span class="badges bg-lightred">Tìm thấy scammer</span>
                                    @else
                                        <span class="badges bg-lightgreen">Không tìm thấy</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-muted py-4 text-center">Chưa có lịch sử tra cứu.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
