@props([
    "links" => [],
])
<div class="dark:bg-dark_card mb-10 border-b border-gray-100 bg-white py-4 dark:border-gray-800/80">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <nav class="flex items-center text-[11px] font-black tracking-widest text-gray-400 uppercase">
            <ol class="inline-flex items-center space-x-2">
                <li><a href="/" class="hover:text-cs_blue transition-colors">Trang chủ</a></li>
                <li><i class="fa-solid fa-chevron-right text-[7px] opacity-50"></i></li>
                @for ($i = 0; $i < count($links) - 1; $i++)
                    <li>
                        <a href="{{ $links[$i]["url"] }}" class="hover:text-cs_blue transition-colors">
                            {{ $links[$i]["name"] }}
                        </a>
                    </li>
                    <li><i class="fa-solid fa-chevron-right text-[7px] opacity-50"></i></li>
                @endfor

                <li class="text-cs_blue max-w-[150px] truncate md:max-w-none">
                    {{ $links[count($links) - 1]["name"] }}
                </li>
            </ol>
        </nav>
    </div>
</div>
