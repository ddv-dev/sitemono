<section class="bg-cream py-40">
    <div class="container">
        <div class="sec-label"><span class="sec-label-line"></span>Города</div>
        <h2 class="fs-40 fw-bold mb-40">Доставляем во все города МО</h2>

        @php
            $cities = [
                'Одинцовский р-н',
                'Истринский р-н',
                'Нарофоминский р-н',
                'Тучково',
                'Руза',
                'Калюбакино',
            ];
        @endphp

        <div class="cities-grid">
            @foreach ($cities as $city)
                <a href="/callback" class="city-link">
                    <span class="city-dot"></span>
                    <span class="fs-16 fw-medium">{{ $city }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>
