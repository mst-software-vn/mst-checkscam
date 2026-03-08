@props([
    "image" => "",
    "url" => "#",
    "alt" => "",
])

<div class="mx-auto max-w-[950px] overflow-hidden rounded-lg dark:bg-white">
    <a href="{{ $url }}" target="_blank">
        <img src="{{ $image }}" class="h-16 w-full md:h-18 md:h-full" alt="{{ $alt }}" />
    </a>
</div>
