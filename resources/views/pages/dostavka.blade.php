@extends('layouts.app')

@section('title', 'Доставка бетона по Московской области')
@section('meta_description', 'Доставка бетона по всей Московской области — выезд от 2 часов, собственный автопарк из 21 машины, GPS-мониторинг, SMS за 30 минут до приезда. Зоны и цены доставки.')

@section('content')
    {{-- HERO --}}
    <section class="pagehero">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <span>Доставка</span></div>
            <span class="eyebrow" style="margin-top:18px">Всё МО · Выезд от 2 ч · SMS за 30 мин до приезда · GPS-мониторинг</span>
            <h1 class="pagehero__title">Доставка бетона по всей Московской области — <span class="accent">выезд от 2 часов</span>, схема и цены</h1>
            <p class="pagehero__sub">Работаем по всему Подмосковью. Собственный автопарк миксеров и АБН. GPS-мониторинг — знаем где машина в реальном времени.</p>
            <div class="pagehero__actions">
                <a href="#zones" class="btn btn--primary btn--lg">Узнать стоимость доставки →</a>
                <a href="{{ route('ceny') }}" class="btn btn--ghost-light btn--lg">Смотреть прайс</a>
            </div>
            <div class="pagehero__chips">
                <span class="chip chip--dark">@include('icons.pin') Всё МО</span>
                <span class="chip chip--dark">@include('icons.clock') Выезд от 2 ч</span>
                <span class="chip chip--dark">@include('icons.mail') SMS за 30 мин</span>
                <span class="chip chip--dark">@include('icons.gps') GPS-мониторинг</span>
            </div>
        </div>
    </section>

    <div class="trust-bar">
        <div class="container">
            <div class="trust-bar__item">@include('icons.check') GPS на каждой машине</div>
            <div class="trust-bar__item">@include('icons.check') Выезд от 2 часов</div>
            <div class="trust-bar__item">@include('icons.check') SMS за 30 мин до приезда</div>
            <div class="trust-bar__item">@include('icons.check') 14 миксеров в парке</div>
        </div>
    </div>

    {{-- ЗОНЫ --}}
    <section class="section section--paper" id="zones">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Зоны доставки</span>
                <h2 class="section-title" style="margin-top:16px">Карта зон доставки</h2>
            </div>
            <div class="split">
                <div class="radar">
                    <div class="radar__ring r1"></div>
                    <div class="radar__ring r2"></div>
                    <div class="radar__ring r3"></div>
                    <div class="radar__core">Завод<br>МО</div>
                </div>
                <div>
                    @foreach ([
                        ['Зона 1 — 0–20 км', 'Доставка включена в стоимость бетона', 'включено'],
                        ['Зона 2 — 20–40 км', 'Ближнее Подмосковье', '+800–1 500 ₽/рейс'],
                        ['Зона 3 — 40–60 км', 'Среднее Подмосковье', '+2 500 ₽/рейс'],
                        ['Зона 4 — свыше 60 км', 'Дальнее Подмосковье', 'по договорённости'],
                    ] as $i => [$zone, $d, $price])
                        <div class="spec-list__row" style="align-items:center;border-color:var(--line)">
                            <div>
                                <div style="font-family:var(--font-head);font-weight:700">{{ $zone }}</div>
                                <div class="text-muted" style="font-size:14px">{{ $d }}</div>
                            </div>
                            <span class="badge {{ $i === 0 ? '' : 'badge--muted' }}">{{ $price }}</span>
                        </div>
                    @endforeach
                    <a href="#zayavka" class="btn btn--primary btn--lg" style="margin-top:26px">Узнать стоимость для моего адреса →</a>
                </div>
            </div>
        </div>
    </section>

    {{-- ГОРОДА --}}
    <section class="section section--white">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Города</span>
                <h2 class="section-title" style="margin-top:16px">Доставляем во все города МО</h2>
            </div>
            <div class="chips">
                @foreach (['Одинцово', 'Истра', 'Наро-Фоминск', 'Тучково', 'Руза', 'Красногорск', 'Мытищи', 'Балашиха', 'Химки', 'Подольск', 'Домодедово', 'Звенигород', 'Дмитров', 'Клин', 'Сергиев Посад', 'Ногинск'] as $city)
                    <span class="chip">@include('icons.pin') {{ $city }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- КАК РАБОТАЕТ --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Процесс</span>
                <h2 class="section-title" style="margin-top:16px">Как работает доставка</h2>
            </div>
            <div class="steps steps--h">
                @foreach ([
                    ['Заявка', 'Вы оставляете заявку — менеджер перезванивает за 4 минуты.'],
                    ['Согласование', 'Согласовываем марку, объём, точное время подачи машины.'],
                    ['Производство', 'Бетон производится под ваш заказ. SMS за 30 минут до приезда.'],
                    ['Доставка', 'Миксер приезжает точно в согласованное время с документами.'],
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

    {{-- АВТОПАРК --}}
    <section class="section section--dark">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Автопарк</span>
                <h2 class="section-title" style="margin-top:16px">Собственный автопарк — 21 единица</h2>
            </div>
            <div class="stats" style="grid-template-columns:repeat(3,1fr)">
                <div class="stat-box"><b>14</b><span>Автобетоносмесители. Объём барабана 6–12 м³, все с GPS-трекерами.</span></div>
                <div class="stat-box"><b>7</b><span>Автобетононасосы. Стрела 24–52 м, техника не старше 5 лет.</span></div>
                <div class="stat-box"><b>24/7</b><span>Знаем где каждая машина. Называем точное время прибытия.</span></div>
            </div>
        </div>
    </section>

    @include('partials.cta-phone', ['note' => 'Работаем круглосуточно · Перезвоним за 4 минуты'])

    @include('partials.lead-form', [
        'bg' => 'section--paper',
        'title' => 'Оставьте заявку — перезвоним за 4 минуты',
        'sub' => 'Уточним адрес, рассчитаем стоимость доставки. Назовём точное время.',
    ])
@endsection
