@props([
    'links' => [],
])
<div class="bg-white dark:bg-dark_card border-b border-gray-100 dark:border-gray-800/80 py-4 mb-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center text-[11px] font-black uppercase tracking-widest text-gray-400">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="/" class="hover:text-cs_blue transition-colors">CheckScam</a></li>
                <li><i class="fa-solid fa-chevron-right text-[7px] opacity-50"></i></li>
                @for ($i = 0; $i < count($links) - 1; $i++)
                    <li><a href="{{ $links[$i]['url'] }}"
                            class="hover:text-cs_blue transition-colors">{{ $links[$i]['name'] }}</a>
                    </li>
                    <li><i class="fa-solid fa-chevron-right text-[7px] opacity-50"></i></li>
                @endfor
                <li class="text-cs_blue truncate max-w-[150px] md:max-w-none">{{ $links[count($links) - 1]['name'] }}
                </li>
            </ol>
        </nav>
    </div>
</div>
