@extends('layouts.app')

@section('title', 'Контакты и схема проезда')
@section('meta_description', 'Контакты ПСМ-Монолит: телефон 8 (991) 558-38-88, адрес завода — МО, Одинцовский район, Луцинское шоссе, 3А. Работаем 24/7, перезвоним за 4 минуты.')

@section('content')
    {{-- HERO --}}
    <section class="pagehero" style="padding-bottom:48px">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <span>Контакты</span></div>
            <span class="eyebrow" style="margin-top:18px">Работаем 24/7 · Перезвоним за 4 минуты</span>
            <h1 class="pagehero__title">Контакты и схема проезда</h1>
            <p class="pagehero__sub">Работаем 24 часа в сутки, 7 дней в неделю. Перезвоним в течение 4 минут.</p>
        </div>
    </section>

    {{-- КОНТАКТЫ + КАРТА --}}
    <section class="section section--paper">
        <div class="container">
            <div class="split" style="align-items:start">
                <div class="grid" style="gap:16px">
                    <div class="card" style="display:flex;gap:18px;align-items:flex-start;padding:24px">
                        <span class="sq-ico">@include('icons.phone')</span>
                        <div>
                            <div class="text-muted" style="font-size:13px;font-weight:600">Телефон</div>
                            <a href="tel:+79915583888" style="font-family:var(--font-head);font-size:22px;font-weight:800">8 (991) 558-38-88</a>
                            <p class="card__text" style="margin-top:4px">Принимаем заявки в мессенджерах — WhatsApp, Telegram</p>
                        </div>
                    </div>
                    <div class="card" style="display:flex;gap:18px;align-items:flex-start;padding:24px">
                        <span class="sq-ico">@include('icons.mail')</span>
                        <div>
                            <div class="text-muted" style="font-size:13px;font-weight:600">Email</div>
                            <a href="mailto:info@psm-monolit.ru" style="font-family:var(--font-head);font-size:18px;font-weight:700">info@psm-monolit.ru</a>
                            <p class="card__text" style="margin-top:4px">Для деловой переписки</p>
                        </div>
                    </div>
                    <div class="card" style="display:flex;gap:18px;align-items:flex-start;padding:24px">
                        <span class="sq-ico">@include('icons.clock')</span>
                        <div>
                            <div class="text-muted" style="font-size:13px;font-weight:600">Режим работы</div>
                            <div style="font-family:var(--font-head);font-size:18px;font-weight:700">Пн–Вс, 07:00–22:00</div>
                            <p class="card__text" style="margin-top:4px">Производство и приём заявок — 24/7</p>
                        </div>
                    </div>
                    <div class="card" style="display:flex;gap:18px;align-items:flex-start;padding:24px">
                        <span class="sq-ico">@include('icons.pin')</span>
                        <div>
                            <div class="text-muted" style="font-size:13px;font-weight:600">Адрес завода</div>
                            <div style="font-family:var(--font-head);font-size:18px;font-weight:700">МО, Одинцовский район, Луцинское шоссе, 3А</div>
                        </div>
                    </div>
                </div>

                <div class="media-ph media-ph--light" style="min-height:520px;height:100%">
                    @include('icons.pin')
                    <span class="media-ph__label" style="position:absolute;bottom:20px">Схема проезда · Яндекс.Карты</span>
                </div>
            </div>
        </div>
    </section>

    {{-- ФОРМА --}}
    <section class="section section--white">
        <div class="container">
            <div class="split">
                <div>
                    <span class="eyebrow">Форма связи</span>
                    <h2 class="section-title" style="margin-top:16px">Напишите нам</h2>
                    <p class="section-lead">Опишите задачу — подберём марку, посчитаем объём и назовём цену. Ответим в течение рабочего дня, срочные заявки — по телефону.</p>
                </div>
                <form class="lead-form" data-lead-form>
                    <div class="stack">
                        <div class="field"><label class="field__label">Имя</label><input class="input" type="text" name="name" placeholder="Ваше имя" required></div>
                        <div class="field"><label class="field__label">Тип обращения</label>
                            <select class="select" name="topic"><option>Заказ бетона</option><option>Аренда насоса</option><option>Сотрудничество / B2B</option><option>Другой вопрос</option></select>
                        </div>
                        <div class="field"><label class="field__label">Телефон</label><input class="input" type="tel" name="phone" placeholder="+7 (___) ___-__-__" required></div>
                        <div class="field"><label class="field__label">Сообщение</label><textarea class="textarea" name="message" placeholder="Опишите ваш запрос..."></textarea></div>
                        <button type="submit" class="btn btn--primary btn--block btn--lg">Отправить сообщение →</button>
                        <label class="checkbox"><input type="checkbox" required><span>Нажимая кнопку, вы соглашаетесь с политикой обработки персональных данных</span></label>
                        <div class="form-success">Сообщение отправлено. Скоро свяжемся с вами!</div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- РЕКВИЗИТЫ --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Реквизиты</span>
                <h2 class="section-title" style="margin-top:16px">Реквизиты компании</h2>
            </div>
            <div class="price-table-wrap" style="max-width:860px">
                <dl class="spec-list" style="padding:8px 24px">
                    @foreach ([
                        ['Полное наименование', 'ООО «ПСМ МОНОЛИТ»'],
                        ['ИНН / КПП', '5032••••••  /  503201001'],
                        ['ОГРН', '1••••••••••••'],
                        ['Расчётный счёт', '40702810•••••••••••••'],
                        ['Банк', 'АО «АЛЬФА-БАНК» г. Москва'],
                        ['БИК', '044525593'],
                        ['Корр. счёт', '30101810200000000593'],
                        ['Юридический адрес', '143180, МО, г. Звенигород, ул. Почтовая, д. 41, корп. 2, пом. 2, оф. 11'],
                        ['Адрес производства', 'МО, Одинцовский район, Луцинское шоссе, 3А'],
                    ] as [$k, $v])
                        <div class="spec-list__row"><dt>{{ $k }}</dt><dd style="max-width:60%">{{ $v }}</dd></div>
                    @endforeach
                </dl>
            </div>
        </div>
    </section>

    @include('partials.cta-phone', ['note' => 'Работаем круглосуточно · Перезвоним за 4 минуты'])
@endsection
