@if (isset($prices) && $prices->count() > 0)
    <section class="container py-40">
        <div class="fw-medium fs-18 mb-16">— Прайс-лист</div>

        <h1 class="mb-36">Цены на бетон</h1>
        @php
            $groupedPrices = $prices->groupBy('type_name');
        @endphp

        @forelse($groupedPrices as $typeName => $typePrices)
            <h3 class="fw-bold mt-20 text-primary">{{ $typeName }}</h3>

            <table class="price-table mt-20">
                <thead>
                    <tr>
                        <th>Класс</th>
                        <th>Марка</th>
                        <th>Цена за 1 \м³</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($typePrices as $index => $price)
                        <tr>
                            <td class="fw-medium">
                                {{ $price['grade_class'] }}
                            </td>
                            <td class="fw-medium">{{ $price['grade_name'] }}</td>
                            <td>
                                {{ $price['formatted_price'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        @empty
            <div class="text-muted">
                Цены временно не доступны
            </div>
        @endforelse
        <p class="mt-20 ps-14 fw-medium">
            Минимальный заказ 3 м³. Цены указаны без учёта доставки.
        </p>

    </section>
@endif
