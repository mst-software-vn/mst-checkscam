  @props([
      'image' => '',
      'url' => '#',
      'alt' => '',
  ])

  <div class="max-w-[950px] dark:bg-white rounded-lg overflow-hidden mx-auto">
      <a href="{{ $url }}" target="_blank">
          <img src="{{ $image }}" class="w-full h-18 md:h-full" alt="{{ $alt }}">
      </a>
  </div>
