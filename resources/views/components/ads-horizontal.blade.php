@props([
  'image' => '',
  'url' => '#',
  'alt' => '',
])

<div class="mx-auto max-w-[950px] overflow-hidden rounded-lg dark:bg-white">
  <a href="{{ $url }}" target="_blank">
    <img
      src="{{ Str::startsWith($image, ['http://', 'https://']) ? $image : asset('uploads/' . $image) }}"
      class="h-12 w-full md:h-full md:min-h-12"
      alt="{{ $alt }}"
    />
  </a>
</div>
