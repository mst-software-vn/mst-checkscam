@props([
    "status",
])

@php
    $map = [
        "pending" => ["bg-lightyellow", "Chờ duyệt"],
        "approved" => ["bg-lightgreen", "Đã duyệt"],
        "rejected" => ["bg-lightred", "Từ chối"],
        "active" => ["bg-lightgreen", "Hoạt động"],
        "inactive" => ["bg-lightred", "Tạm dừng"],
        "expired" => ["bg-lightred", "Hết hạn"],
        "admin" => ["bg-lightgreen", "Admin"],
        "moderator" => ["bg-lightyellow", "Moderator"],
    ];
    $badge = $map[$status] ?? ["bg-lightgrey", ucfirst($status)];
@endphp

<span class="badges {{ $badge[0] }}">{{ $badge[1] }}</span>
