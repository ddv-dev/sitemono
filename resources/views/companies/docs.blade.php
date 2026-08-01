<section class="container py-40">
    <div class="b2b-docs">
        {{-- Полный пакет документов --}}
        <div class="b2b-docs-col">
            <div class="sec-label"><span class="sec-label-line"></span>Документы</div>
            <h2 class="fs-40 fw-bold mb-40">Полный пакет документов</h2>

            @php
                $docs = [
                    'Товарная накладная (ТТН)',
                    'Паспорт качества ГОСТ 7473-2010',
                    'Протокол испытаний (7 и 28 суток)',
                    'Счёт-фактура (при работе с НДС)',
                    'Сертификаты соответствия на сырьё',
                ];
            @endphp

            <ul class="b2b-doc-list">
                @foreach ($docs as $doc)
                    <li>
                        <svg class="b2b-doc-check" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5" />
                        </svg>
                        <span>{{ $doc }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Условия сотрудничества --}}
        <div class="b2b-docs-col">
            <div class="sec-label"><span class="sec-label-line"></span>Скидки</div>
            <h2 class="fs-40 fw-bold mb-40">Условия сотрудничества</h2>

            <div class="table-scroll">
                <table class="ed-table">
                    <thead>
                        <tr>
                            <th>Объём поставки</th>
                            <th>Скидка</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>От 50 м³/мес</td>
                            <td class="ed-accent">−3%</td>
                        </tr>
                        <tr>
                            <td>От 200 м³/мес</td>
                            <td class="ed-accent">−5%</td>
                        </tr>
                        <tr>
                            <td>Индивидуально</td>
                            <td>обсуждаем</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <p class="fs-14 text-muted mt-20">Отсрочка платежа до 14 дней для партнёров с историей 3+ месяца.</p>
        </div>
    </div>
</section>
