@extends('layouts.app')

@section('title', 'Зимний бетон в Подмосковье')
@section('meta_description', 'Зимний бетон с противоморозными добавками — работаем при −20°C. Подогрев воды и заполнителей, добавки ПМД, ГОСТ 7473-2010, утеплённые миксеры. Цены на зимний бетон.')

@section('content')
    {{-- HERO --}}
    <section class="pagehero">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <a href="{{ route('beton') }}">Бетон</a> / <span>Зимний бетон</span></div>
            <span class="eyebrow" style="margin-top:18px">До −20°C · Тёплая вода в составе · Противоморозные добавки · ГОСТ зимой</span>
            <h1 class="pagehero__title">Бетон зимой в Подмосковье — <span class="accent">тёплая смесь с противоморозными добавками</span>, работаем при −20°C</h1>
            <p class="pagehero__sub">Большинство заводов МО зимой снижают качество или отказываются от сложных заказов. Мы производим тёплый бетон по ГОСТ и в самые морозы.</p>
            <div class="pagehero__actions">
                <a href="{{ route('callback') }}" class="btn btn--primary btn--lg">Заказать зимний бетон →</a>
                <a href="#price" class="btn btn--ghost-light btn--lg">Смотреть цены</a>
            </div>
            <div class="pagehero__chips">
                <span class="chip chip--dark">@include('icons.snowflake') До −20°C</span>
                <span class="chip chip--dark">@include('icons.bolt') Тёплая вода в составе</span>
                <span class="chip chip--dark">@include('icons.lab') Противоморозные добавки</span>
                <span class="chip chip--dark">@include('icons.check') ГОСТ зимой</span>
            </div>
        </div>
    </section>

    <div class="trust-bar">
        <div class="container">
            <div class="trust-bar__item">@include('icons.check') Работаем при −20°C</div>
            <div class="trust-bar__item">@include('icons.check') ГОСТ 7473-2010 в любой мороз</div>
            <div class="trust-bar__item">@include('icons.check') Противоморозные добавки ПМД</div>
            <div class="trust-bar__item">@include('icons.check') Утеплённые миксеры</div>
        </div>
    </div>

    {{-- ТЕХНОЛОГИЯ --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Технология</span>
                <h2 class="section-title" style="margin-top:16px">Как мы производим зимний бетон</h2>
            </div>
            <div class="grid grid-4">
                @foreach ([
                    ['bolt', 'Подогрев воды до 60°C', 'Горячая вода разогревает смесь изнутри, компенсируя холодный воздух снаружи.'],
                    ['factory', 'Подогрев заполнителей', 'Щебень и песок прогреваются перед замесом — бетон выходит тёплым с первой секунды.'],
                    ['lab', 'Добавки ПМД', 'Противоморозные добавки снижают точку замерзания воды в смеси до −20°C.'],
                    ['truck', 'Утеплённые миксеры', 'Барабан миксера утеплён — бетон доезжает до объекта с нужной температурой.'],
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

    {{-- СОСТАВ --}}
    <section class="section section--dark">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Состав</span>
                <h2 class="section-title" style="margin-top:16px">Что входит в зимний бетон</h2>
            </div>
            <div class="grid grid-3">
                @foreach ([
                    ['snowflake', 'Противоморозные добавки', 'Нитрат кальция или поташ. Дозировка по ГОСТ. Снижают точку замерзания до −20°C, не влияют на марку.'],
                    ['bolt', 'Тёплая вода и прогрев щебня', 'Вода подогревается до 60°C, щебень — до 40°C. Итоговая температура смеси на выходе +15…+20°C.'],
                    ['clock', 'Ускоритель твердения', 'При сильных морозах (−15…−20°C) добавляем ускоритель твердения для набора прочности в срок.'],
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

    {{-- ПРАЙС --}}
    <section class="section section--white" id="price">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Прайс</span>
                <h2 class="section-title" style="margin-top:16px">Цены на зимний бетон</h2>
            </div>
            <div class="price-table-wrap">
                <div class="table-scroll">
                    <table class="price-table">
                        <thead>
                            <tr>
                                <th>Марка / класс</th>
                                <th>Базовая цена</th>
                                <th>Итого (зима)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ([
                                ['М200 / В15', 'от 5 600 ₽/м³', 'от 5 900 ₽/м³'],
                                ['М250 / В20', 'от 5 800 ₽/м³', 'от 6 100 ₽/м³'],
                                ['М300 / В22,5', 'от 6 000 ₽/м³', 'от 6 400 ₽/м³'],
                                ['М350 / В25', 'от 6 200 ₽/м³', 'от 6 600 ₽/м³'],
                                ['М400 / В30', 'от 7 100 ₽/м³', 'от 7 500 ₽/м³'],
                            ] as [$m, $base, $total])
                                <tr>
                                    <td class="cell-name">{{ $m }}</td>
                                    <td class="text-muted" style="text-align:right">{{ $base }}</td>
                                    <td class="cell-price">{{ $total }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="table-foot">Надбавка оправдана: подогрев воды, щебня, добавки ПМД — реальные затраты, не маркетинг.</div>
            </div>
        </div>
    </section>

    {{-- РЕКОМЕНДАЦИИ --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Рекомендации</span>
                <h2 class="section-title" style="margin-top:16px">Как правильно заливать бетон зимой</h2>
            </div>
            <div class="feat-list" style="max-width:900px">
                @foreach ([
                    ['Прогрейте опалубку', 'Перед заливкой опалубка должна быть тёплой — не ниже 0°C. Иначе бетон сразу теряет температуру в местах контакта.'],
                    ['Укройте тепловыми матами', 'После заливки — немедленно укрыть тепловыми матами или плёнкой с опилками. Минимум 7 суток прогрева.'],
                    ['Учитывайте замедленный набор прочности', 'При −10°C прочность 70% набирается за 14–21 день вместо обычных 7. Не нагружайте конструкцию преждевременно.'],
                    ['Когда нельзя заливать', 'При снегопаде и ветре свыше 10 м/с без защитных тентов. При прогнозе мороза ниже −20°C без электропрогрева.'],
                    ['Если ударил мороз после заливки', 'Немедленно укройте и организуйте прогрев. Позвоните нам — подскажем действия для конкретной ситуации.'],
                ] as [$t, $d])
                    <div class="feat">
                        <span class="feat__ico">@include('icons.snowflake')</span>
                        <div><h4>{{ $t }}</h4><p>{{ $d }}</p></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.cta-phone', ['note' => 'Зимний бетон · Работаем при −20°C · Перезвоним за 4 минуты'])

    @include('partials.lead-form', [
        'bg' => 'section--white',
        'title' => 'Заказать зимний бетон',
        'sub' => 'Уточним температуру воздуха, объём и сроки. Назовём финальную цену с учётом зимних условий.',
    ])
@endsection
