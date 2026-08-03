<section class="py-40 bg-cream">
    <div class="container">
        <div class="sec-label"><span class="sec-label-line"></span>Фото завода</div>
        <h2 class="fs-40 fw-bold mb-40">Производство</h2>

        <div class="photo-grid">
            @forelse ($factoryPhotos as $photo)
                <div class="photo-ph">
                    @if ($photo->image_url)
                        <img src="{{ $photo->image_url }}" alt="{{ $photo->title }}" loading="lazy">
                    @else
                        <svg class="photo-ph-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="9" cy="9" r="2" />
                            <path d="m21 15-4.5-4.5L5 21" />
                        </svg>
                        @if ($photo->title)
                            <span class="photo-ph-text">{{ $photo->title }}</span>
                        @endif
                    @endif
                </div>
            @empty
                {{-- Фото ещё не добавлены — заглушки --}}
                @foreach (['Производственная линия', 'Лаборатория', 'Автопарк'] as $title)
                    <div class="photo-ph">
                        <svg class="photo-ph-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="9" cy="9" r="2" />
                            <path d="m21 15-4.5-4.5L5 21" />
                        </svg>
                        <span class="photo-ph-text">{{ $title }}</span>
                    </div>
                @endforeach
            @endforelse
        </div>
    </div>
</section>
