{{-- Modern & Beautiful Tailwind Pagination --}}
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-col items-center gap-2 mt-4">
        <div class="text-sm text-gray-500 mb-1">
            Menampilkan
            <span class="font-semibold text-gray-700">{{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1 }}</span>
            -
            <span class="font-semibold text-gray-700">{{ ($paginator->currentPage() - 1) * $paginator->perPage() + $paginator->count() }}</span>
            dari
            <span class="font-semibold text-gray-700">{{ $paginator->total() }}</span>
            data
        </div>
        <ul class="inline-flex items-center gap-1">
            {{-- First Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-400 cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7M19 19l-7-7 7-7" /></svg>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->url(1) }}" class="w-9 h-9 flex items-center justify-center rounded-full bg-white text-blue-600 border border-gray-200 hover:bg-blue-50 transition" title="Halaman Pertama">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7M19 19l-7-7 7-7" /></svg>
                    </a>
                </li>
            @endif
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li>
                    <span class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-400 cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="w-9 h-9 flex items-center justify-center rounded-full bg-white text-blue-600 border border-gray-200 hover:bg-blue-50 transition" title="Sebelumnya">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" /></svg>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li>
                        <span class="w-9 h-9 flex items-center justify-center rounded-full text-gray-400">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <span class="w-9 h-9 flex items-center justify-center rounded-full bg-blue-600 text-white font-bold shadow transition">{{ $page }}</span>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="w-9 h-9 flex items-center justify-center rounded-full bg-white text-blue-600 border border-gray-200 hover:bg-blue-50 font-semibold transition" title="Halaman {{ $page }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="w-9 h-9 flex items-center justify-center rounded-full bg-white text-blue-600 border border-gray-200 hover:bg-blue-50 transition" title="Berikutnya">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </a>
                </li>
            @else
                <li>
                    <span class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-400 cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" /></svg>
                    </span>
                </li>
            @endif
            {{-- Last Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->url($paginator->lastPage()) }}" class="w-9 h-9 flex items-center justify-center rounded-full bg-white text-blue-600 border border-gray-200 hover:bg-blue-50 transition" title="Halaman Terakhir">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" /></svg>
                    </a>
                </li>
            @else
                <li>
                    <span class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-100 text-gray-400 cursor-not-allowed">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7" /></svg>
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
