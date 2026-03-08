@props([
    "image" => "",
    "url" => "#",
    "alt" => "",
])

<div
    {{ $attributes->merge(["class" => "aspect-square border border-gray-200 shadow-sm rounded-lg overflow-hidden dark:bg-white"]) }}
>
    <a href="{{ $url }}" target="_blank" class="block h-full w-full">
        <img src="{{ $image }}" class="h-full w-full" alt="{{ $alt }}" />
    </a>
</div>
