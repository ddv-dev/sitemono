@extends('layouts.app')

@section('title', 'Купить бетон с доставкой по МО')
@section('meta_description', 'Товарный бетон М100–М500 с доставкой по Московской области от 5 600 ₽/м³. ГОСТ 7473-2010, паспорт качества в каждой машине, своя лаборатория, работа 24/7.')

@section('content')
    {{-- HERO --}}
    <section class="pagehero">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <span>Бетон</span></div>
            <span class="eyebrow" style="margin-top:18px">М100–М500 · ГОСТ 7473-2010 · Гравий и гранит · Тёплый зимой</span>
            <h1 class="pagehero__title">Купить бетон с доставкой по МО — <span class="accent">от 5 600 ₽/м³</span>, паспорт качества в каждой машине</h1>
            <p class="pagehero__sub">Производим и доставляем товарный бетон всех марок. Своя лаборатория, паспорт с каждой машиной, работа 24/7.</p>
            <div class="pagehero__actions">
                <a href="#calc" class="btn btn--primary btn--lg">Получить расчёт с доставкой →</a>
                <a href="#price" class="btn btn--ghost-light btn--lg">Смотреть прайс</a>
            </div>
            <div class="pagehero__chips">
                <span class="chip chip--dark">@include('icons.check') ГОСТ 7473-2010</span>
                <span class="chip chip--dark">@include('icons.lab') Своя лаборатория</span>
                <span class="chip chip--dark">@include('icons.ruble') НДС / без НДС</span>
                <span class="chip chip--dark">@include('icons.doc') Паспорт с каждой партией</span>
            </div>
        </div>
    </section>

    {{-- ПОЛОСА ДОВЕРИЯ --}}
    <div class="trust-bar">
        <div class="container">
            <div class="trust-bar__item">@include('icons.check') Паспорт качества с каждой машиной</div>
            <div class="trust-bar__item">@include('icons.check') Выезд от 2 часов</div>
            <div class="trust-bar__item">@include('icons.check') Бетон + насос — 1 заказ</div>
            <div class="trust-bar__item">@include('icons.check') Собственный завод МО</div>
        </div>
    </div>

    {{-- ПРАЙС --}}
    <section class="section section--paper" id="price">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Прайс-лист</span>
                <h2 class="section-title" style="margin-top:16px">Цены на бетон — актуальны на сегодня</h2>
            </div>

            <div class="price-table-wrap">
                <div class="table-scroll">
                    <table class="price-table">
                        <caption>Товарный бетон (ГОСТ 7473-2010)</caption>
                        <thead>
                            <tr>
                                <th>Марка / класс</th>
                                <th>Цена 1 м³ (наличный)</th>
                                <th>Цена 1 м³ (безналичный)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ([
                                ['М100', 'В7,5', '4 700 ₽', '5 400 ₽'],
                                ['М150', 'В12,5', '5 000 ₽', '5 700 ₽'],
                                ['М200', 'В15', '5 300 ₽', '6 000 ₽'],
                                ['М250', 'В20', '5 600 ₽', '6 400 ₽'],
                                ['М300', 'В22,5', '5 800 ₽', '6 600 ₽'],
                                ['М350', 'В25', '6 500 ₽', '7 100 ₽'],
                                ['М400', 'В30', '7 100 ₽', '7 550 ₽'],
                            ] as [$m, $cls, $cash, $bank])
                                <tr>
                                    <td class="cell-name">{{ $m }} <span class="text-muted" style="font-weight:400">· {{ $cls }}</span></td>
                                    <td class="cell-price">{{ $cash }}</td>
                                    <td class="cell-price">{{ $bank }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-scroll" style="border-top:1px solid var(--line)">
                    <table class="price-table">
                        <caption>Бетон на щебне из гравия · тощий бетон · раствор</caption>
                        <tbody>
                            @foreach ([
                                ['БСГ В7,5 П4 Ф25 W2 (тощий)', '4 900 ₽', '5 600 ₽'],
                                ['БСГ В15 П4 Ф25 W4', '5 500 ₽', '6 300 ₽'],
                                ['БСГ В22,5 П4 Ф50 W6', '6 300 ₽', '6 850 ₽'],
                                ['БСГ В25 П4 Ф100 W6 (полы)', '6 500 ₽', '7 450 ₽'],
                                ['Раствор строительный М100', '4 700 ₽', '5 400 ₽'],
                            ] as [$name, $cash, $bank])
                                <tr>
                                    <td class="cell-name">{{ $name }}</td>
                                    <td class="cell-price">{{ $cash }}</td>
                                    <td class="cell-price">{{ $bank }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-foot">Минимальный заказ 3 м³. Цены указаны без учёта доставки. Точная стоимость — после звонка менеджера.</div>
            </div>

            <div style="margin-top:26px">
                <a href="#calc" class="btn btn--primary btn--lg">Получить точный расчёт с доставкой →</a>
            </div>
        </div>
    </section>

    {{-- КАЛЬКУЛЯТОР --}}
    <section class="section section--white" id="calc">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Калькулятор</span>
                <h2 class="section-title" style="margin-top:16px">Рассчитать стоимость</h2>
            </div>
            @include('partials.calculator')
        </div>
    </section>

    {{-- ПОДБЕРЁМ МАРКУ --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Марки бетона</span>
                <h2 class="section-title" style="margin-top:16px">Подберём марку под вашу задачу</h2>
            </div>
            <div class="grid grid-4">
                @foreach ([
                    ['Частное строительство', 'М200–М250', 'Фундаменты, стяжки, отмостки, лестницы.', 'от 5 600 ₽/м³'],
                    ['Коммерческое строительство', 'М300', 'Перекрытия, ростверки, колонны.', 'от 6 000 ₽/м³'],
                    ['Промышленность', 'М350 / М400', 'Монолитные сваи, высоконагруженные конструкции.', 'от 6 200 ₽/м³'],
                    ['Зимний бетон', 'до −20 °C', 'Противоморозные добавки, подогрев воды.', '+300–500 ₽/м³'],
                ] as [$t, $mark, $d, $price])
                    <div class="pcard">
                        <span class="badge">{{ $mark }}</span>
                        <div class="pcard__head" style="margin-top:16px"><span class="pcard__title">{{ $t }}</span></div>
                        <p class="pcard__text">{{ $d }}</p>
                        <div class="pcard__price"><b style="font-size:22px">{{ $price }}</b></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- КАЧЕСТВО --}}
    <section class="section section--dark">
        <div class="container">
            <div class="split" style="align-items:start">
                <div>
                    <span class="eyebrow">Качество</span>
                    <h2 class="section-title" style="margin-top:16px">Почему не стоит рисковать с маркой бетона</h2>
                    <p class="section-lead">На рынке МО распространена практика занижения марки — вам привозят М250 вместо М300. Без паспорта это невозможно проверить. Мы выдаём документы с каждой машиной.</p>
                </div>
                <div class="feat-list">
                    @foreach ([
                        ['lab', 'Входной контроль сырья', 'Щебень, песок и цемент проверяются при каждой поставке. Только сертифицированное сырьё.'],
                        ['shield', 'Лабораторная проверка каждой партии', 'Аккредитованная лаборатория на территории завода. Каждая партия контролируется перед отгрузкой.'],
                        ['doc', 'Протокол испытаний на 7 и 28 сутки', 'Результаты испытаний на прочность. Документ для технадзора — выдаём без запроса.'],
                    ] as [$ic, $t, $d])
                        <div class="feat">
                            <span class="feat__ico">@include('icons.'.$ic)</span>
                            <div><h4>{{ $t }}</h4><p>{{ $d }}</p></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- КАК СДЕЛАТЬ ЗАКАЗ --}}
    <section class="section section--white">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Процесс</span>
                <h2 class="section-title" style="margin-top:16px">Как сделать заказ</h2>
            </div>
            <div class="steps steps--h">
                @foreach ([
                    ['Звонок', 'Перезвоним за 4 минуты. Уточним объём, марку, адрес доставки.'],
                    ['Расчёт и согласование', 'Назовём финальную цену с доставкой. Согласуем время подачи машины.'],
                    ['Производство', 'Бетон производится под ваш заказ с контролем состава в лаборатории.'],
                    ['Доставка с документами', 'Миксер приедет точно в срок. Водитель передаст ТТН и паспорт качества.'],
                ] as $i => [$t, $d])
                    <div class="step">
                        <span class="step__num">{{ $i + 1 }}</span>
                        <h4>{{ $t }}</h4>
                        <p>{{ $d }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.cta-phone', ['note' => 'Работаем круглосуточно · Перезвоним за 4 минуты'])

    @include('partials.lead-form', [
        'bg' => 'section--paper',
        'title' => 'Оставьте заявку — перезвоним за 4 минуты',
    ])
@endsection
