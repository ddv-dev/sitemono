@extends('layouts.app')

@section('title', 'Бетон с доставкой в ' . $city)
@section('meta_description', 'Бетон с доставкой в ' . $city . ' — выезд от 2 часов, цены от 5 600 ₽/м³. Собственный завод, паспорт ГОСТ с каждой машиной, аренда автобетононасоса в комплекте.')

@section('content')
    {{-- HERO --}}
    <section class="pagehero">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <a href="{{ route('dostavka') }}">Доставка</a> / <span>{{ $city }}</span></div>
            <span class="eyebrow" style="margin-top:18px">{{ $city }} и округ · Выезд от 2 ч · Бетон + насос</span>
            <h1 class="pagehero__title">Бетон с доставкой в {{ $city }} — <span class="accent">выезд от 2 часов, цены от 5 600 ₽/м³</span></h1>
            <p class="pagehero__sub">Доставляем бетон в {{ $city }} и городской округ. Собственный завод. Паспорт ГОСТ с каждой машиной. Аренда АБН в комплекте.</p>
            <div class="pagehero__actions">
                <a href="{{ route('callback') }}" class="btn btn--primary btn--lg">Заказать бетон в {{ $city }} →</a>
                <a href="#price" class="btn btn--ghost-light btn--lg">Смотреть прайс</a>
            </div>
        </div>
    </section>

    <div class="trust-bar">
        <div class="container">
            <div class="trust-bar__item">@include('icons.check') Выезд от 2 часов</div>
            <div class="trust-bar__item">@include('icons.check') Паспорт качества с каждой машиной</div>
            <div class="trust-bar__item">@include('icons.check') Бетон + насос — 1 заказ</div>
            <div class="trust-bar__item">@include('icons.check') Доставляем по всему округу</div>
        </div>
    </div>

    {{-- ЛОКАЛЬНАЯ ДОСТАВКА --}}
    <section class="section section--paper">
        <div class="container">
            <div class="split" style="align-items:start">
                <div>
                    <span class="eyebrow">Локальная доставка</span>
                    <h2 class="section-title" style="margin-top:16px">Доставляем в {{ $city }} и округ</h2>
                    <p class="section-lead">Собственные миксеры и автобетононасосы. Знаем маршруты и подъезды в {{ $city }} — привозим точно в срок.</p>
                    <div style="margin-top:26px">
                        <div class="text-muted" style="font-weight:600;margin-bottom:12px">Популярные районы доставки:</div>
                        <div class="chips">
                            @foreach ([$city.' (центр)', 'Ближние посёлки', 'Промзоны', 'Коттеджные посёлки', 'СНТ и дачи'] as $r)
                                <span class="chip">@include('icons.pin') {{ $r }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="grid grid-2" style="align-content:start">
                    <div class="stat-box"><b>МО</b><span>{{ $city }} и городской округ</span></div>
                    <div class="stat-box"><b>2 ч</b><span>время выезда миксера</span></div>
                    <div class="stat-box"><b>24/7</b><span>работаем круглосуточно</span></div>
                    <div class="stat-box"><b>ГОСТ</b><span>паспорт с каждой машиной</span></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ПРАЙС --}}
    <section class="section section--white" id="price">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Прайс</span>
                <h2 class="section-title" style="margin-top:16px">Цены на бетон в {{ $city }}</h2>
            </div>
            <div class="price-table-wrap">
                <div class="table-scroll">
                    <table class="price-table">
                        <thead>
                            <tr>
                                <th>Марка / класс</th>
                                <th style="text-align:left">Применение</th>
                                <th>Цена с НДС</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ([
                                ['М200 / В15', 'Фундаменты, стяжки, отмостки', 'от 5 600 ₽/м³'],
                                ['М250 / В20', 'Лёгкие несущие конструкции', 'от 5 800 ₽/м³'],
                                ['М300 / В22,5', 'Перекрытия, ростверки', 'от 6 000 ₽/м³'],
                                ['М350 / В25', 'Монолитные колонны, сваи', 'от 6 200 ₽/м³'],
                                ['М400 / В30', 'Промышленные объекты', 'от 6 600 ₽/м³'],
                            ] as [$m, $use, $price])
                                <tr>
                                    <td class="cell-name">{{ $m }}</td>
                                    <td style="text-align:left" class="text-muted">{{ $use }}</td>
                                    <td class="cell-price">{{ $price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-foot">Цены с доставкой в {{ $city }} уточняйте у менеджера — рассчитаем по адресу.</div>
            </div>
            <div style="margin-top:26px"><a href="#calc" class="btn btn--primary btn--lg">Получить расчёт для {{ $city }} →</a></div>
        </div>
    </section>

    {{-- КАЛЬКУЛЯТОР --}}
    <section class="section section--paper" id="calc">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Калькулятор</span>
                <h2 class="section-title" style="margin-top:16px">Рассчитать стоимость</h2>
            </div>
            @include('partials.calculator')
        </div>
    </section>

    {{-- ЧАСТО ЗАКАЗЫВАЮТ --}}
    <section class="section section--dark">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Популярные запросы</span>
                <h2 class="section-title" style="margin-top:16px">Часто заказывают в {{ $city }}</h2>
            </div>
            <div class="grid grid-3">
                @foreach ([
                    ['layers', 'Частное строительство', 'Фундаменты, стяжки, перекрытия частных домов и дач '.$city.' и округа.'],
                    ['box', 'Монолитные конструкции ЖК', 'Поставки для жилых комплексов. Договор, протоколы, отсрочка для строительных компаний.'],
                    ['factory', 'Промышленность и логистика', 'Промышленные объекты, логистические центры, производственные здания в МО.'],
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

    {{-- КАК ЗАКАЗАТЬ --}}
    <section class="section section--white">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Процесс</span>
                <h2 class="section-title" style="margin-top:16px">Как заказать бетон в {{ $city }}</h2>
            </div>
            <div class="steps steps--h" style="grid-template-columns:repeat(3,1fr)">
                @foreach ([
                    ['Позвоните', 'Перезвоним за 4 минуты. Уточним марку, объём, адрес в '.$city.'.'],
                    ['Согласуйте', 'Назовём точную стоимость с доставкой и время приезда миксера.'],
                    ['Примите бетон', 'Миксер приедет точно в срок. Получите ТТН и паспорт качества.'],
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

    @include('partials.cta-phone', ['note' => 'Доставка в '.$city.' · Работаем 24/7 · Выезд от 2 часов'])

    @include('partials.lead-form', [
        'bg' => 'section--paper',
        'title' => 'Заявка на доставку в '.$city,
    ])

    {{-- ТАКЖЕ ДОСТАВЛЯЕМ --}}
    <section class="section section--white section--tight">
        <div class="container">
            <div class="text-muted" style="font-weight:600;margin-bottom:14px">Также доставляем в:</div>
            <div class="chips">
                @foreach (['Одинцово' => 'odintsovo', 'Мытищи' => 'mytishchi', 'Балашиха' => 'balashikha', 'Химки' => 'himki', 'Подольск' => 'podolsk'] as $name => $slug)
                    @if ($name !== $city)
                        <a href="{{ route('geo', $slug) }}" class="chip">@include('icons.pin') {{ $name }}</a>
                    @endif
                @endforeach
                <a href="{{ route('dostavka') }}" class="chip chip--solid">Все города →</a>
            </div>
        </div>
    </section>
@endsection
