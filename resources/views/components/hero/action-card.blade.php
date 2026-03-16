@props([
    'href' => '#',
    'icon' => 'fa-circle',
    'label' => '',
    'sub' => '',
    'color' => 'blue'
])

@php
    $colors = [
        'red'   => 'hover:bg-red-50 dark:hover:bg-red-900/10 border-red-100 bg-red-100 text-cs_red dark:bg-red-900/30 group-hover:text-cs_red',
        'blue'  => 'hover:bg-blue-50 dark:hover:bg-blue-900/10 border-blue-100 bg-blue-100 text-cs_blue dark:bg-blue-900/30 group-hover:text-cs_blue',
        'green' => 'hover:bg-green-50 dark:hover:bg-green-900/10 border-green-100 bg-green-100 text-cs_green dark:bg-green-900/30 group-hover:text-cs_green',
        'gray'  => 'hover:bg-gray-50 dark:hover:bg-slate-800 border-gray-100 bg-gray-100 text-gray-500 dark:bg-slate-800 group-hover:text-gray-800',
    ];

    $currentColor = $colors[$color] ?? $colors['blue'];
    $colorParts = explode(' ', $currentColor);
    
    $hoverBg = $colorParts[0] . ' ' . $colorParts[1];
    $iconColors = $colorParts[3] . ' ' . $colorParts[4] . ' ' . $colorParts[5];
    $labelHover = $colorParts[6];
@endphp

<a href="{{ $href }}" 
   class="group flex items-center gap-3 rounded-2xl border border-gray-100 bg-white p-3 shadow-xs transition-all md:gap-4 md:p-4 dark:border-gray-800 dark:bg-slate-900 {{ $hoverBg }}">
    
    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl transition-transform group-hover:rotate-12 md:h-12 md:w-12 md:text-xl {{ $iconColors }}">
        <i class="fa-solid {{ $icon }}"></i>
    </div>

    <div class="text-left">
        <p class="text-[8px] font-black text-gray-400 uppercase md:text-[9px] dark:text-gray-500">
            {{ $sub }}
        </p>
        <p class="text-[10px] font-black text-gray-800 uppercase transition-colors md:text-xs dark:text-gray-200 {{ $labelHover }}">
            {{ $label }}
        </p>
    </div>
</a>