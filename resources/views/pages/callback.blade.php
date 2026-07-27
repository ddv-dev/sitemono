@extends('layouts.app')

@section('title', 'Заказать звонок')
@section('meta_description', 'Оставьте заявку — перезвоним за 4 минуты, уточним объём, марку бетона и сроки, назовём финальную цену без скрытых наценок.')

@section('content')
    <section class="pagehero">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <span>Заказать звонок</span></div>
            <span class="eyebrow" style="margin-top:20px">Заявка</span>
            <h1 class="pagehero__title">Закажите обратный звонок — <span class="accent">перезвоним за 4 минуты</span></h1>
            <p class="pagehero__sub">Уточним объём, марку бетона и сроки, подберём автобетононасос и назовём финальную цену без скрытых наценок.</p>
        </div>
    </section>

    @include('partials.lead-form', [
        'bg' => 'section--paper',
        'title' => 'Оставьте заявку',
        'sub' => 'Заполните форму — менеджер свяжется с вами в течение 4 минут. Работаем и принимаем заявки 24/7.',
    ])

    @include('partials.cta-phone')
@endsection
