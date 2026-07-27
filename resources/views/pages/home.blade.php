@extends('layouts.app')

@section('title', 'Бетон и бетононасос — один заказ')
@section('meta_description', 'Собственный бетонный завод в Подмосковье с 2009 года. Товарный бетон М100–М500 и аренда автобетононасосов 24–52 м. Паспорт ГОСТ на каждую партию, доставка по всей МО.')

@section('content')
    {{-- ================= HERO ================= --}}
    <section class="hero">
        <div class="container">
            <div class="hero__grid">
                <div>
                    <span class="eyebrow">Производство бетона · Подмосковье · с 2009 года</span>
                    <h1 class="hero__title">Бетон и бетононасос — <span class="accent">один заказ, одна накладная</span></h1>
                    <p class="hero__sub">Собственный завод. Марки М100–М500. Автобетононасосы 24–52 м с оператором. Паспорт ГОСТ на каждую партию.</p>
                    <div class="hero__actions">
                        <a href="#calc" class="btn btn--primary btn--lg">Рассчитать стоимость →</a>
                        <a href="{{ route('ceny') }}" class="btn btn--ghost-light btn--lg">Смотреть прайс</a>
                    </div>
                    <div class="hero__chips">
                        <span class="chip chip--dark">@include('icons.check') ГОСТ 7473-2010</span>
                        <span class="chip chip--dark">@include('icons.lab') Своя лаборатория</span>
                        <span class="chip chip--dark">@include('icons.ruble') НДС / без НДС</span>
                        <span class="chip chip--dark">@include('icons.doc') Договор для юрлиц</span>
                    </div>
                </div>

                <div class="hero__card">
                    <div class="hero__card-top">
                        <div class="hero__price">Бетон от 5 600 ₽<small>за м³</small></div>
                        <span class="badge badge--dark">ГОСТ</span>
                    </div>
                    <div class="chip chip--dark" style="margin-top:22px">@include('icons.shield') Паспорт качества с каждой машиной</div>
                    <div class="hero__stats">
                        <div class="hero__stat"><b>2 ч</b><span>минимальная подача / выезд</span></div>
                        <div class="hero__stat"><b>М100–500</b><span>собственный завод в МО</span></div>
                        <div class="hero__stat"><b>24–52 м</b><span>стрела автобетононасоса</span></div>
                        <div class="hero__stat"><b>24/7</b><span>приём заявок и отгрузка</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= ПОЛОСА ДОВЕРИЯ ================= --}}
    <div class="trust-bar">
        <div class="container">
            <div class="trust-bar__item">@include('icons.check') Паспорт качества с каждой машиной</div>
            <div class="trust-bar__item">@include('icons.check') Выезд от 2 часов</div>
            <div class="trust-bar__item">@include('icons.check') Бетон + насос — 1 заказ</div>
            <div class="trust-bar__item">@include('icons.check') Работаем с 2009 года</div>
        </div>
    </div>

    {{-- ================= ПОЧЕМУ НАС ВЫБИРАЮТ ================= --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Преимущества</span>
                <h2 class="section-title" style="margin-top:16px">Почему нас выбирают?</h2>
            </div>
            <div class="split">
                <div class="card card--dark" style="padding:40px">
                    <div class="card__ico">@include('icons.factory')</div>
                    <h3 class="card__title" style="font-size:24px">Собственный завод, не посредник</h3>
                    <p class="card__text" style="font-size:16px">
                        Производим бетон сами — никаких наценок посредников. Цена формируется прямо
                        на заводе. Полный контроль качества на каждом этапе: от входного контроля
                        сырья до отгрузки с документами.
                    </p>
                    <a href="{{ route('o-zavode') }}" class="link-arrow" style="margin-top:26px">Узнать о заводе →</a>
                </div>

                <div class="grid grid-2">
                    @foreach ([
                        ['shield', 'Паспорт качества', 'Документы ГОСТ с каждой партией бетона.'],
                        ['pump', 'Бетон + насос', 'Один договор и накладная на весь заказ.'],
                        ['clock', 'Точное время', 'Подача в согласованный интервал, GPS на машинах.'],
                        ['bolt', 'Работаем 24/7', 'Принимаем заявки и отгружаем круглосуточно.'],
                        ['ruble', 'Без наценок', 'Цена прямо с завода — без посредников.'],
                        ['lab', 'Своя лаборатория', 'Контроль состава и прочности каждой марки.'],
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

    {{-- ================= КАЛЬКУЛЯТОР ================= --}}
    <section class="section section--white" id="calc">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Калькулятор</span>
                <h2 class="section-title" style="margin-top:16px">Рассчитать стоимость</h2>
            </div>
            @include('partials.calculator')
        </div>
    </section>

    {{-- ================= ВСЁ ДЛЯ СТРОЙКИ ================= --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head" style="display:flex;flex-wrap:wrap;justify-content:space-between;align-items:flex-end;gap:20px">
                <div>
                    <span class="eyebrow">Услуги</span>
                    <h2 class="section-title" style="margin-top:16px">Всё, что нужно<br>для стройки</h2>
                    <p class="section-lead">Собственный завод — никаких посредников и наценок. Один звонок закрывает бетон и насос.</p>
                </div>
                <a href="{{ route('ceny') }}" class="link-arrow">Смотреть цены →</a>
            </div>

            <div class="grid grid-4">
                <div class="pcard">
                    <span class="sq-ico">@include('icons.truck')</span>
                    <div class="pcard__head" style="margin-top:20px"><span class="pcard__title">Бетон с доставкой</span></div>
                    <p class="pcard__text">Товарный бетон марок М100–М500 с доставкой по всему МО. Собственный автопарк, GPS на каждой машине, паспорт ГОСТ.</p>
                    <div class="pcard__price"><b>от 5 600 ₽</b><span>/ м³</span></div>
                </div>
                <div class="pcard">
                    <span class="sq-ico">@include('icons.pump')</span>
                    <div class="pcard__head" style="margin-top:20px"><span class="pcard__title">Аренда бетононасоса</span></div>
                    <p class="pcard__text">7 автобетононасосов со стрелой 24–52 м. Оператор с опытом 5+ лет в стоимости. Замена при поломке за 4 часа.</p>
                    <div class="pcard__price"><b>от 3 500 ₽</b><span>/ ч</span></div>
                </div>
                <div class="pcard">
                    <span class="sq-ico">@include('icons.percent')</span>
                    <div class="pcard__head" style="margin-top:20px"><span class="pcard__title">Бетон + насос вместе</span></div>
                    <p class="pcard__text">Один договор, одна накладная. Скидка 5% на насос при заказе нашего бетона. Упрощённый документооборот.</p>
                    <div class="pcard__price"><b>Скидка 5%</b><span>на насос</span></div>
                </div>
                <div class="pcard">
                    <span class="sq-ico">@include('icons.handshake')</span>
                    <div class="pcard__head" style="margin-top:20px"><span class="pcard__title">Поставки для компаний</span></div>
                    <p class="pcard__text">Договор с фиксированными ценами, НДС или без, отсрочка платежа до 14 дней. Персональный менеджер с прямым номером.</p>
                    <div class="pcard__price"><b>Договорная</b><span>цена</span></div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= ЭТАПЫ РАБОТЫ + ФОРМА ================= --}}
    <section class="section section--dark">
        <div class="container">
            <div class="split" style="align-items:start">
                <div>
                    <span class="eyebrow">Как мы работаем</span>
                    <h2 class="section-title" style="margin-top:16px">Этапы работы</h2>
                    <p class="section-lead">От звонка до бетона в опалубке.</p>
                    <div class="steps" style="margin-top:36px">
                        @foreach ([
                            ['Звонок или заявка на сайте', 'Позвоните нам или оставьте заявку. Менеджер перезвонит в течение 4 минут, уточнит задачу и подберёт оптимальную марку бетона.'],
                            ['Расчёт и согласование', 'Считаем объём, марку и логистику. Фиксируем финальную цену и время подачи — без скрытых наценок.'],
                            ['Производство под ваш заказ', 'Замешиваем бетон на собственном заводе под ваш объём. Лаборатория проверяет состав и прочность.'],
                            ['Доставка с документами', 'Привозим в согласованный интервал. Паспорт качества и накладная — сразу на объекте.'],
                        ] as $i => [$t, $d])
                            <div class="step">
                                <span class="step__num">{{ $i + 1 }}</span>
                                <h4>{{ $t }}</h4>
                                <p>{{ $d }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <form class="lead-form" data-lead-form>
                    <div class="lead-form__title">Оставьте заявку</div>
                    <p class="lead-form__sub">Перезвоним за 4 минуты. Уточним объём, марку и сроки. Назовём финальную цену.</p>
                    <div class="stack">
                        <div class="field"><label class="field__label">Имя</label><input class="input" type="text" name="name" placeholder="Как к вам обращаться" required></div>
                        <div class="field"><label class="field__label">Телефон</label><input class="input" type="tel" name="phone" placeholder="+7 (___) ___-__-__" required></div>
                        <div class="field"><label class="field__label">Адрес объекта или город МО</label><input class="input" type="text" name="address" placeholder="Например: Мытищи"></div>
                        <button type="submit" class="btn btn--primary btn--block btn--lg">Получить расчёт стоимости →</button>
                        <label class="checkbox"><input type="checkbox" required><span>Нажимая кнопку, вы соглашаетесь с политикой конфиденциальности</span></label>
                        <div class="form-success">Заявка отправлена. Перезвоним в течение 4 минут!</div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- ================= ТЕЛЕФОН ================= --}}
    @include('partials.cta-phone', ['note' => 'Работаем 24/7 · Производство и доставка по всему МО'])

    {{-- ================= ОТЗЫВЫ ================= --}}
    <section class="section section--paper">
        <div class="container">
            <div class="section-head">
                <span class="eyebrow">Отзывы</span>
                <h2 class="section-title" style="margin-top:16px">Что говорят клиенты</h2>
            </div>
            <div class="reviews">
                <div class="review">
                    <div class="review__stars">★★★★★</div>
                    <p class="review__text">Заказывали М300 на фундамент дома в Мытищах, 18 кубов. Привезли точно в 9 утра как договорились. Паспорт качества отдали сразу. Насос взяли тоже у них — удобно: одна накладная на всё.</p>
                    <div class="review__author">
                        <span class="review__ava">А</span>
                        <div><div class="review__name">Андрей Краснов</div><div class="review__meta">Мытищи · Фундамент дома · 18 м³</div></div>
                    </div>
                </div>
                <div class="review">
                    <div class="review__stars">★★★★★</div>
                    <p class="review__text">Работаем с ПСМ-Монолит третий год. Поставки на несколько объектов, всегда без сбоев. НДС-документы в порядке, протоколы испытаний присылают автоматически. Надёжный поставщик.</p>
                    <div class="review__author">
                        <span class="review__ava">С</span>
                        <div><div class="review__name">СтройГрупп, ООО</div><div class="review__meta">Балашиха · Монолитное строительство · 800+ м³</div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
