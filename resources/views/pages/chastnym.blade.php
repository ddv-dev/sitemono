@extends('layouts.app')

@section('title', 'Бетон частным клиентам')
@section('meta_description', 'Бетон для частного строительства: фундамент, перекрытие, стяжка. Бесплатно подберём марку, посчитаем объём и нальём куда надо — насос, если машина не проедет. От 3 м³.')

@section('content')
    {{-- HERO --}}
    <section class="pagehero">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <span>Частным клиентам</span></div>
            <span class="eyebrow" style="margin-top:18px">Частным лицам · От 3 м³ · Подсказка по марке · Насос если не проедем</span>
            <h1 class="pagehero__title">Фундамент, перекрытие или стяжка — <span class="accent">привезём правильный бетон и нальём куда надо</span>, даже если машина не проедет</h1>
            <p class="pagehero__sub">Подберём марку, посчитаем объём, доставим в нужное время. Один звонок — бетон и насос вместе.</p>
            <div class="pagehero__actions">
                <a href="{{ route('callback') }}" class="btn btn--primary btn--lg">Позвонить и получить расчёт →</a>
                <a href="{{ route('ceny') }}" class="btn btn--ghost-light btn--lg">Смотреть прайс</a>
            </div>
            <div class="pagehero__chips">
                <span class="chip chip--dark">@include('icons.users') Частным лицам</span>
                <span class="chip chip--dark">@include('icons.box') От 3 м³</span>
                <span class="chip chip--dark">@include('icons.check') Бесплатный подбор марки</span>
                <span class="chip chip--dark">@include('icons.doc') Паспорт ГОСТ</span>
            </div>
        </div>
    </section>

    <div class="trust-bar">
        <div class="container">
            <div class="trust-bar__item">@include('icons.check') Подберём марку бесплатно</div>
            <div class="trust-bar__item">@include('icons.check') Фундамент, стяжка, перекрытие</div>
            <div class="trust-bar__item">@include('icons.check') ТТН и паспорт ГОСТ в руки</div>
            <div class="trust-bar__item">@include('icons.check') Выезд от 2 часов</div>
        </div>
    </div>

    {{-- ВИДЫ РАБОТ --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Виды работ</span>
                <h2 class="section-title" style="margin-top:16px">Для каких работ нужен бетон</h2>
            </div>
            <div class="grid grid-4">
                @foreach ([
                    ['layers', 'Фундамент', 'Дом, баня, гараж. Рекомендуем М300. Объём зависит от размера и типа фундамента.', 'М300, от 6 000 ₽/м³'],
                    ['box', 'Перекрытие', 'Монолитное перекрытие между этажами. М300–М350, нужен насос.', 'М300–М350'],
                    ['target', 'Стяжка пола', 'Выравнивание пола. М200, минимальный объём, можно без насоса.', 'М200, от 5 600 ₽/м³'],
                    ['pin', 'Отмостка и дорожки', 'Отмостка вокруг дома, садовые дорожки. М200, можно без насоса.', 'М200'],
                ] as [$ic, $t, $d, $price])
                    <div class="pcard">
                        <span class="sq-ico">@include('icons.'.$ic)</span>
                        <div class="pcard__head" style="margin-top:20px"><span class="pcard__title">{{ $t }}</span></div>
                        <p class="pcard__text">{{ $d }}</p>
                        <div class="pcard__price"><b style="font-size:18px">{{ $price }}</b></div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ЧТО МЫ РЕШАЕМ --}}
    <section class="section section--dark">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Решаем ваши проблемы</span>
                <h2 class="section-title" style="margin-top:16px">Что мы решаем</h2>
            </div>
            <div class="grid grid-3">
                @foreach ([
                    ['lab', '«Не знаю какая марка»', 'Менеджер подберёт марку по вашей задаче бесплатно. Достаточно описать что будете заливать.'],
                    ['pump', '«Машина не въезжает во двор»', 'Насос подаёт бетон через забор, в подвал, в любое труднодоступное место — стрела до 52 м.'],
                    ['shield', '«Боюсь, что привезут не ту марку»', 'Паспорт качества ГОСТ 7473-2010 с каждой машиной, прямо в руки водителя. Без запросов.'],
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

    {{-- 5 ШАГОВ --}}
    <section class="section section--white">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Процесс</span>
                <h2 class="section-title" style="margin-top:16px">Как заказать — 5 шагов</h2>
            </div>
            <div class="steps" style="grid-template-columns:repeat(auto-fit,minmax(200px,1fr))">
                @foreach ([
                    'Позвоните или оставьте заявку',
                    'Расскажите задачу менеджеру',
                    'Получите расчёт с ценой',
                    'Согласуйте дату и время',
                    'Примите бетон с документами',
                ] as $i => $t)
                    <div class="step">
                        <span class="step__num">{{ $i + 1 }}</span>
                        <h4 style="font-size:15px">{{ $t }}</h4>
                    </div>
                @endforeach
            </div>
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

    {{-- FAQ --}}
    <section class="section section--white">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">FAQ</span>
                <h2 class="section-title" style="margin-top:16px">Частые вопросы частников</h2>
            </div>
            @include('partials.faq', ['items' => [
                ['Какая марка нужна для ленточного фундамента?', 'Для ленточного фундамента частного дома обычно достаточно М300 (В22,5). Точную марку подберём под нагрузку, тип грунта и конструкцию — бесплатно.'],
                ['Сколько кубов на фундамент 10×10 м?', 'Зависит от типа и сечения фундамента. Для ленты 10×10 м обычно уходит 12–20 м³. Менеджер посчитает объём по вашим размерам.'],
                ['Минимальный заказ?', 'Минимальный заказ — 3 м³. Меньший объём тоже возможен по договорённости, но с наценкой за рейс.'],
                ['Нужен ли насос?', 'Насос нужен, если миксер не подъезжает к месту заливки ближе 5 м или заливка выше первого этажа. Подскажем при расчёте.'],
                ['Что будет в документах?', 'Товарно-транспортная накладная (ТТН) и паспорт качества ГОСТ 7473-2010 — водитель передаёт их прямо на объекте.'],
            ]])
        </div>
    </section>

    @include('partials.cta-phone', ['note' => 'Работаем круглосуточно · Перезвоним за 4 минуты'])

    @include('partials.lead-form', [
        'bg' => 'section--paper',
        'title' => 'Оставьте заявку — перезвоним за 4 минуты',
    ])
@endsection
