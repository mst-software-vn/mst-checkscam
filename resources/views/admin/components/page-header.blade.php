@props([
    "title",
    "subtitle" => "",
    "btnText" => "",
    "btnUrl" => "",
])

<div class="page-header">
    <div class="page-title">
        <h4>{{ $title }}</h4>
        @if ($subtitle)
            <h6>{{ $subtitle }}</h6>
        @endif
    </div>
    @if ($btnText)
        <div class="page-btn">
            <a href="{{ $btnUrl }}" class="btn btn-added">
                <img src="/assets/img/icons/plus.svg" alt="img" class="me-1" />
                {{ $btnText }}
            </a>
        </div>
    @endif
</div>
