@extends('layouts.app')

@section('title', 'Аренда автобетононасоса в Подмосковье')
@section('meta_description', 'Аренда автобетононасоса 24–52 м с оператором по Московской области. 7 машин в парке, выезд от 3 часов, замена при поломке за 4 часа. Скидка 5% при заказе нашего бетона.')

@section('content')
    {{-- HERO --}}
    <section class="pagehero">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <span>Аренда насоса</span></div>
            <span class="eyebrow" style="margin-top:18px">7 машин в парке · Стрела 24–52 м · Оператор включён · Выезд от 3 часов</span>
            <h1 class="pagehero__title">Аренда автобетононасоса в Подмосковье — <span class="accent">стрела 24–52 м, оператор в стоимости</span></h1>
            <p class="pagehero__sub">7 машин в парке. Оператор с опытом 5+ лет. Техника не старше 5 лет. Замена при поломке за 4 часа.</p>
            <div class="pagehero__actions">
                <a href="#zayavka" class="btn btn--primary btn--lg">Подобрать насос →</a>
                <a href="#price" class="btn btn--ghost-light btn--lg">Смотреть прайс</a>
            </div>
            <div class="pagehero__chips">
                <span class="chip chip--dark">@include('icons.pump') 7 машин в парке</span>
                <span class="chip chip--dark">@include('icons.users') Оператор включён</span>
                <span class="chip chip--dark">@include('icons.check') Техника до 5 лет</span>
                <span class="chip chip--dark">@include('icons.wrench') Замена за 4 часа</span>
            </div>
        </div>
    </section>

    <div class="trust-bar">
        <div class="container">
            <div class="trust-bar__item">@include('icons.check') Опытный оператор в цене</div>
            <div class="trust-bar__item">@include('icons.check') Выезд от 3 часов</div>
            <div class="trust-bar__item">@include('icons.check') Скидка 5% при заказе нашего бетона</div>
            <div class="trust-bar__item">@include('icons.check') Договор и закрывающие документы</div>
        </div>
    </div>

    {{-- ПРАЙС --}}
    <section class="section section--paper" id="price">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Прайс-лист</span>
                <h2 class="section-title" style="margin-top:16px">Стоимость аренды автобетононасоса</h2>
            </div>
            <div class="price-table-wrap">
                <div class="table-scroll">
                    <table class="price-table">
                        <thead>
                            <tr>
                                <th>Тип</th>
                                <th style="text-align:left">Длина стрелы</th>
                                <th>Смена (7+1 ч)</th>
                                <th style="text-align:left">Где применяется</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ([
                                ['АБН 24 м', '24 м', '28 000 ₽', 'Частные дома, гаражи'],
                                ['АБН 28 м', '28 м', '30 000 ₽', 'Частные дома, малоэтажное'],
                                ['АБН 32 м', '32 м', '32 000 ₽', 'Малоэтажное строительство'],
                                ['АБН 36 м', '36 м', '36 000 ₽', '3–4 этажа'],
                                ['АБН 42 м', '42 м', '42 000 ₽', '5–6 этажей'],
                                ['АБН 46 м', '46 м', '46 000 ₽', '6–7 этажей'],
                                ['АБН 52 м', '52 м', '52 000 ₽', 'Высотное строительство'],
                                ['АБН 62 м', '62 м', '62 000 ₽', 'Промышленные объекты'],
                                ['АБН 68 м', '68 м', '68 000 ₽', 'Крупные промышленные объекты'],
                            ] as [$t, $len, $price, $use])
                                <tr>
                                    <td class="cell-name">{{ $t }}</td>
                                    <td style="text-align:left">{{ $len }}</td>
                                    <td class="cell-price">{{ $price }}</td>
                                    <td style="text-align:left" class="text-muted">{{ $use }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-foot">
                    Смена = 7 часов работы + 1 час технологической промывки. Доп. бетоновод +700 ₽ · доп. шланг +2 000 ₽ · гаситель +2 000 ₽ · перестановка АБН +2 000 ₽.
                    <strong style="color:var(--orange)">Скидка 5% на насос при заказе нашего бетона.</strong>
                </div>
            </div>
        </div>
    </section>

    {{-- КОГДА НУЖЕН НАСОС --}}
    <section class="section section--white">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Когда нужен насос</span>
                <h2 class="section-title" style="margin-top:16px">3 ситуации, когда без АБН не обойтись</h2>
            </div>
            <div class="grid grid-3">
                @foreach ([
                    ['target', 'Далеко подавать бетон', 'Расстояние от миксера до опалубки больше 5 метров — вручную бетон не подать без потерь качества.'],
                    ['layers', 'Заливка выше 1-го этажа', 'Перекрытия, колонны, монолитные стены — насос подаёт бетон точно на нужную высоту.'],
                    ['pin', 'Узкий въезд или подвал', 'Миксер не проедет во двор, подвал или через ворота — насос подаёт через забор, в окно, в подземный уровень.'],
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

    {{-- ЧТО ВКЛЮЧЕНО --}}
    <section class="section section--dark">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Что входит</span>
                <h2 class="section-title" style="margin-top:16px">Что включено в стоимость аренды</h2>
            </div>
            <div class="grid grid-4">
                @foreach ([
                    ['users', 'Работа оператора', 'Опытный оператор с опытом 5+ лет. Знает все типы объектов.'],
                    ['gps', 'Расходники для промывки', 'Вода и материалы для промывки трубопровода после работы.'],
                    ['truck', 'Топливо до 30 км от МКАД', 'Транспортные расходы до 30 км от МКАД включены в цену.'],
                    ['shield', 'Техосмотр перед выездом', 'Каждая машина проходит проверку перед каждым заказом.'],
                ] as [$ic, $t, $d])
                    <div class="card card--dark">
                        <div class="card__ico">@include('icons.'.$ic)</div>
                        <h3 class="card__title">{{ $t }}</h3>
                        <p class="card__text">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ПАРК ТЕХНИКИ --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Парк техники</span>
                <h2 class="section-title" style="margin-top:16px">7 автобетононасосов — все готовы к выезду</h2>
            </div>
            <div class="grid grid-3">
                @foreach ([
                    ['Mercedes-Benz · 24 м', '80 м³/ч', '2021 г.в.'],
                    ['Putzmeister · 32 м', '90 м³/ч', '2020 г.в.'],
                    ['Volvo · 36 м', '100 м³/ч', '2022 г.в.'],
                    ['Mercedes-Benz · 36 м', '100 м³/ч', '2021 г.в.'],
                    ['Putzmeister · 42 м', '120 м³/ч', '2022 г.в.'],
                    ['Volvo · 42 м', '120 м³/ч', '2020 г.в.'],
                    ['Putzmeister · 52 м', '160 м³/ч', '2023 г.в.'],
                ] as [$name, $perf, $year])
                    <div class="pcard">
                        <div class="media-ph media-ph--light" style="min-height:150px;margin-bottom:20px">@include('icons.pump')</div>
                        <span class="pcard__title" style="font-size:18px">{{ $name }}</span>
                        <p class="pcard__text" style="margin-top:8px">Производительность {{ $perf }} · {{ $year }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="section section--white">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">FAQ</span>
                <h2 class="section-title" style="margin-top:16px">Частые вопросы</h2>
            </div>
            @include('partials.faq', ['items' => [
                ['Можно ли заказать насос без бетона?', 'Да, сдаём автобетононасос отдельно. Но при заказе бетона на нашем заводе действует скидка 5% на аренду насоса и единый комплект документов.'],
                ['Что значит «смена 7+1»?', 'Это 7 часов работы на объекте плюс 1 час технологической промывки трубопровода. Оплачивается как одна смена.'],
                ['Насос едет за МКАД?', 'Да, работаем по всей Московской области. Топливо до 30 км от МКАД включено в стоимость, далее — по километражу.'],
                ['Каков минимальный заказ?', 'Минимальный заказ — одна смена. Точную стоимость под ваш объект и объём назовёт менеджер после звонка.'],
                ['Бетон под насос — особый?', 'Для перекачки нужна подвижность П4 и выше. Мы подбираем марку и осадку конуса под конкретный насос и высоту подачи.'],
            ]])
        </div>
    </section>

    @include('partials.cta-phone', ['note' => 'Работаем круглосуточно · Перезвоним за 4 минуты'])

    @include('partials.lead-form', [
        'bg' => 'section--paper',
        'title' => 'Оставьте заявку — перезвоним за 4 минуты',
        'sub' => 'Подберём насос по длине стрелы и объекту. Назовём точную цену.',
    ])
@endsection
