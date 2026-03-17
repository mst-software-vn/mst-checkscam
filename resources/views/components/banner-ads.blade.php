@props([
  'position',
  'limit' => 1,
  'skip' => 0,
  'class' => 'mb-6',
])

@php
  $query = \App\Models\Banner::active()
    ->forPosition($position)
    ->ordered();

  if ($skip > 0) {
    $query->skip($skip);
  }

  if ($limit) {
    $query->take($limit);
  }

  $banners = $query->get();
@endphp

@if ($banners->count() > 0)
  <div class="banner-ads-container">
    @foreach ($banners as $banner)
      <div class="{{ $class }} last:mb-0">
        @if ($banner->type === 'horizontal')
          <x-ads-horizontal :image="$banner->image_path" :url="$banner->redirect_url ?? '#'" :alt="$banner->title" />
        @else
          <x-ads-square :image="$banner->image_path" :url="$banner->redirect_url ?? '#'" :alt="$banner->title" />
        @endif
      </div>
    @endforeach
  </div>
@endif
