@extends('layouts.app')

@section('title', 'О заводе ПСМ-Монолит')
@section('meta_description', 'ПСМ-Монолит — бетонный завод в Подмосковье с 2009 года. Собственное производство, аккредитованная лаборатория, автопарк из 21 единицы техники, производительность до 800 м³/сутки.')

@section('content')
    {{-- HERO --}}
    <section class="pagehero">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <span>О заводе</span></div>
            <span class="eyebrow" style="margin-top:18px">Собственное производство · Аккредитованная лаборатория · 21 единица техники</span>
            <h1 class="pagehero__title">ПСМ-Монолит — <span class="accent">бетонный завод в Подмосковье</span>, работаем с 2009 года</h1>
            <p class="pagehero__sub">Собственное производство, аккредитованная лаборатория, автопарк 21 единицы техники. Поставляем бетон и аренду насосов по всему МО.</p>
            <div class="pagehero__actions">
                <a href="#docs" class="btn btn--primary btn--lg">Скачать сертификаты</a>
                <a href="{{ route('portfolio') }}" class="btn btn--ghost-light btn--lg">Наши объекты</a>
            </div>
        </div>
    </section>

    {{-- СТАТИСТИКА --}}
    <section class="section section--dark section--tight">
        <div class="container">
            <div class="stats">
                <div class="stat-box"><b>15+</b><span>лет на рынке</span></div>
                <div class="stat-box"><b>21</b><span>единица техники</span></div>
                <div class="stat-box"><b>800</b><span>м³/сутки</span></div>
                <div class="stat-box"><b>1 200+</b><span>объектов</span></div>
            </div>
        </div>
    </section>

    {{-- ИСТОРИЯ --}}
    <section class="section section--paper">
        <div class="container">
            <div class="split" style="align-items:start">
                <div>
                    <span class="eyebrow">История</span>
                    <h2 class="section-title" style="margin-top:16px">Завод основан в 2009 году</h2>
                    <p class="section-lead" style="max-width:none">Начинали с одной производственной линии и двух миксеров. Сегодня ПСМ-Монолит — это полноценный бетонный завод с аккредитованной лабораторией, автопарком из 21 единицы спецтехники и производительностью до 800 м³ в сутки.</p>
                    <p class="section-lead" style="max-width:none;margin-top:16px">Работаем с частными застройщиками, строительными компаниями и промышленными предприятиями по всей Московской области.</p>
                </div>
                <div class="media-ph media-ph--light" style="min-height:320px">
                    @include('icons.factory')
                    <span class="media-ph__label" style="position:absolute;bottom:18px">Фото производственной линии</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ПРОИЗВОДСТВО --}}
    <section class="section section--white">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Производство</span>
                <h2 class="section-title" style="margin-top:16px">Как устроено производство</h2>
            </div>
            <div class="steps" style="grid-template-columns:repeat(auto-fit,minmax(200px,1fr))">
                @foreach ([
                    'Входной контроль сырья',
                    'Автоматическое дозирование',
                    'Производство смеси',
                    'Лабораторная проверка',
                    'Отгрузка с документами',
                ] as $i => $t)
                    <div class="step">
                        <span class="step__num">{{ $i + 1 }}</span>
                        <h4 style="font-size:15px">{{ $t }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ЛАБОРАТОРИЯ --}}
    <section class="section section--dark">
        <div class="container">
            <div class="split" style="align-items:start">
                <div>
                    <span class="eyebrow">Лаборатория</span>
                    <h2 class="section-title" style="margin-top:16px">Аккредитованная производственная лаборатория</h2>
                    <p class="section-lead">Собственная лаборатория аккредитована на проведение испытаний бетонных смесей. Проверяем каждую партию на соответствие марке и классу — по ГОСТ 10180, ГОСТ 24544, ГОСТ 10060.</p>
                    <div class="feat-list" style="margin-top:30px">
                        <div class="feat"><span class="feat__ico">@include('icons.check')</span><div><h4 style="margin:0">Проверка каждой партии перед отгрузкой</h4></div></div>
                        <div class="feat"><span class="feat__ico">@include('icons.check')</span><div><h4 style="margin:0">Испытания на 7 и 28 сутки твердения</h4></div></div>
                        <div class="feat"><span class="feat__ico">@include('icons.check')</span><div><h4 style="margin:0">Протоколы для технадзора — выдаём без запроса</h4></div></div>
                    </div>
                </div>
                <div class="grid grid-2" style="align-content:start">
                    <div class="stat-box"><b>100%</b><span>партий проходят контроль</span></div>
                    <div class="stat-box"><b>24 ч</b><span>до получения результата</span></div>
                    <div class="media-ph" style="grid-column:1/-1;min-height:200px">@include('icons.lab')<span class="media-ph__label" style="position:absolute;bottom:16px">Фото лаборатории</span></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ДОКУМЕНТЫ --}}
    <section class="section section--paper" id="docs">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Сертификаты</span>
                <h2 class="section-title" style="margin-top:16px">Документы и сертификаты</h2>
            </div>
            <div class="grid grid-4">
                @foreach ([
                    ['award', 'ГОСТ 7473-2010', 'Соответствие стандарту'],
                    ['lab', 'Лицензия лаборатории', 'Аккредитация'],
                    ['doc', 'Сертификаты на сырьё', 'Щебень, цемент, песок'],
                    ['shield', 'Свидетельство о регистрации', 'ОГРН, ИНН'],
                ] as [$ic, $t, $d])
                    <div class="card">
                        <div class="card__ico">@include('icons.'.$ic)</div>
                        <h3 class="card__title">{{ $t }}</h3>
                        <p class="card__text">{{ $d }}</p>
                    </div>
                @endforeach
            </div>
            <div style="margin-top:26px">
                <a href="{{ route('callback') }}" class="btn btn--primary btn--lg">Скачать полный пакет документов</a>
            </div>
        </div>
    </section>

    @include('partials.cta-phone', ['note' => 'Адрес завода: МО, Одинцовский р-н, Луцинское шоссе 3А · Работаем 24/7'])

    @include('partials.lead-form', [
        'bg' => 'section--white',
        'title' => 'Оставьте заявку — перезвоним за 4 минуты',
    ])
@endsection
