@props([
    "image" => "",
    "url" => "#",
    "alt" => "",
])

<div class="mx-auto max-w-[950px] overflow-hidden rounded-lg dark:bg-white">
    <a href="{{ $url }}" target="_blank">
        <img src="{{ $image }}" class="h-18 w-full md:h-full" alt="{{ $alt }}" />
    </a>
</div>
