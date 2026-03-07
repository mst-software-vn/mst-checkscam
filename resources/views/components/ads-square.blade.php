  @props([
      'image' => '',
      'url' => '#',
      'alt' => '',
  ])

  <div
      {{ $attributes->merge(['class' => 'aspect-square border border-gray-200 shadow-sm rounded-lg overflow-hidden dark:bg-white']) }}>
      <a href="{{ $url }}" target="_blank" class="w-full h-full block">
          <img src="{{ $image }}" class="w-full h-full" alt="{{ $alt }}">
      </a>
  </div>
