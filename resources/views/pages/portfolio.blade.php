@extends('layouts.app')

@section('title', 'Портфолио — наши объекты')
@section('meta_description', 'Более 1 200 объектов в Подмосковье: частные дома, жилые комплексы, промышленные объекты и дороги. Каждый проект — с паспортом качества и в согласованный срок.')

@php
    $projects = [
        ['private', 'Частное', 'Монолитное перекрытие жилого дома, 2 этажа', 'Жуковский', '45 м³', 'М300'],
        ['commercial', 'Коммерция', 'Офисный комплекс — фундаментная плита', 'Одинцово', '420 м³', 'М300'],
        ['zhk', 'ЖК', 'ЖК «Раменский» — подземный паркинг', 'Раменское', '1 650 м³', 'М350 (водоупорный)'],
        ['commercial', 'Коммерция', 'Парковочная площадка торгового центра', 'Щёлково', '340 м³', 'М300'],
        ['industry', 'Промышленность', 'Производственный цех — монолитные колонны', 'Ногинск', '780 м³', 'М400'],
        ['private', 'Частное', 'Стяжка пола и отмостка — дача 200 м²', 'Королёв', '22 м³', 'М200'],
        ['zhk', 'ЖК', 'ЖК «Домодедово парк» — монолитный каркас', 'Домодедово', '3 100 м³', 'М350'],
        ['commercial', 'Коммерция', 'ТЦ «Северный» — парковочный подиум', 'Химки', '900 м³', 'М300'],
        ['roads', 'Дороги', 'Реконструкция дороги Подольск–Климовск', 'Подольск', '1 200 м³', 'М350'],
        ['industry', 'Промышленность', 'Логистический центр «Восток» — фундаментная плита', 'Балашиха', '5 800 м³', 'М400'],
        ['private', 'Частное', 'Ленточный фундамент коттеджа 12×14 м', 'Пушкино', '18 м³', 'М300'],
        ['zhk', 'ЖК', 'ЖК «Новый берег» — монолитные перекрытия', 'Мытищи', '2 400 м³', 'М300, М350'],
    ];
    $filters = [
        'all' => 'Все', 'private' => 'Частное строительство', 'zhk' => 'Жилые комплексы',
        'industry' => 'Промышленность', 'roads' => 'Дороги и инфраструктура', 'commercial' => 'Коммерческая недвижимость',
    ];
@endphp

@section('content')
    {{-- HERO --}}
    <section class="pagehero">
        <div class="container">
            <div class="breadcrumbs"><a href="{{ url('/') }}">Главная</a> / <span>Портфолио</span></div>
            <span class="eyebrow" style="margin-top:18px">Частные дома · ЖК · Промышленность · Дороги</span>
            <h1 class="pagehero__title">Объекты, которые мы забетонировали в Подмосковье — <span class="accent">1 200+ проектов</span></h1>
            <p class="pagehero__sub">Частные дома, жилые комплексы, промышленные объекты, дороги. Каждый проект — с паспортом качества и в согласованный срок.</p>
        </div>
    </section>

    {{-- ГАЛЕРЕЯ --}}
    <section class="section section--paper" data-portfolio>
        <div class="container">
            <div class="chips" style="margin-bottom:36px">
                @foreach ($filters as $key => $label)
                    <button type="button" class="chip {{ $key === 'all' ? 'chip--solid' : '' }}" data-filter="{{ $key }}">{{ $label }}</button>
                @endforeach
            </div>

            <div class="grid grid-3">
                @foreach ($projects as [$cat, $tag, $title, $city, $vol, $mark])
                    <div class="pcard" data-cat="{{ $cat }}" style="padding:0;overflow:hidden">
                        <div class="media-ph media-ph--light" style="min-height:190px;border-radius:0">@include('icons.layers')</div>
                        <div style="padding:24px">
                            <span class="badge">{{ $tag }}</span>
                            <h3 class="pcard__title" style="font-size:17px;margin-top:14px">{{ $title }}</h3>
                            <dl class="spec-list" style="margin-top:14px">
                                <div class="spec-list__row"><dt>@include('icons.pin') Город</dt><dd>{{ $city }}</dd></div>
                                <div class="spec-list__row"><dt>Объём</dt><dd>{{ $vol }}</dd></div>
                                <div class="spec-list__row"><dt>Марка</dt><dd>{{ $mark }}</dd></div>
                            </dl>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ФОРМА --}}
    <section class="section section--dark" id="zayavka">
        <div class="container">
            <div class="split">
                <div>
                    <span class="eyebrow">Заявка</span>
                    <h2 class="section-title" style="margin-top:16px">Расскажите о вашем объекте</h2>
                    <p class="section-lead">Подберём марку, посчитаем объём и логистику. Назовём цену и сроки для вашего проекта.</p>
                </div>
                <form class="lead-form" data-lead-form>
                    <div class="lead-form__title">Обсудить проект</div>
                    <div class="stack">
                        <div class="field"><label class="field__label">Тип объекта</label>
                            <select class="select" name="type"><option>Частный дом / дача</option><option>Жилой комплекс</option><option>Промышленный объект</option><option>Дорога / инфраструктура</option><option>Коммерческая недвижимость</option></select>
                        </div>
                        <div class="field"><label class="field__label">Планируемый объём, м³</label><input class="input" type="text" name="volume" placeholder="например, 500"></div>
                        <div class="field"><label class="field__label">Телефон</label><input class="input" type="tel" name="phone" placeholder="+7 (___) ___-__-__" required></div>
                        <button type="submit" class="btn btn--primary btn--block btn--lg">Обсудить проект →</button>
                        <label class="checkbox"><input type="checkbox" required><span>Нажимая кнопку, вы соглашаетесь с политикой обработки персональных данных</span></label>
                        <div class="form-success">Заявка отправлена. Перезвоним в течение 4 минут!</div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    @include('partials.cta-phone')
@endsection
