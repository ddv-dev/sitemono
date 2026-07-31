<section class="py-40 bg-cream">
    <div class="container">
        <div class="sec-label"><span class="sec-label-line"></span>Фото завода</div>
        <h2 class="fs-40 fw-bold mb-40">Производство</h2>

        @php
            $photos = ['Производственная линия', 'Лаборатория', 'Автопарк'];
        @endphp

        <div class="photo-grid">
            @foreach ($photos as $photo)
                <div class="photo-ph">
                    <svg class="photo-ph-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"
                        stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                        <circle cx="9" cy="9" r="2" />
                        <path d="m21 15-4.5-4.5L5 21" />
                    </svg>
                    <span class="photo-ph-text">{{ $photo }}</span>
                </div>
            @endforeach
        </div>

        <p class="fs-14 text-muted mt-20">Фото предоставит заказчик. Placeholder для реальных изображений завода.</p>
    </div>
</section>
