{{-- resources/views/partials/pumps.blade.php --}}


@if (isset($pumps) && $pumps->count() > 0)
    <section class="container py-40">
        <h1 class="mb-36">Стоимость аренды автобетононасоса</h1>

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
            </tbody>
        </table>
        <div class="d-flex column">

                <p class="text-muted mt-16 fs-14">Доп. бетоновод +700 ₽ · Доп. шланг +2 000 ₽ · Гаситель +2 000 ₽ · Перестановка АБН +2 000 ₽</p>

            <div class="card-green">Скидка 5% на насос при заказе нашего бетона</div>
        </div>

    </section>
@endif
