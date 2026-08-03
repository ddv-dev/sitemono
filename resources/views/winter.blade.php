@extends('layouts.app')

@section('content')

    {{-- Hero (тёмная секция) --}}
    <section class="bg-black py-40">
        <div class="container">
            <div class="sec-label sec-label-dark"><span class="sec-label-line"></span>Зимний бетон · Работаем при −20°C
            </div>
            <h1 class="fs-40 fw-bold line-h-120 text-cream" style="max-width: 900px;">
                Бетон зимой в Подмосковье — тёплая смесь с противоморозными добавками, работаем при −20°C
            </h1>
            <p class="fs-18 line-h-140 mt-20" style="max-width: 700px; color: #9a9a9a;">
                Большинство заводов МО зимой снижают качество или отказываются от сложных заказов. Мы производим тёплый
                бетон по ГОСТ и в самые морозы.
            </p>
            <div class="mt-20 row gap-10 f-wrap">
                <div class="winter-chip">До −20°C</div>
                <div class="winter-chip">Тёплая вода в составе</div>
                <div class="winter-chip">Противоморозные добавки</div>
                <div class="winter-chip">ГОСТ зимой</div>
            </div>
        </div>
    </section>

    {{-- Как производим --}}
    <section class="container py-40">
        <div class="sec-label"><span class="sec-label-line"></span>Технология</div>
        <h2 class="fs-40 fw-bold mb-40">Как мы производим зимний бетон</h2>

        @php
            $steps = [
                ['1', 'Подогрев воды до 60°C'],
                ['2', 'Подогрев заполнителей'],
                ['3', 'Добавки ПМД'],
                ['4', 'Утеплённые миксеры'],
            ];
        @endphp

        <div class="winter-steps">
            @foreach ($steps as [$num, $title])
                <div class="winter-step">
                    <div class="winter-step-num">{{ $num }}</div>
                    <div class="winter-step-title">{{ $title }}</div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Что входит --}}
    <section class="bg-cream py-40">
        <div class="container">
            <div class="sec-label"><span class="sec-label-line"></span>Состав</div>
            <h2 class="fs-40 fw-bold mb-40">Что входит в зимний бетон</h2>

            @php
                $features = [
                    ['Противоморозные добавки', 'Тип и дозировка подбираются под температуру заливки'],
                    ['Тёплая вода и подогрев щебня', 'Контроль температуры смеси на выходе'],
                    ['Ускоритель твердения', 'При необходимости — для набора прочности в срок'],
                ];
            @endphp

            <div class="winter-features">
                @foreach ($features as [$title, $desc])
                    <div class="winter-feature">
                        <div class="winter-feature-title">{{ $title }}</div>
                        <p class="winter-feature-desc">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Ценообразование --}}
    <section class="container py-40">
        <div class="sec-label"><span class="sec-label-line"></span>Цена зимой</div>
        <h2 class="fs-40 fw-bold mb-20">Ценообразование</h2>
        <div class="winter-price-note">
            Надбавка: +300–500 ₽/м³ к базовой цене. Оправдано и прозрачно — без скрытых наценок.
        </div>
    </section>

    {{-- Рекомендации --}}
    <section class="container py-40">
        <div class="sec-label"><span class="sec-label-line"></span>Заливка зимой</div>
        <h2 class="fs-40 fw-bold mb-40">Рекомендации по заливке зимой</h2>

        <ul class="winter-rec-list">
            <li>Прогрев опалубки перед заливкой</li>
            <li>Укрытие тепловыми матами после заливки</li>
            <li>Контроль времени набора прочности при морозе</li>
            <li>Когда категорически нельзя заливать</li>
            <li>Что делать, если ударил мороз после заливки</li>
        </ul>
    </section>

    {{-- Форма заявки --}}
    <section class="bg-black py-40">
        <div class="container">
            <h2 class="fs-40 fw-bold text-cream mb-16">Заказать зимний бетон</h2>
            <p class="fs-16 mb-32" style="color: #9a9a9a;">
                Расскажем о температурном режиме и поможем подобрать добавки под ваш объект.
            </p>

            <form class="js-order-form winter-form" action="{{ route('orders.store') }}" method="POST"
                data-success-text="Заявка принята! Перезвоним в течение 4 минут.">
                @csrf
                <input type="hidden" name="source" value="Зимний бетон">
                <div class="winter-form-row">
                    <input type="text" name="name" class="input-black" placeholder="Ваше имя">
                    <input type="tel" name="phone" class="input-black" placeholder="+7 (___) ___-__-__" required>
                </div>
                <button type="submit"
                    class="btn btn-primary btn-arrow-right-white br-8 fw-semibold mt-20 winter-form-btn">
                    Получить расчёт стоимости
                </button>

                <p class="fs-12 mt-16" style="color: #9a9a9a;">
                    Нажимая кнопку, вы соглашаетесь с
                    <a href="{{ route('privacy') }}" class="text-primary">политикой обработки персональных данных</a>
                </p>
            </form>
        </div>
    </section>

@endsection
