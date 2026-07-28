@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <section class="hero-block w-full">
        <div class="hero-block-wrapper">
            <div class="hero-block-top">
                <div class="fs-14 mt-20 mb-20 fw-normal text-default">Производство бетона · Подмосковье · с 2009 года</div>
            </div>

            <div class="hero-block-content d-flex gap-40 mb-40">
                <div class="hero-block-content-left flex-1">
                    <div class="column">
                        <h1 class="hero-title text-default">Бетон и бетонный насос — один заказ, одна накладная</h1>
                        <p class="fs-18 mt-20">Собственный завод. Марки М100–М500. Автобетонасосы 24–52 м с оператором.
                            Паспорт ГОСТ на каждую
                            партию.</p>
                        <div class="row gap-20 mt-20">
                            <a href=""
                                class="btn btn-primary btn-arrow-right-white fs-18 fw-semibold br-20">Рассчитать
                                стоимость</a>
                            <a href="" class="btn btn-primary-white fs-18 fw-semibold">Смотреть прайс</a>
                        </div>
                        <div class="mt-40 row gap-10 f-wrap">
                            <div class="border-text bw-1 b-solid br-20 py-8 px-12 fs-14">ГОСТ 7473-2010</div>
                            <div class="border-text bw-1 b-solid br-20 py-8 px-12 fs-14">Своя лаборатория</div>
                            <div class="border-text bw-1 b-solid br-20 py-8 px-12 fs-14">НДС / без НДС</div>
                            <div class="border-text bw-1 b-solid br-20 py-8 px-12 fs-14">Договор для юрлиц</div>
                            <div class="border-text bw-1 b-solid br-20 py-8 px-12 fs-14">Бетон от 5 600 ₽/м³</div>
                        </div>
                    </div>
                </div>

                <div class="hero-block-content-right flex-1 gap-20">
                    <div class="flex-1">
                        <img src="{{ asset('images/base/hero-block/hero-1.svg') }}"
                            alt="ПСМ - Монолиг. Завод бетона и насосов">

                    </div>

                    <div class="column flex-1 gap-20">
                        <img src="{{ asset('images/base/hero-block/hero-2.svg') }}"
                            alt="ПСМ - Монолиг. Завод бетона и насосов">


                        <img src="{{ asset('images/base/hero-block/hero-3.svg') }}"
                            alt="ПСМ - Монолиг. Завод бетона и насосов">
                    </div>
                </div>
            </div>


            <div class="hero-block-bottom">
                <div class="hero-block-bottom-wrapper mt-40 row gap-40 jc-center">
                    <div class="d-flex items-center gap-10">
                        <div class="hero-block-icon-container ">
                            <img class="hero-block-icon" src="{{ asset('images/ui/icons/done.svg') }}"
                                alt="ПСМ - Монолиг. Завод бетона и насосов">
                        </div>
                        <span class="fs-14 text-default">Паспорт качества с каждой машиной</span>
                    </div>
                    <div class="d-flex items-center gap-10">
                        <div class="hero-block-icon-container ">
                            <img class="hero-block-icon" src="{{ asset('images/ui/icons/time.svg') }}"
                                alt="ПСМ - Монолиг. Завод бетона и насосов">
                        </div>
                        <span class="fs-14 text-default">Выезд от 2 часов</span>
                    </div>
                    <div class="d-flex items-center gap-10">
                        <div class="hero-block-icon-container ">
                            <img class="hero-block-icon" src="{{ asset('images/ui/icons/enum.svg') }}"
                                alt="ПСМ - Монолиг. Завод бетона и насосов">
                        </div>
                        <span class="fs-14 text-default">Бетон + насос — 1 заказ</span>
                    </div>
                    <div class="d-flex items-center gap-10">
                        <div class="hero-block-icon-container ">
                            <img class="hero-block-icon" src="{{ asset('images/ui/icons/home.svg') }}"
                                alt="ПСМ - Монолиг. Завод бетона и насосов">
                        </div>
                        <span class="fs-14 text-default">Работаем с 2009 года</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="why-section w-full">
        <div class="why-container">
            <h2 class="why-title">Почему нас выбирают?</h2>

            <div class="why-grid-wrapper">
                <div class="why-grid">
                    <!-- 01 -->
                    <div class="why-card" data-why="0">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="why-card-number">01</div>
                                <div class="why-card-title rotated">Собственный завод, не посредник</div>
                            </div>
                            <div class="why-card-back">
                                <div class="why-card-number">01</div>
                                <h3 class="why-card-back-title">Собственный завод, не посредник</h3>
                                <p class="why-card-back-text">
                                    Производим бетон сами — никаких наценок посредников. Цена формируется прямо на заводе.
                                </p>
                                <p class="why-card-back-detail">
                                    ✅ Полный контроль качества на каждом этапе: от входного контроля сырья до отгрузки с
                                    документами.
                                </p>
                                <a href="#" class="why-card-cta">Узнать о заводе →</a>
                            </div>
                        </div>
                    </div>

                    <!-- 02 -->
                    <div class="why-card" data-why="1">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="why-card-number">02</div>
                                <div class="why-card-title rotated">ГОСТ 7443-2010</div>
                            </div>
                            <div class="why-card-back">
                                <div class="why-card-number">02</div>
                                <h3 class="why-card-back-title">ГОСТ 7443-2010</h3>
                                <p class="why-card-back-text">
                                    Сертифицированное производство по государственному стандарту.
                                </p>
                                <p class="why-card-back-detail">
                                    🔹 Соответствие всем требованиям ГОСТ 7443-2010. Продукция проходит строгий контроль на
                                    каждом этапе.
                                </p>
                                <ul class="why-card-back-list">
                                    <li>Прочность, морозостойкость, водонепроницаемость</li>
                                    <li>Полная документация и сертификаты</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- 03 -->
                    <div class="why-card" data-why="2">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="why-card-number">03</div>
                                <div class="why-card-title rotated">Паспорт качества</div>
                            </div>
                            <div class="why-card-back">
                                <div class="why-card-number">03</div>
                                <h3 class="why-card-back-title">Паспорт качества</h3>
                                <p class="why-card-back-text">
                                    Каждая партия бетона сопровождается паспортом качества.
                                </p>
                                <p class="why-card-back-detail">
                                    📋 Паспорт качества — гарантия соответствия заявленным характеристикам. Все данные
                                    прозрачны и доступны.
                                </p>
                                <p class="why-card-back-detail">Состав, прочность, дата изготовления, марка.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 04 -->
                    <div class="why-card" data-why="3">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="why-card-number">04</div>
                                <div class="why-card-title rotated">Бетон + Насос</div>
                            </div>
                            <div class="why-card-back">
                                <div class="why-card-number">04</div>
                                <h3 class="why-card-back-title">Бетон + Насос</h3>
                                <p class="why-card-back-text">
                                    Комплексные решения: бетон с доставкой и монтажом навесов.
                                </p>
                                <p class="why-card-back-detail">
                                    🏗️ Оптимальное сочетание: качественный бетон + профессиональный монтаж навесов,
                                    козырьков, площадок.
                                </p>
                                <p class="why-card-back-detail">Единый заказ — экономия времени и средств.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 05 -->
                    <div class="why-card" data-why="4">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="why-card-number">05</div>
                                <div class="why-card-title rotated">Тонкое форми</div>
                            </div>
                            <div class="why-card-back">
                                <div class="why-card-number">05</div>
                                <h3 class="why-card-back-title">Тонкое форми</h3>
                                <p class="why-card-back-text">
                                    Точные формы для элементов малой архитектуры.
                                </p>
                                <p class="why-card-back-detail">
                                    🔘 Индивидуальные формы для бетонных изделий: бордюры, плитка, малые архитектурные
                                    формы.
                                </p>
                                <p class="why-card-back-detail">Высокая точность геометрии, гладкая поверхность.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 06 -->
                    <div class="why-card" data-why="5">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="why-card-number">06</div>
                                <div class="why-card-title rotated">Работаем 24/7</div>
                            </div>
                            <div class="why-card-back">
                                <div class="why-card-number">06</div>
                                <h3 class="why-card-back-title">Работаем 24/7</h3>
                                <p class="why-card-back-text">
                                    Круглосуточное производство и отгрузка. Без выходных.
                                </p>
                                <p class="why-card-back-detail">
                                    🕒 Производство и доставка работают без остановки. Заказы принимаются и отгружаются в
                                    любое время суток.
                                </p>
                                <p class="why-card-back-detail">Собственный автопарк, гибкая логистика.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 07 -->
                    <div class="why-card" data-why="6">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="why-card-number">07</div>
                                <div class="why-card-title rotated">Без наценок</div>
                            </div>
                            <div class="why-card-back">
                                <div class="why-card-number">07</div>
                                <h3 class="why-card-back-title">Без наценок</h3>
                                <p class="why-card-back-text">
                                    Прямые цены от производителя. Никаких скрытых комиссий.
                                </p>
                                <p class="why-card-back-detail">
                                    💰 Цена формируется на заводе. Без посредников, перекупов и дополнительных наценок.
                                </p>
                                <p class="why-card-back-detail">Прозрачное ценообразование, скидки от объёма.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
