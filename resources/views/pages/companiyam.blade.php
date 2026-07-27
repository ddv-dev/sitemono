@extends('layouts.app')

@section('title', 'Поставки бетона для компаний')
@section('meta_description', 'Поставки бетона для строительных компаний Московской области: договор с фиксированными ценами, НДС, отсрочка до 14 дней, протоколы испытаний и персональный менеджер. До 800 м³/сутки.')

@section('content')
    {{-- HERO --}}
    <section class="pagehero">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <span>Компаниям</span></div>
            <span class="eyebrow" style="margin-top:18px">Договор · НДС · Отсрочка до 14 дней · Протоколы испытаний · Менеджер</span>
            <h1 class="pagehero__title">Поставки бетона для строительных компаний МО — <span class="accent">договор, отсрочка, протоколы испытаний</span> и персональный менеджер</h1>
            <p class="pagehero__sub">Работаем с генподрядчиками, монолитными бригадами и девелоперами. НДС, отсрочка, протоколы. Надёжный поставщик без сбоев.</p>
            <div class="pagehero__actions">
                <a href="#zayavka" class="btn btn--primary btn--lg">Запросить КП →</a>
                <a href="{{ route('portfolio') }}" class="btn btn--ghost-light btn--lg">Наши объекты</a>
            </div>
            <div class="pagehero__chips">
                <span class="chip chip--dark">@include('icons.doc') Договор поставки</span>
                <span class="chip chip--dark">@include('icons.ruble') НДС / без НДС</span>
                <span class="chip chip--dark">@include('icons.calendar') Отсрочка до 14 дней</span>
                <span class="chip chip--dark">@include('icons.award') Протоколы испытаний</span>
                <span class="chip chip--dark">@include('icons.users') Персональный менеджер</span>
            </div>
        </div>
    </section>

    <div class="trust-bar">
        <div class="container">
            <div class="trust-bar__item">@include('icons.check') Договор с фиксированными ценами</div>
            <div class="trust-bar__item">@include('icons.check') До 800 м³/сутки — не срываем сроки</div>
            <div class="trust-bar__item">@include('icons.check') Отсрочка до 14 дней</div>
            <div class="trust-bar__item">@include('icons.check') Протоколы 7 и 28 суток</div>
        </div>
    </div>

    {{-- КЛЮЧЕВЫЕ УСЛОВИЯ --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Преимущества</span>
                <h2 class="section-title" style="margin-top:16px">Ключевые условия для B2B</h2>
            </div>
            <div class="grid grid-3">
                @foreach ([
                    ['doc', 'Договор с фиксированными ценами на квартал', 'Цена фиксируется на 3 месяца. Без сюрпризов при планировании бюджета проекта.'],
                    ['ruble', 'НДС и без НДС — выбираете сами', 'Работаем по любой системе налогообложения. Полный комплект закрывающих документов.'],
                    ['calendar', 'Отсрочка платежа до 14 дней', 'Для партнёров с историей 3+ месяца. Индивидуальные условия для крупных объёмов.'],
                    ['award', 'Протоколы испытаний 7 и 28 суток', 'Для технадзора и строительного контроля. Выдаём автоматически — без отдельного запроса.'],
                    ['factory', 'До 800 м³/сутки', 'Собственный завод с высокой производительностью. Не срываем сроки бетонирования.'],
                    ['phone', 'Персональный менеджер', 'Прямой номер телефона. Всегда на связи — не нужно объяснять контекст заново.'],
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

    {{-- КАК НАЧАТЬ РАБОТУ --}}
    <section class="section section--white">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Процесс</span>
                <h2 class="section-title" style="margin-top:16px">Как начать работу</h2>
            </div>
            <div class="steps" style="grid-template-columns:repeat(auto-fit,minmax(200px,1fr))">
                @foreach ([
                    'Запрос КП',
                    'Расчёт и КП в течение часа',
                    'Тестовая поставка',
                    'Подписание договора',
                    'Регулярные поставки',
                ] as $i => $t)
                    <div class="step">
                        <span class="step__num">{{ $i + 1 }}</span>
                        <h4 style="font-size:15px">{{ $t }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ДОКУМЕНТЫ + СКИДКИ --}}
    <section class="section section--paper">
        <div class="container">
            <div class="split" style="align-items:start">
                <div>
                    <span class="eyebrow">Документы</span>
                    <h2 class="section-title" style="margin-top:16px">Полный пакет документов</h2>
                    <div class="feat-list" style="margin-top:30px">
                        @foreach ([
                            'Товарная накладная (ТТН)',
                            'Паспорт качества ГОСТ 7473-2010',
                            'Протокол испытаний (7 и 28 суток)',
                            'Счёт-фактура (при работе с НДС)',
                            'Сертификаты соответствия на сырьё',
                        ] as $doc)
                            <div class="feat">
                                <span class="feat__ico">@include('icons.check')</span>
                                <div><h4 style="margin:0">{{ $doc }}</h4></div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <span class="eyebrow">Скидки</span>
                    <h2 class="section-title" style="margin-top:16px">Условия сотрудничества</h2>
                    <div class="price-table-wrap" style="margin-top:30px">
                        <table class="price-table">
                            <thead><tr><th>Объём поставки</th><th>Скидка</th></tr></thead>
                            <tbody>
                                <tr><td class="cell-name">От 50 м³/мес</td><td class="cell-price">−3%</td></tr>
                                <tr><td class="cell-name">От 200 м³/мес</td><td class="cell-price">−5%</td></tr>
                                <tr><td class="cell-name">Индивидуально</td><td class="cell-price">обсуждаем</td></tr>
                            </tbody>
                        </table>
                        <div class="table-foot">Отсрочка платежа до 14 дней для партнёров с историей 3+ месяца.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- КЕЙСЫ --}}
    <section class="section section--dark">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Кейсы</span>
                <h2 class="section-title" style="margin-top:16px">Реализованные объекты</h2>
            </div>
            <div class="grid grid-4">
                @foreach ([
                    ['ЖК · Мытищи', 'Монолитный ЖК «Новый берег»', '2 400 м³', 'М300, М350', '8 месяцев'],
                    ['Промышленность · Балашиха', 'Логистический центр «Восток»', '5 800 м³', 'М400', '14 месяцев'],
                    ['Дорожное · Подольск', 'Реконструкция дороги Подольск–Климовск', '1 200 м³', 'М350', '3 месяца'],
                    ['Коммерция · Химки', 'ТЦ «Северный» — парковочный подиум', '900 м³', 'М300', '2 месяца'],
                ] as [$tag, $name, $vol, $mark, $term])
                    <div class="card card--dark">
                        <span class="badge badge--dark">{{ $tag }}</span>
                        <h3 class="card__title" style="margin-top:16px">{{ $name }}</h3>
                        <dl class="spec-list" style="margin-top:16px">
                            <div class="spec-list__row"><dt>Объём</dt><dd>{{ $vol }}</dd></div>
                            <div class="spec-list__row"><dt>Марки</dt><dd>{{ $mark }}</dd></div>
                            <div class="spec-list__row"><dt>Срок</dt><dd>{{ $term }}</dd></div>
                        </dl>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('partials.cta-phone', ['note' => 'Работаем круглосуточно · КП — в течение часа'])

    {{-- B2B ФОРМА --}}
    <section class="section section--paper" id="zayavka">
        <div class="container">
            <div class="split">
                <div>
                    <span class="eyebrow">Заявка</span>
                    <h2 class="section-title" style="margin-top:16px">Запросить коммерческое предложение</h2>
                    <p class="section-lead">Подготовим КП в течение часа. Персональный менеджер на всё время сотрудничества.</p>
                    <div class="feat-list" style="margin-top:34px;max-width:460px">
                        <div class="feat"><span class="feat__ico">@include('icons.clock')</span><div><h4>КП в течение часа</h4><p>Рассчитаем цену под ваши объёмы и марки.</p></div></div>
                        <div class="feat"><span class="feat__ico">@include('icons.handshake')</span><div><h4>Персональный менеджер</h4><p>Прямой номер на всё время сотрудничества.</p></div></div>
                    </div>
                </div>
                <form class="lead-form" data-lead-form>
                    <div class="stack">
                        <div class="field"><label class="field__label">Компания</label><input class="input" type="text" name="company" placeholder="Название организации" required></div>
                        <div class="field"><label class="field__label">ИНН</label><input class="input" type="text" name="inn" placeholder="10 или 12 цифр"></div>
                        <div class="field"><label class="field__label">Контактное лицо</label><input class="input" type="text" name="name" placeholder="ФИО" required></div>
                        <div class="field"><label class="field__label">Телефон</label><input class="input" type="tel" name="phone" placeholder="+7 (___) ___-__-__" required></div>
                        <div class="field"><label class="field__label">Ориентировочный объём/мес, м³</label><input class="input" type="text" name="volume" placeholder="Например: 300"></div>
                        <div class="field"><label class="field__label">Нужен НДС?</label>
                            <select class="select" name="nds"><option>С НДС</option><option>Без НДС</option><option>Пока не определились</option></select>
                        </div>
                        <button type="submit" class="btn btn--primary btn--block btn--lg">Запросить КП →</button>
                        <label class="checkbox"><input type="checkbox" required><span>Нажимая кнопку, вы соглашаетесь с политикой обработки персональных данных</span></label>
                        <div class="form-success">Запрос отправлен. Подготовим КП в течение часа!</div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
