@extends('layouts.app')

@section('title', 'Главная')

@section('content')
    <div class="hero-block w-full">
        <div class="hero-block-wrapper">
            <div class="hero-block-top">
                <div class="fs-14 mt-20 mb-20 fw-normal text-default">Производство бетона · Подмосковье · с 2009 года</div>
            </div>

            <div class="hero-block-content d-flex gap-40">
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
                <div class="row">
                    <div class="hero-"></div>
                </div>

            </div>

        </div>

    </div>


@endsection
