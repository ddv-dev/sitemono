@php
    $mobileNav = [
        ['Главная', 'home'],
        ['Бетон', 'beton'],
        ['Аренда насоса', 'nasos'],
        ['Цены', 'ceny'],
        ['Доставка', 'dostavka'],
        ['Частным клиентам', 'chastnym'],
        ['Компаниям', 'companiyam'],
        ['О заводе', 'o-zavode'],
        ['Портфолио', 'portfolio'],
        ['Зимний бетон', 'zimniy-beton'],
        ['Контакты', 'kontakty'],
    ];
@endphp
<div class="mobile-menu" id="mobileMenu">
    <div class="mobile-menu__top">
        <span class="logo__text" style="color:#fff">ПСМ-МОНОЛИТ</span>
        <button class="mobile-menu__close" data-menu-close aria-label="Закрыть">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="26" height="26"><path d="M6 6l12 12M18 6L6 18"/></svg>
        </button>
    </div>
    <nav>
        @foreach ($mobileNav as [$label, $routeName])
            <a href="{{ route($routeName) }}">{{ $label }}</a>
        @endforeach
    </nav>
    <div class="mobile-menu__foot">
        <a href="tel:+79915583888" class="nav-phone" style="font-size:22px">8 (991) 558-38-88</a>
        <a href="{{ route('callback') }}" class="btn btn--primary btn--block">Заказать звонок</a>
    </div>
</div>
