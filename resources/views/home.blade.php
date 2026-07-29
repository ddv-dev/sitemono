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


            <div class="hero-block-bottom mb-40">
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
            <h2 class="fs-40 text-white d-flex jc-center mb-20">Почему нас выбирают?</h2>

            <div class="why-grid-wrapper">
                <div class="why-grid">
                    <!-- 01 -->
                    <div class="why-card" data-why="0">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="text-muted mb-a">01</div>
                                <div class="why-card-title rotated">Свой завод</div>
                            </div>
                            <div class="why-card-back">
                                <div class="text-muted mb-12">01</div>
                                <h3 class="why-card-back-title">Собственный завод, не посредник</h3>
                                <p class="why-card-back-text">
                                    Производим бетон сами — никаких наценок посредников. Цена формируется прямо на заводе.
                                    Полный контроль качества на каждом этапе: от входного контроля сырья до отгрузки с
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
                                <div class="text-muted mb-a">02</div>
                                <div class="why-card-title rotated">ГОСТ 7473-2010</div>
                            </div>
                            <div class="why-card-back">
                                <div class="text-muted mb-12">02</div>
                                <h3 class="why-card-back-title">ГОСТ 7473-2010</h3>
                                <p class="why-card-back-text">Каждая партия производится строго по ГОСТ 7473-2010. Не
                                    сертификат на бумаге — реальный производственный стандарт с лабораторным контролем
                                    каждой партии.</p>
                            </div>
                        </div>
                    </div>

                    <!-- 03 -->
                    <div class="why-card" data-why="2">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="text-muted mb-a">03</div>
                                <div class="why-card-title rotated">Паспорт качества</div>
                            </div>
                            <div class="why-card-back">
                                <div class="text-muted mb-12">03</div>
                                <h3 class="why-card-back-title">Паспорт с каждой машиной</h3>
                                <p class="why-card-back-text">Паспорт качества и протокол испытаний — не по запросу, а
                                    автоматически с каждой поставкой. Водитель передаёт документы прямо в руки. </p>

                            </div>
                        </div>
                    </div>

                    <!-- 04 -->
                    <div class="why-card" data-why="3">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="text-muted mb-a">04</div>
                                <div class="why-card-title rotated">Бетон + Насос</div>
                            </div>
                            <div class="why-card-back">
                                <div class="text-muted mb-12">04</div>
                                <h3 class="why-card-back-title">Бетон и насос = 1 заказ</h3>
                                <p class="why-card-back-text">Один договор, одна накладная на бетон и насос. Скидка 5% на
                                    насос при заказе нашего бетона. Не нужно координировать двух поставщиков. </p>

                            </div>
                        </div>
                    </div>

                    <!-- 05 -->
                    <div class="why-card" data-why="4">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="text-muted mb-a">05</div>
                                <div class="why-card-title rotated">Точное время</div>
                            </div>
                            <div class="why-card-back">
                                <div class="text-muted mb-12">05</div>
                                <h3 class="why-card-back-title">Точное время приезда</h3>
                                <p class="why-card-back-text">Называем конкретное время — не «до обеда», а «в 9:30». GPS на
                                    каждой машине. SMS за 30 минут до приезда.
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- 06 -->
                    <div class="why-card" data-why="5">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="text-muted mb-a">06</div>
                                <div class="why-card-title rotated">Работаем 24/7</div>
                            </div>
                            <div class="why-card-back">
                                <div class="text-muted mb-12">06</div>
                                <h3 class="why-card-back-title">Круглосуточная работа</h3>
                                <p class="why-card-back-text">
                                    Производство и доставка 24 часа 7 дней в неделю, включая праздники. Ночной или ранний
                                    утренний выезд — без проблем.
                                </p>

                            </div>
                        </div>
                    </div>

                    <!-- 07 -->
                    <div class="why-card" data-why="6">
                        <div class="why-card-inner">
                            <div class="why-card-front">
                                <div class="text-muted mb-a">07</div>
                                <div class="why-card-title rotated">Без наценок</div>
                            </div>
                            <div class="why-card-back">
                                <div class="text-muted mb-12">07</div>
                                <h3 class="why-card-back-title">Прямые цены от завода</h3>
                                <p class="why-card-back-text">
                                    Производим сами — нет посредников. Скидки от объёма: −3% от 50 м³, −5% от 200 м³/мес.
                                    Персональные условия для постоянных клиентов.
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>













    <section class="calculator-section py-40" id="calculator">
        <div class="container">
            <h2 class="section-title  mb-20">Рассчитать стоимость</h2>


            <div class="panel-white ">

                <div class="column w-full ">
                    <form id="calculatorForm" data-calculate-url="{{ route('calculator.calculate') }}"
                        data-csrf-token="{{ csrf_token() }}">
                        @csrf
                        <div class="d-flex gap-40 column">
                            <div class="row gap-30 items-center">

                                <div class="form-group flex-1">
                                    <label class="form-label">ТИП РАБОТ</label>
                                    <select name="type_id" id="typeSelect" class="form-control" required>
                                        <option value="">Выберите тип</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group flex-1">
                                    <label class="form-label">МАРКА БЕТОНА</label>
                                    <select name="grade_id" id="gradeSelect" class="form-control" required>
                                        <option value="">Выберите марку</option>
                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->name }}
                                                {{ $grade->class ? '(' . $grade->class . ')' : '' }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">ОБЪЁМ, м³</label>
                                    <div class="volume-control">
                                        <button type="button" class="volume-btn" data-action="decrease">−</button>
                                        <input type="number" name="volume" id="volumeInput"
                                            class="form-control volume-input" value="10" min="0.5"
                                            max="1000" step="0.5">
                                        <button type="button" class="volume-btn" data-action="increase">+</button>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-a br-8">Заказать</button>

                            </div>
                            <div class="row">


                                <div class="calculator-result" id="calculatorResult">
                                    <div class="result-price">
                                        <span class="price-amount" id="totalPrice">— ₽</span>
                                    </div>
                                    <p class="result-note">Без учёта доставки — точная цена после звонка</p>
                                </div>

                            </div>
                            <div class="row">
                                @if ($services->isNotEmpty())
                                    <div class="services-group">
                                        @foreach ($services as $service)
                                            <label class="service-switch">
                                                <input type="checkbox" name="services[]" value="{{ $service->id }}"
                                                    class="service-checkbox">
                                                <span class="switch-slider"></span>
                                                <span class="service-label">{{ $service->name }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                @endif

                                @if ($services->isNotEmpty())
                                    <button class="btn-add-service" id="addServiceBtn">
                                        Добавить {{ $services->first()->name }}
                                    </button>
                                @endif

                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
        @vite(['resources/js/app.js'])

        <script>
            // Дополнительная инициализация если нужно
            document.addEventListener('DOMContentLoaded', function() {
                // Все инициализируется через app.js
                console.log('Калькулятор инициализирован через Vite');
            });
        </script>
    @endpush
@endsection
