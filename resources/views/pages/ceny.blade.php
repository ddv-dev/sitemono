@extends('layouts.app')

@section('title', 'Цены на бетон и аренду насоса')
@section('meta_description', 'Актуальные цены на товарный бетон и аренду автобетононасоса в Подмосковье — прямые от завода, без наценок посредников. Наличный и безналичный расчёт, система скидок.')

@section('content')
    {{-- HERO --}}
    <section class="pagehero">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <span>Цены</span></div>
            <span class="eyebrow" style="margin-top:18px">Прямые цены от завода · Без наценок посредников</span>
            <h1 class="pagehero__title">Актуальные цены на бетон и насос в Подмосковье — <span class="accent">без скрытых наценок</span></h1>
            <p class="pagehero__sub">Цены прямые от завода-производителя. Наценок посредников нет. Стоимость доставки рассчитывается отдельно по удалённости объекта.</p>
            <div class="pagehero__chips">
                <a href="#price" class="chip chip--dark">@include('icons.ruble') Бетон</a>
                <a href="{{ route('nasos') }}" class="chip chip--dark">@include('icons.pump') Насосы</a>
                <a href="{{ route('dostavka') }}" class="chip chip--dark">@include('icons.truck') Доставка</a>
            </div>
        </div>
    </section>

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
                        <caption>Бетон на щебне из гравия</caption>
                        <thead>
                            <tr>
                                <th>Класс / марка</th>
                                <th>Наличный</th>
                                <th>Безналичный</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ([
                                ['БСГ В7,5 П4 Ф25 W2', 'М100', '5 200 ₽/м³', '5 950 ₽/м³'],
                                ['БСГ В10 П4 Ф25 W4', 'М150', '5 400 ₽/м³', '6 200 ₽/м³'],
                                ['БСГ В15 П4 Ф25 W4', 'М200', '5 600 ₽/м³', '6 400 ₽/м³'],
                                ['БСГ В20 П4 Ф50 W6', 'М250', '5 800 ₽/м³', '6 600 ₽/м³'],
                                ['БСГ В22,5 П4 Ф50 W6', 'М300', '6 000 ₽/м³', '6 850 ₽/м³'],
                                ['БСГ В25 П4 Ф100 W6', 'М350', '6 500 ₽/м³', '7 100 ₽/м³'],
                                ['БСГ В30 П4 Ф100 W6', 'М400', '7 100 ₽/м³', '7 550 ₽/м³'],
                            ] as [$cls, $m, $cash, $bank])
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
                        <caption>Тощий бетон и строительный раствор</caption>
                        <tbody>
                            @foreach ([
                                ['Тощий бетон БСГ В7,5 Ж3 Ф25 W2', '4 900 ₽/м³', '—'],
                                ['Тощий бетон БСГ В10 Ж3 Ф25 W4', '5 100 ₽/м³', '—'],
                                ['Тощий бетон БСГ В15 Ж3 Ф25 W4', '5 300 ₽/м³', '6 300 ₽/м³'],
                                ['Раствор строительный М100', '4 700 ₽/м³', '5 400 ₽/м³'],
                                ['Раствор строительный М150', '5 000 ₽/м³', '5 700 ₽/м³'],
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
                <div class="table-foot">Цены указаны без учёта доставки. Минимальный заказ 3 м³. Точная стоимость доставки — по удалённости объекта.</div>
            </div>
        </div>
    </section>

    {{-- КАЛЬКУЛЯТОР --}}
    <section class="section section--white" id="calc">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Калькулятор</span>
                <h2 class="section-title" style="margin-top:16px">Рассчитать итоговую стоимость</h2>
            </div>
            @include('partials.calculator')
        </div>
    </section>

    {{-- УСЛОВИЯ ОПЛАТЫ --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Оплата</span>
                <h2 class="section-title" style="margin-top:16px">Условия оплаты</h2>
            </div>
            <div class="grid grid-3">
                @foreach ([
                    ['ruble', 'Наличный расчёт', 'Оплата водителю при получении. Выдаём кассовый чек. Для физических лиц.'],
                    ['doc', 'Безналичный без НДС', 'Счёт, накладная (ТТН), паспорт качества. Для ИП и компаний на УСН.'],
                    ['award', 'Безналичный с НДС', 'Счёт-фактура, накладная, паспорт, протоколы испытаний. Для юрлиц на ОСНО.'],
                ] as [$ic, $t, $d])
                    <div class="card">
                        <div class="card__ico">@include('icons.'.$ic)</div>
                        <h3 class="card__title">{{ $t }}</h3>
                        <p class="card__text">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- СКИДКИ --}}
    <section class="section section--dark">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Скидки</span>
                <h2 class="section-title" style="margin-top:16px">Система скидок</h2>
            </div>
            <div class="grid grid-4">
                @foreach ([
                    ['От 50 м³', '−3%', 'на разовый заказ объёмом от 50 кубов'],
                    ['От 200 м³ / мес', '−5%', 'для регулярных объёмов поставки'],
                    ['Постоянный клиент 3+ мес', 'персональная', 'индивидуальные условия и цены'],
                    ['Бетон + насос вместе', '−5% на насос', 'при заказе нашего бетона'],
                ] as [$t, $val, $d])
                    <div class="card card--dark">
                        <div class="hero__price" style="color:var(--orange);font-size:34px">{{ $val }}</div>
                        <h3 class="card__title" style="margin-top:12px">{{ $t }}</h3>
                        <p class="card__text">{{ $d }}</p>
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
