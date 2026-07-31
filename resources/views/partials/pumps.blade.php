{{-- resources/views/partials/pumps.blade.php --}}


@if (isset($pumps) && $pumps->count() > 0)
    <section class="container py-40">
        <div class="fw-medium fs-18 mb-16">— Прайс-лист</div>

        <h1 class="mb-36">Цены на бетон</h1>

        <table class="price-table mt-20">
            <thead>
                <tr>
                    <th>Тип</th>
                    <th>Длина стрелы</th>
                    <th>Смена (7+1 ч)</th>
                    <th>Где применяется</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pumps as $index => $pump)
                    <tr>
                        <td class="fw-medium">{{ $pump['type'] }}</td>
                        <td class="fw-medium">
                            {{ $pump['boom_length'] }} м
                        </td>
                        <td>
                            {{ $pump['formatted_price'] }}
                        </td>
                        <td class="fw-medium">
                            {{ $pump['application'] }}

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <div class="text-muted">
                                <i style="font-size: 2rem;"></i>
                                <p class="mt-2">Информация о автобетононасосах временно не доступна</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
                <p class="mt-20 ps-14 fw-medium">
                    Минимальный заказ 3 м³. Цены указаны без учёта доставки.
                </p>
    </section>
@endif
