@php
    $nav = [
        ['Бетон', 'beton'],
        ['Насосы', 'nasos'],
        ['Цены', 'ceny'],
        ['О заводе', 'o-zavode'],
        ['Контакты', 'kontakty'],
    ];
@endphp
<header class="site-header">
    {{-- Оранжевая полоса --}}
    <div class="topbar">
        <div class="container">
            <div class="topbar__left">
                <a href="tel:+79915583888" class="topbar__phone">8 (991) 558-38-88</a>
                <span class="topbar__note">Перезвоним за 4 минуты · Работаем 24/7</span>
            </div>
            <a href="{{ route('callback') }}" class="topbar__cta">Заказать бетон →</a>
        </div>
    </div>

    {{-- Навигация --}}
    <div class="navbar">
        <div class="container">
            <a href="{{ url('/') }}" class="logo" aria-label="ПСМ-Монолит">
                <svg class="logo__mark" viewBox="0 0 26 28" fill="none" aria-hidden="true">
                    <path d="M13 0L26 7.5V22.5L13 28L0 22.5V7.5L13 0Z" fill="currentColor"/>
                    <path d="M13 6L20 10V19L13 22L6 19V10L13 6Z" fill="#0d0d0d"/>
                </svg>
                <span class="logo__text">ПСМ-МОНОЛИТ</span>
            </a>

            <nav class="nav">
                @foreach ($nav as [$label, $routeName])
                    <a href="{{ route($routeName) }}" class="{{ request()->routeIs($routeName) ? 'is-active' : '' }}">{{ $label }}</a>
                @endforeach
            </nav>

            <div class="nav-actions">
                <a href="tel:+79915583888" class="nav-phone">8 (991) 558-38-88</a>
                <a href="{{ route('callback') }}" class="btn btn--primary btn--sm">Заказать звонок</a>
                <button class="burger" data-menu-open aria-label="Меню">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18M3 12h18M3 18h18"/></svg>
                </button>
            </div>
        </div>
    </div>
</header>
