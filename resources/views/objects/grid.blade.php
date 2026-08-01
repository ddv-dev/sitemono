<section class="container pb-80">
    {{-- Фильтр по категориям --}}
    <div class="obj-filter" id="objFilter">
        <button type="button" class="filter-btn active" data-filter="all">Все</button>
        @foreach ($categories as $key => $labels)
            <button type="button" class="filter-btn" data-filter="{{ $key }}">{{ $labels[0] }}</button>
        @endforeach
    </div>

    {{-- Сетка объектов --}}
    <div class="obj-grid" id="objGrid">
        @forelse ($objects as $object)
            <article class="obj-card" data-category="{{ $object->category }}">
                <div class="obj-ph">
                    @if ($object->photo_url)
                        <img src="{{ $object->photo_url }}" alt="{{ $object->title }}" loading="lazy">
                    @else
                        <svg class="obj-ph-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 21h18M5 21V7l7-4 7 4v14M9 9h.01M9 13h.01M9 17h.01M15 9h.01M15 13h.01M15 17h.01" />
                        </svg>
                    @endif
                </div>
                <div class="obj-body">
                    <span class="obj-cat obj-cat-{{ $object->category }}">{{ $object->category_badge }}</span>
                    <h3 class="obj-title">{{ $object->title }}</h3>
                    <div class="obj-meta">
                        <div class="obj-row"><span class="obj-k">Город:</span> <span
                                class="obj-v">{{ $object->city }}</span></div>
                        @if ($object->formatted_volume)
                            <div class="obj-row"><span class="obj-k">Объём:</span> <span
                                    class="obj-v">{{ $object->formatted_volume }}</span></div>
                        @endif
                        @if ($object->marks_line)
                            <div class="obj-row"><span class="obj-k">Марка:</span> <span
                                    class="obj-v">{{ $object->marks_line }}</span></div>
                        @endif
                        @if ($object->years_line)
                            <div class="obj-row"><span class="obj-k">Год:</span> <span
                                    class="obj-v">{{ $object->years_line }}</span></div>
                        @endif
                    </div>
                </div>
            </article>
        @empty
            <p class="text-muted">Объекты скоро появятся.</p>
        @endforelse
    </div>

    <p class="obj-empty text-muted text-center mt-20" id="objEmpty" hidden>В этой категории пока нет объектов.</p>
</section>
